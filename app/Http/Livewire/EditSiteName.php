<?php

namespace App\Http\Livewire;

use App\Http\Controllers\InspectionController;
use App\Models\Inspection;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class EditSiteName extends Component
{
    public int $site;
    public string $updateSiteName;
    public bool $showSiteEditModal = false;
    public Inspection $inspection;
    public string $client_id;


    public function mount($site, $client_id) {
        $this->inspection = Inspection::find($site);
        $this->client_id = $client_id;
    }

    public function editSiteName($client_id) {
        $this->updateSiteName = $this->inspection->site;
        $this->showSiteEditModal = true;
    }

    public function submit() {
        $this->validate([
            'updateSiteName' => 'required'
        ]);
        $this->inspection->site = $this->updateSiteName;
        $this->inspection->update();
        Session::flash('success', 'You have successfully updated the site name.');
        return redirect()->route("inspections", $this->client_id);
    }

    public function render()
    {
        return view('livewire.edit-site-name');
    }
}
