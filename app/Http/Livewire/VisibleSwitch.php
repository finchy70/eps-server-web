<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VisibleSwitch extends Component
{
    public $inspection;
    public $visible;

    public function mount($inspection)
    {
        $this->inspection = $inspection;
        $this->visible = $inspection->visible;

    }

    public function toggleVisible()
    {
        $this->inspection->visible = !$this->inspection->visible;
        $this->inspection->update();
    }

    public function render()
    {
        return view('livewire.visible-switch');
    }
}
