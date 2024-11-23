@extends('layouts.app')

@section('title', 'Clients')

@section('content')
    <div class="text-center text-2xl text-indigo-600 font-extrabold">Clients</div>
    <div class="row justify-end flex">
        <a href="{{route("clients.create")}}" class="mb-4 justify-end inline-flex items-center px-2 py-1 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">Add Client</a>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Client
                            </th>
                            <th class="px-6 py-3 bg-gray-100 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Options</th>
                        </tr>
                        </thead>
                        @foreach($clients as $client)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="{{($loop->iteration % 2)?'bg-white':'bg-gray-200'}}">
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                        {{$client->client}}
                                    </td>
                                    <td class="px-4 py-2 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                        <div class="row flex justify-end">
                                            <a href="{{route('clients.edit', $client->id)}}" class="justify-end inline-flex items-center px-2 py-1 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">Edit</a>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                </div>
                <div class="mt-6">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>



@stop
