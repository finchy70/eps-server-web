<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use Livewire\Component;

class NotAcceptableChecks extends Component
{
    public $answers;
    public $checks;
    public $showNotAcceptable = false;

    public function mount($answers)
    {
        $this->answers = $answers;
        $this->checks = Answer::whereIn('id', $this->answers)->with('question')->get();
    }

    public function show()
    {
        $this->showNotAcceptable = !$this->showNotAcceptable;
    }

    public function render()
    {
        return view('livewire.not-acceptable-checks');
    }
}
