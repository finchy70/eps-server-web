<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Update;
use Livewire\Component;

class OrderQuestions extends Component
{
    public $section;
    public $question;
    public $questions;
    public $questionsWithAnswers = [];

    public function mount($section, $questions)
    {
        $this->section = $section;

        foreach($questions as $question)
        {
            $this->checkForAnswers($question);
        }

    }

    public function updateQuestionOrder($reordered)
    {
        foreach($reordered as $order)
        {
            $question = Question::find($order['value']);
            $question->order = $order['order'];
            $question->update();
            $this->render();
        }
    }

    public function addQuestion()
    {
        $data = $this->validate([
            'question' => 'required|unique:questions'
        ]);

        $order = Question::where('section_id', $this->section->id)->orderBy('order', 'desc')->first();
        if($order == null){
            $next_order = 1;
        } else {
            $next_order = $order->order + 1;
        }

        Question::create([
            'question' => $this->question,
            'order' => $next_order,
            'section_id' => $this->section->id
        ]);
        $update = Update::find(1);
        $update->data_updated = now();
        $update->update();
        $this->question = "";
        $this->render();
    }

    public function removeQuestion($questionId)
    {
        if(in_array($questionId, $this->questionsWithAnswers))
        {
            $this->dispatchBrowserEvent('set-show');
        }
        else
        {
            $question = Question::find($questionId);
            $reorderQuestions = Question::where('order', '>', $question->order)->get();
            foreach($reorderQuestions as $newOrder)
            {
                $newOrder->order = $newOrder->order - 1;
                $newOrder->update();
            }
            $question->delete();
        }
    }

    public function render()
    {
        $this->questions = Question::where('section_id', $this->section->id)->orderBy('order', 'asc')->get();
        return view('livewire.order-questions');
    }

    public function checkForAnswers($question)
    {
        if($question->answers->count() > 0)
        {
            array_push($this->questionsWithAnswers, $question->id);
            return;
        }
    }
}
