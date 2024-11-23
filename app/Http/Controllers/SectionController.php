<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::orderBy('order', 'asc')->get();
        return view('setup.sections.index', compact('sections'));
    }
}
