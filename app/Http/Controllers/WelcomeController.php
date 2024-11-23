<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'approved'])->except('welcome');
    }

    public function main(){
        $users_not_authed = User::where('authorised', false)->count();
        return view('menu', compact('users_not_authed'));
    }

    public function welcome(){
        if(Auth::check())
        {
            return redirect()->action([WelcomeController::class, 'menu']);
        } else {
            return view('welcome');
        }
    }

    public function menu(){
        $users_not_authed = User::where('authorised', false)->count();
        return view('menu', compact('users_not_authed'));
    }
}
