@extends('layouts.app')

@section('title', 'Client Edit')

@section('content')
    <form action="{{route('clients.update', $client)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mt-12 w-1/2 mx-auto">
            <label for="client" class="block text-sm font-medium leading-5 text-gray-700">Name</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="client" name="client" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{$client->client}}">
            </div>
            <div class="row justify-end flex">
                <button onclick="create" class="mt-8 justify-end inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">Update</button>
            </div>
        </div>

    </form>
@stop
