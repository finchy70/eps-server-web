<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Question;
use App\Models\Section;
use App\Models\Update;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $sections = Section::orderBy('order', 'asc')->with('questions')->get();
        return view('setup.questions.index', compact('sections'));
    }

    public function show(Section $section)
    {
        $questions = Question::where('section_id', $section->id)->orderBy('order', 'asc')->get();
        return view('setup.questions.show', compact('section', 'questions'));
    }
}
