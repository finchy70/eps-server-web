<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use Livewire\Component;

class EditAnswer extends Component
{
    public $answer;
    public $inspection_id;
    public $acceptable;
    public $remedialType;
    public $remedialComment;
    public $comment;
    public $showRemedialComment = false;

    public function mount(Answer $answer)
    {
        $this->answer = $answer;
        $this->inspection_id = $answer->inspection->id;
        $this->acceptable = $answer->acceptable;
        $this->remedialType = $answer->remedial_type;
        $this->remedialComment = $answer->remedial_comment;
        $this->comment = $answer->comment;
        if($this->answer->remedial_type != "OK")
        {
            $this->showRemedialComment = true;
        }
        else {
            $this->remedialComment = "";
        }
    }

    public function check()
    {
        if($this->remedialType != "OK")
        {
            $this->showRemedialComment = true;
        }
        else{
            $this->showRemedialComment = false;
            $this->remedialComment = "";
        }
    }

    public function update()
    {
        $answer = Answer::find($this->answer->id);
        $answer->acceptable = $this->acceptable;
        $answer->remedial_type = $this->remedialType;
        if($this->remedialType == "OK")
        {
            $answer->remedial_comment = "";
        }
        else{
            $answer->remedial_comment = $this->remedialComment;
        }
        $answer->comment = $this->comment;
        $answer->update();
        return redirect()->route('inspections.show', [$this->inspection_id, '#answer-'.$answer->id]);
    }

    public function removeCheck($id)
    {
        $answer = $answer = Answer::find($id);
        $section = $answer->section_id;
        $answer->delete();
        return redirect()->route('inspections.show', [$this->inspection_id, '#section-'.$section]);
    }

    public function render()
    {
        return view('livewire.edit-answer');
    }
}
