<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function edit(Answer $answer){
        $selected_answer = Answer::find($answer->id)->with('question')->first();

        return view('answers.edit', compact('answer'));
    }
}
