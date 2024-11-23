<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;


class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = new Question;
        $question->section_id = 1;
        $question->order = 1;
        $question->question = "Fixed Wiring Inspection & Testing (Statutory)";
        $question->save();

        $question = new Question;
        $question->section_id = 1;
        $question->order = 2;
        $question->question = "Portable Appliance Testing PAT (Statutory)";
        $question->save();

        $question = new Question;
        $question->section_id = 1;
        $question->order = 3;
        $question->question = "External Lighting";
        $question->save();

        $question = new Question;
        $question->section_id = 1;
        $question->order = 4;
        $question->question = "Distribution Board Visual Inspection";
        $question->save();

        $question = new Question;
        $question->section_id = 2;
        $question->order = 1;
        $question->question = "Check charging indicators are visible";
        $question->save();

        $question = new Question;
        $question->section_id = 2;
        $question->order = 2;
        $question->question = "Test system - Flick Test";
        $question->save();

        $question = new Question;
        $question->section_id = 2;
        $question->order = 3;
        $question->question = "Emergency Lighting 3 Hr Discharge test";
        $question->save();

        $question = new Question;
        $question->section_id = 3;
        $question->order = 1;
        $question->question = "240V systems";
        $question->save();

        $question = new Question;
        $question->section_id = 3;
        $question->order = 2;
        $question->question = "Systems with Battery Back up";
        $question->save();

        $question = new Question;
        $question->section_id = 4;
        $question->order = 1;
        $question->question = "Test fire alarm system (Different call point in rotation)";
        $question->save();

        $question = new Question;
        $question->section_id = 4;
        $question->order = 2;
        $question->question = "Fire Risk Assessment or Review";
        $question->save();

        $question = new Question;
        $question->section_id = 5;
        $question->order = 1;
        $question->question = "Fire fighting Equipment Inspection ";
        $question->save();

        $question = new Question;
        $question->section_id = 5;
        $question->order = 2;
        $question->question = "Check for damage & location (In House)";
        $question->save();

        $question = new Question;
        $question->section_id = 6;
        $question->order = 1;
        $question->question = "Palisade Fencing";
        $question->save();

        $question = new Question;
        $question->section_id = 6;
        $question->order = 2;
        $question->question = "Building - Outside";
        $question->save();

        $question = new Question;
        $question->section_id = 6;
        $question->order = 3;
        $question->question = "Building - Inside Control Room";
        $question->save();

        $question = new Question;
        $question->section_id = 6;
        $question->order = 4;
        $question->question = "Building - Inside HV";
        $question->save();

        $question = new Question;
        $question->section_id = 6;
        $question->order = 5;
        $question->question = "Substation Compound";
        $question->save();

        $question = new Question;
        $question->section_id = 7;
        $question->order = 1;
        $question->question = "Internal Notices in Control Room";
        $question->save();

        $question = new Question;
        $question->section_id = 7;
        $question->order = 2;
        $question->question = "External Notices in Compound";
        $question->save();

        $question = new Question;
        $question->section_id = 7;
        $question->order = 3;
        $question->question = "Notices on Fence";
        $question->save();

        $question = new Question;
        $question->section_id = 7;
        $question->order = 4;
        $question->question = "Fire Fighting Notices";
        $question->save();

        $question = new Question;
        $question->section_id = 8;
        $question->order = 1;
        $question->question = "External Fence Connections";
        $question->save();

        $question = new Question;
        $question->section_id = 8;
        $question->order = 2;
        $question->question = "Plant in Generation Compound Connections";
        $question->save();

        $question = new Question;
        $question->section_id = 8;
        $question->order = 3;
        $question->question = "HV Equipment Connections";
        $question->save();

        $question = new Question;
        $question->section_id = 8;
        $question->order = 4;
        $question->question = "Building - Internal Connections";
        $question->save();

        $question = new Question;
        $question->section_id = 8;
        $question->order = 5;
        $question->question = "External Below Ground Earthing";
        $question->save();

        $question = new Question;
        $question->section_id = 9;
        $question->order = 1;
        $question->question = "Cables Visual";
        $question->save();

        $question = new Question;
        $question->section_id = 9;
        $question->order = 2;
        $question->question = "Glanding Visual";
        $question->save();

        $question = new Question;
        $question->section_id = 9;
        $question->order = 3;
        $question->question = "Cable Containment";
        $question->save();

        $question = new Question;
        $question->section_id = 9;
        $question->order = 4;
        $question->question = "Concrete Trench Conditions";
        $question->save();

        $question = new Question;
        $question->section_id = 10;
        $question->order = 1;
        $question->question = "Oil Levels";
        $question->save();

        $question = new Question;
        $question->section_id = 10;
        $question->order = 2;
        $question->question = "Oil Leaks";
        $question->save();

        $question = new Question;
        $question->section_id = 10;
        $question->order = 3;
        $question->question = "Paint Work";
        $question->save();

        $question = new Question;
        $question->section_id = 10;
        $question->order = 4;
        $question->question = "Breather";
        $question->save();

        $question = new Question;
        $question->section_id = 10;
        $question->order = 5;
        $question->question = "Tap Changer Locked Off";
        $question->save();

        $question = new Question;
        $question->section_id = 10;
        $question->order = 6;
        $question->question = "Rating Plate Present";
        $question->save();

        $question = new Question;
        $question->section_id = 10;
        $question->order = 7;
        $question->question = "Bund Condition (oil or water present)";
        $question->save();

        $question = new Question;
        $question->section_id = 10;
        $question->order = 8;
        $question->question = "Bund Pump";
        $question->save();

        $question = new Question;
        $question->section_id = 11;
        $question->order = 1;
        $question->question = "Operational Locks Applied Correctly";
        $question->save();

        $question = new Question;
        $question->section_id = 11;
        $question->order = 2;
        $question->question = "Operation Diagram Available";
        $question->save();

        $question = new Question;
        $question->section_id = 11;
        $question->order = 3;
        $question->question = "Circuit Breaker Function Tests";
        $question->save();

        $question = new Question;
        $question->section_id = 11;
        $question->order = 4;
        $question->question = "Auxilliary/secondary Cables Tightness Checks";
        $question->save();

        $question = new Question;
        $question->section_id = 12;
        $question->order = 1;
        $question->question = "Visual Inspection";
        $question->save();

        $question = new Question;
        $question->section_id = 12;
        $question->order = 2;
        $question->question = "30 minutes Discharge Test";
        $question->save();

        $question = new Question;
        $question->section_id = 13;
        $question->order = 1;
        $question->question = "Internal Visual Inspection";
        $question->save();

        $question = new Question;
        $question->section_id = 14;
        $question->order = 1;
        $question->question = "Visual Inspection";
        $question->save();

        $question = new Question;
        $question->section_id = 14;
        $question->order = 2;
        $question->question = "Cable (Visual Inspection)";
        $question->save();

//        $question = new Question;
//        $question->section_id = 15;
//        $question->order = 1;
//        $question->question = "Test Question.";
//        $question->save();
    }
}
