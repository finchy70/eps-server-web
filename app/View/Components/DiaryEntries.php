<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DiaryEntries extends Component
{
    public $start = 0;
    public $end = 0;
    public $entry;

    /**
     * Create a new component instance.
     *
     * @param $start
     * @param $end
     * @param $entry
     */
    public function __construct($start, $end, $entry)
    {
        $this->start = $start;
        $this->end = $end;
        $this->entry = $entry;

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.diary-entries');
    }
}
