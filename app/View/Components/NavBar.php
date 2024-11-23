<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class NavBar extends Component
{
    public $unauthorisedUsers;

    /**
     * Create a new component instance.
     *
     * @param $unauthorisedUsers
     */
    public function __construct($unauthorisedUsers)
    {
        $this->unauthorisedUsers = $unauthorisedUsers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.nav-bar');
    }
}
