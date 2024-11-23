<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = new Section;
        $section->name ="Electrical";
        $section->order = 1;
        $section->save();

        $section = new Section;
        $section->name ="Emergency Lighting to be Recorded - Statutory";
        $section->order = 2;
        $section->save();

        $section = new Section;
        $section->name ="Fire Alarm Servicing - Statutory";
        $section->order = 3;
        $section->save();

        $section = new Section;
        $section->name ="Fire Alarm Testing - Recordable - Statutory";
        $section->order = 4;
        $section->save();

        $section = new Section;
        $section->name ="Fire Fighting Equipment - Statutory";
        $section->order = 5;
        $section->save();

        $section = new Section;
        $section->name ="General House Keeping";
        $section->order = 6;
        $section->save();

        $section = new Section;
        $section->name ="Statutory Notices";
        $section->order = 7;
        $section->save();

        $section = new Section;
        $section->name ="Earthing";
        $section->order = 8;
        $section->save();

        $section = new Section;
        $section->name ="Cables - Power";
        $section->order = 9;
        $section->save();

        $section = new Section;
        $section->name ="Transformers";
        $section->order = 10;
        $section->save();

        $section = new Section;
        $section->name ="Switchgear";
        $section->order = 11;
        $section->save();

        $section = new Section;
        $section->name ="Batteries 110v";
        $section->order = 12;
        $section->save();

        $section = new Section;
        $section->name ="Gen Set Alt";
        $section->order = 13;
        $section->save();

        $section = new Section;
        $section->name ="Neutral Earth Resistor";
        $section->order = 14;
        $section->save();

//        $section = new Section;
//        $section->name ="Battery Information";
//        $section->order = 1001;
//        $section->save();
//
//        $section = new Section;
//        $section->name ="Battery Cell Information";
//        $section->order = 1002;
//        $section->save();
//
//        $section = new Section;
//        $section->name ="Transformer Information";
//        $section->order = 1003;
//        $section->save();
//
//        $section = new Section;
//        $section->name ="SwitchGear Information";
//        $section->order = 1004;
//        $section->save();
//
//        $section = new Section;
//        $section->name ="TEV Information";
//        $section->order = 1005;
//        $section->save();
    }
}
