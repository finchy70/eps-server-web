<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DayLabels extends Component
{
    public $startOfMonth;
    public $actualStartOfMonth;
    public $actualEndOfMonth;
    public $i;

    /**
     * Create a new component instance.
     *
     * @param $startOfMonth
     * @param $actualStartOfMonth
     * @param $actualEndOfMonth
     * @param $i
     */
    public function __construct($startOfMonth, $actualStartOfMonth, $actualEndOfMonth, $i)
    {
        $this->startOfMonth = $startOfMonth;
        $this->actualStartOfMonth = $actualStartOfMonth;
        $this->actualEndOfMonth = $actualEndOfMonth;
        $this->i = $i;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.day-labels');
    }
}
