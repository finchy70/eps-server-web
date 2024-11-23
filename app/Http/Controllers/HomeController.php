<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'current'])->except(['current', 'privacy']);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable|Application|Factory|View
     */
    public function index()
    {
        return view('home');
    }

    public function unapproved()
    {
        dd("Here");
        return view('auth.approval');
    }

    public function admin(){
        return view('auth.admin');
    }

    public function current(){
        return view('auth.current');
    }

    public function not_owner(){
        return view('auth.not_owner');
    }

    public function engineer(){
        return view('auth.engineer');
    }

    public function privacy(){
        return view('privacy');
    }
}
