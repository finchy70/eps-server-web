<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::orderBy('client', 'asc')->paginate(15);
        return view('clients.index', compact('clients'));
    }

    public function create(){
        return view('clients.create');
    }

    public function store(){
        $data = request()->validate([
            'client' => 'required|unique:clients'
        ]);
        Client::create($data);
        Session::flash('success', 'The Client was successfully added!');

        return redirect()->action([ClientController::class, 'index']);
    }

    public function edit(Client $client){

        return view('clients.edit', compact('client'));
    }

    public function update(Client $client){
        if (request('client') === $client->client) {
            Session::flash('message', 'No changes were made to the name!');
        } else {
            $data = request()->validate([
                'client' => 'required|unique:clients'
            ]);

            $client->client = request('client');
            $client->update();
            Session::flash('success', 'The Client was successfully updated!');
        }
        return redirect()->action([ClientController::class, 'index']);
    }
}
