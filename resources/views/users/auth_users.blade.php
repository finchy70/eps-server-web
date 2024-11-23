@extends('layouts.app')

@section('title', 'Manage New Users')

@section('content')
    <div class="mb-4 text-center text-2xl text-indigo-600 font-extrabold">Unauthorised Clients</div>
    @foreach($users as $user)
        <livewire:auth-user :aUser="$user"/>
    @endforeach
    <div>{{$users->links()}}</div>
@stop
