<?php

namespace App\Http\Livewire;

use App\Mail\TokenGenerated;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ManageTokens extends Component
{
    public function revokeToken($id)
    {
        $selected_user = User::find($id);
        $selected_user->tokens()->delete();
    }

    public function render()
    {
        return view('livewire.manage-tokens', [
            'users' => User::where('client_id', null)->with('tokens')
                ->orderBy('name', 'asc')->paginate(15),
        ]);
    }
}
