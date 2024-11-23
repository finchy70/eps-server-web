<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReportButtons extends Component
{
    public $inspection;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($inspection)
    {
        $this->inspection = $inspection;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.report-buttons');
    }
}
