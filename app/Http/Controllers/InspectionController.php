<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Battery;
use App\Models\BatteryCell;
use App\Models\Client;
use App\Models\Inspection;
use App\Models\Picture;
use App\Models\Section;
use App\Models\Switchgear;
use App\Models\Tev;
use App\Models\Transformer;
use Illuminate\Support\Facades\Storage;
Use Session;

class InspectionController extends Controller
{

    public function index($client = "9999")
    {
        if(auth()->user()->client_id == null)
        {
            if($client == "9999")
                $inspections = Inspection::orderBy('checked_on', 'desc')->with(['answers','user','client','documents'])->paginate(15);
            else {
                $inspections = Inspection::where('client_id', $client)->with(['answers','user','client'])->orderBy('checked_on', 'desc')->paginate(15);
            }
        } else {
            $inspections = Inspection::orderBy('created_at', 'desc')
                ->where('client_id', auth()->user()->client_id)
                ->where('visible', true)
                ->paginate(15);
        }
        $clients = Client::orderBy('client', 'asc')->get();
        $client_id = $client;
        $not_acceptable = [];
        foreach($inspections as $inspection){
            $contains_not_acceptable = false;
            $list_of_not_acceptable = [];
            foreach($inspection->answers as $answer){
                if($answer->acceptable == 'Not Acceptable'){
                    $contains_not_acceptable = true;
                    $list_of_not_acceptable[] = $answer->id;
                }
            }
            if($contains_not_acceptable){
                $not_acceptable[] = ['id' => $inspection->id, 'answers' => $list_of_not_acceptable];
            }
        }

        return view('inspections.index', compact('inspections', 'clients', 'client_id', 'not_acceptable'));
    }

    public function show(Inspection $inspection)
    {
        $inspection = Inspection::where('id', $inspection->id)->with(['client', 'battery_cells', 'batteries', 'switchgears', 'transformers', 'tevs', 'answers.pictures', 'answers.question'])->first();
        $answers = Answer::where('inspection_id', $inspection->id)->orderBy('question_id', 'asc')->with('question')->get();
        $sections = Section::orderBy('order', 'asc')->get();
        $included_sections = Section::remove_empty($inspection, $sections);

        return view('inspections.show', compact('inspection','sections', 'included_sections', 'answers'));
    }

    public function delete()
    {
        if(auth()->user()->id != 1 && auth()->user()->id != 5  && auth()->user()->id != 8 && auth()->user()->id != 6)
        {
            Session::flash('message', 'Only the site superuser can perform a Delete action!!');
            return redirect()->route('inspections');
        }
        $id = request('inspection');

        $pictures = Picture::where('inspection_id', $id)->get();
        foreach($pictures as $pic)
        {
            Storage::delete('img/'.$pic->filename);
            Storage::delete('thumb/'.$pic->filename);
            $pic->delete();
        }

        $cells = BatteryCell::where('inspection_id', $id)->get();
        foreach($cells as $cell)
        {
            $cell->delete();
        }

        $batteries = Battery::where('inspection_id', $id)->get();
        foreach($batteries as $battery)
        {
            $battery->delete();
        }

        $txs = Transformer::where('inspection_id', $id)->get();
        foreach($txs as $tx)
        {
            $tx->delete();
        }

        $swgs = Switchgear::where('inspection_id', $id)->get();
        foreach($swgs as $swg)
        {
            $swg->delete();
        }

        $tevs = Tev::where('inspection_id', $id)->get();
        foreach($tevs as $tev)
        {
            $tev->delete();
        }

        $answers = Answer::where('inspection_id', $id)->get();
        foreach ($answers as $answer)
        {
            $answer->delete();
        }

        $inspection = Inspection::find($id);
        $inspection->delete();

        Session::flash('success', 'Inspection and related records have been deleted!');
        return redirect()->route('inspections');
    }

    public function search_by_job_number()
    {
        $data = request()->validate([
            'job_number' => 'required|numeric|between:1111,9998'
        ]);

        $inspections = Inspection::where('job_number', request('job_number'))->get();
        if($inspections->count() < 1){
            Session::flash('message', 'Job Number '.request('job_number').' does not exist!');
            return redirect()->route('inspections');
        } else {
            $clients = Client::orderBy('client', 'asc')->get();
            $client_id = "9999";
            return view('inspections.index', compact('inspections', 'clients', 'client_id'));
        }
    }

    public function by_client()
    {
        $data = request()->validate([
            'client' => 'required|numeric'
        ]);

        $client_id = request('client');
        if(auth()->user()->client_id == null){
            if($client_id == "9999"){
                return redirect()->route('inspections');
            } else {
                return redirect()->route('inspections.index_by_client', $client_id);
            }
        } else {
            Session::flash('message','Only Engineers and Admin cant list by Client!');
            return redirect()->action([InspectionController::class, 'index']);
        }
    }
}
