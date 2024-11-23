<?php

namespace App\Http\Livewire;

use App\Models\Section;
use App\Models\Update;
use Illuminate\Validation\ValidationException;
use Livewire\Component;


class OrderSections extends Component
{
    public $sections;
    public $section;
    public $name;
    public $sectionsWithAnswers = [];

    public function mount()
    {
        $sections = Section::all();
        foreach($sections as $section)
        {
            $this->checkForAnswers($section);
        }
    }

    public function updateSectionOrder($reordered)
    {
        foreach($reordered as $order)
        {
            $section = Section::find($order['value']);
            $section->order = $order['order'];
            $section->update();
            $this->render();

        }
    }

    public function addSection()
    {
        $data = $this->validate([
            'name' => 'required|unique:sections'
        ]);

        $order = Section::orderBy('order', 'desc')->first();
        $next_order = $order->order + 1;
        Section::create([
            'name' => $this->name,
            'order' =>$next_order
        ]);
        $update = Update::find(1);

        $update->data_updated = now();
        $update->update();
        $this->name = "";
        $this->render();
    }

    public function removeSection($sectionId)
    {
        if(in_array($sectionId, $this->sectionsWithAnswers))
        {
//            session()->flash('message', 'This can\'t be removed as it has answers registered against the section questions.');
            $this->dispatchBrowserEvent('set-show');
//            throw ValidationException::withMessages(['remove' => 'This can\'t be removed as it has answers registered against the section questions.']);

        }
        else
        {
            $section = Section::find($sectionId);
            $reorderSections = Section::where('order', '>', $section->order)->get();
            foreach($reorderSections as $newOrder)
            {
                $newOrder->order = $newOrder->order - 1;
                $newOrder->update();
            }
            $section->delete();

        }
    }

    public function render()
    {
        $this->sections = Section::orderBy('order', 'asc')->get();
        return view('livewire.order-sections');
    }

    public function checkForAnswers($section)
    {
        foreach($section->questions as $question)
        {
            if($question->answers->count() > 0)
            {
                array_push($this->sectionsWithAnswers, $section->id);
                return;
            }
        }
    }

}
