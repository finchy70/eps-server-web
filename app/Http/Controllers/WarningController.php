<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarningController extends Controller
{
    public function admin(){
        return view('warnings.admin');
    }
}
