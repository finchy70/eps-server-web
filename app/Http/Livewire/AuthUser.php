<?php

namespace App\Http\Livewire;

use App\Http\Controllers\UserController;
use App\Models\Client;
use Livewire\Component;

class AuthUser extends Component
{
    public $user;
    public $clients;
    public $selected_client;

    public function mount($aUser)
    {
        $this->user = $aUser;
        $this->clients = Client::orderBy('client', 'asc')->get();
    }

    public function authorise()
    {

        if($this->selected_client == "1000")
        {
            $this->user->client_id = null;
            $this->admin = false;
        }
        else if ($this->selected_client == "2000")
        {
            $this->user->client_id = null;
            $this->user->admin = true;
        }
        else
        {
            $this->user->client_id = $this->selected_client;
        }
        $this->user->authorised = true;
        $this->user->update();
        return redirect()->action([UserController::class, 'auth']);
    }

    public function render()
    {
        return view('livewire.auth-user');
    }
}
