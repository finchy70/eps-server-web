<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SubNav extends Component
{
    public $date;

    /**
     * Create a new component instance.
     *
     * @param $date
     */
    public function __construct($date)
    {
        $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.sub-nav');
    }
}
