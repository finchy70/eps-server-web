<?php

namespace App\Http\Controllers;

use App\Models\Battery;
use App\Models\BatteryCell;
use App\Models\Client;
use App\Models\Device;
use App\Models\Question;
use App\Models\Section;
use App\Models\Switchgear;
use App\Models\Tev;
use App\Models\Transformer;
use App\Models\Update;
use App\Models\Inspection;
use App\Models\Answer;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

//use function PHPUnit\Framework\isEmpty;
//use function Sodium\add;

class DataController extends Controller
{
    public function data(Request $request)
    {
        $user = $request->user();
        $token = $user->tokens()->first();
        $updated_last = Update::first();
        $device = Device::where('device_identifier', $token->name)->first();
        $questions = collect();
        $sections = collect();
        $clients = collect();
        $message = 'success';

        if($device == null){
            $device = new Device();
            $device->device_identifier = $token->name;
            $device->last_data_sync = now()->subYears(10);
            $device->last_inspection_sync = now()->subDays(7);
            $device->save();
        }

        if($updated_last->data_updated > $device->last_data_sync)
        {
            $questions = Question::where('created_at', '>', $device->last_data_sync)->orWhere('updated_at',
                '>', $device->last_data_sync)->get();


            $sections = Section::where('created_at', '>', $device->last_data_sync)->orWhere('updated_at',
                '>', $device->last_data_sync)->get();


            $clients = Client::where('created_at', '>', $device->last_data_sync)->orWhere('updated_at',
                '>', $device->last_data_sync)->get();
            $device->last_data_sync = now();

        }
        $device->save();
        if($questions->count() == 0 && $sections->count() == 0 && $clients->count() == 0){
            $message = "No Update Required";
        }
        return response()->json(['message' => $message, 'questions' => $questions, 'sections' => $sections, 'clients'
        => $clients]);

    }

    public function inspections(Request $request)
    {
        $body = $request->getContent();
        $user = $request->user();
        $data = json_decode($body, true);
        $ids_synced = [];

        foreach ($data['inspection'] as $inspection) {
            $new_inspection = new Inspection;
            $new_inspection->client_id = $inspection['client_id'];
            $new_inspection->user_id = $user->id;
            $new_inspection->job_number = $inspection['job_no'];
            $new_inspection->site = $inspection['site'];
            $new_inspection->checked_on = $inspection['checked_on'];
            $new_inspection->save();
            $ids_synced[] = $inspection['id'];
            foreach ($inspection['answers'] as $answer) {
                $new_answer = new Answer;
                $new_answer->inspection_id = $new_inspection->id;
                $new_answer->question_id = $answer['question_id'];
                $new_answer->acceptable = $answer['acceptable'];
                $new_answer->remedial_type = $answer['remedial_type'];
                $new_answer->remedial_comment = $answer['remedial_comment'];
                $new_answer->comment = $answer['comment'];
                $new_answer->save();
                foreach ($answer['pictures'] as $picture) {
                    $new_picture = new Picture;
                    $new_picture->inspection_id = $new_inspection->id;
                    $new_picture->answer_id = $new_answer->id;
                    $new_picture->filename = $picture['filename'];
                    $new_picture->comments = $picture['comments'];
                    $new_picture->save();
                }
            }
        }
        foreach ($inspection['batteries'] as $battery) {
            $new_battery = new Battery;
            $new_battery->inspection_id = $new_inspection->id;
            $new_battery->name = $battery['name'];
            $new_battery->tripping_voltage = $battery['tripping_voltage'];
            $new_battery->output_voltage = $battery['output_voltage'];
            $new_battery->battery_voltage = $battery['battery_voltage'];
            $new_battery->battery_make = $battery['battery_make'];
            $new_battery->install_date = $battery['install_date'];
            $new_battery->temperature = $battery['temperature'];
            $new_battery->save();
        }
        foreach ($inspection['battery_cells'] as $cell) {
            $new_cell = new BatteryCell;
            $new_cell->inspection_id = $new_inspection->id;
            $new_cell->battery = $cell['battery'];
            $new_cell->cell_number = $cell['cell_number'];
            $new_cell->cell_voltage = $cell['cell_voltage'];
            $new_cell->mohm = $cell['mohm'];
            $new_cell->save();
        }
        foreach ($inspection['transformers'] as $tx) {
            $new_tx = new Transformer;
            $new_tx->inspection_id = $new_inspection->id;
            $new_tx->name = $tx['name'];
            $new_tx->manufacturer = $tx['manufacturer'];
            $new_tx->year = $tx['year'];
            $new_tx->conservator = $tx['conservator'];
            $new_tx->insulate_props = $tx['insulate_props'];
            $new_tx->tap_changer_pos = $tx['tap_changer_pos'];
            $new_tx->breather = $tx['breather'];
            $new_tx->rating_kva = $tx['rating_kva'];
            $new_tx->oil_vol = $tx['oil_vol'];
            $new_tx->prim_voltage = $tx['prim_voltage'];
            $new_tx->sec_voltage = $tx['sec_voltage'];
            $new_tx->sited = $tx['sited'];
            $new_tx->tx_serial = $tx['tx_serial'];
            $new_tx->save();

        }
        foreach ($inspection['switchgears'] as $swg) {
            $new_swg = new Switchgear;
            $new_swg->inspection_id = $new_inspection->id;
            $new_swg->panel_number = $swg['panel_number'];
            $new_swg->manufacturer = $swg['manufacturer'];
            $new_swg->year = $swg['year'];
            $new_swg->circuit = $swg['circuit'];
            $new_swg->switching_operations = $swg['switching_operations'];
            $new_swg->serial_number = $swg['serial_number'];
            $new_swg->op_locks = $swg['op_locks'];
            $new_swg->check_earth_connections = $swg['check_earth_connections'];
            $new_swg->ops_diagram = $swg['ops_diagram'];
            $new_swg->check_sf14 = $swg['check_sf14'];
            $new_swg->general_condition = $swg['general_condition'];
            $new_swg->check_interlocks = $swg['check_interlocks'];
            $new_swg->cables_and_ducts = $swg['cables_and_ducts'];
            $new_swg->comments = $swg['comments'];
            $new_swg->save();

        }

        foreach ($inspection['tevs'] as $tev) {
            $new_tev = new Tev;
            $new_tev->inspection_id = $new_inspection->id;
            $new_tev->panel_name = $tev['panel_name'];
            $new_tev->switch_position = $tev['switch_position'];
            $new_tev->busbar_right = $tev['busbar_right'];
            $new_tev->busbar_left = $tev['busbar_left'];
            $new_tev->switch_tank = $tev['switch_tank'];
            $new_tev->ct_chamber = $tev['ct_chamber'];
            $new_tev->volt_txs = $tev['volt_txs'];
            $new_tev->term_box = $tev['term_box'];
            $new_tev->ultra_sonic_test = $tev['ultra_sonic_test'];
            $new_tev->tx_background_readings_metal = $tev['tx_background_readings_metal'];
            $new_tev->tx_hv_box = $tev['tx_hv_box'];
            $new_tev->tx_main_body = $tev['tx_main_body'];
            $new_tev->tx_ultra_sonic_test = $tev['tx_ultra_sonic_test'];
            $new_tev->save();
        }
        return response()->json(['message' => "All completed inspections have synced with EPS Inspect server!!", 'synced_inspection_ids' => $ids_synced]);
    }



    public function pictures(Request $request)
    {
        $body = $request->getContent();
        $data = json_decode($body, true);
        $image = base64_decode($data['image']);
        $filename = $data['name'];
        $rotate = $data['rotate'];
        $picture = Image::make($image)->rotate($rotate);
        $thumbnail = Image::make($image)->rotate($rotate)->fit(150, null, function ($constraint) {
            $constraint->aspectRatio();
        });
//        $originalPath = Storage::path('/storage/img/');
//        $thumbPath = Storage::path('/storage/thumb/');
        Storage::put('/thumb/'.$filename, $thumbnail->encode());
        Storage::put('/img/'.$filename, $picture->encode());
//        $picture->save(storage_path().'/app/public/thumb/' . $filename);
        return response()->json(['success' => true, 'message' => "Pictures synced"]);
    }
}
