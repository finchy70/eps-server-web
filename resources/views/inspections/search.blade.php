@extends('layouts.app')

@section('title', 'Inspections')

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="mb-8 text-center text-2xl text-indigo-600 font-extrabold">Inspections</div>
        @if(auth()->user()->client_id == null)
            <div class="my-4 row flex justify-between">
                <form action="{{route('inspections.search_by_job_number')}}" method="POST">
                    @method("GET")
                    <div class="row flex items-center">
                        <input type="text" placeholder="Enter Job Number" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        <button type="submit" class="ml-2 h-7 btn-indigo-xs">Search</button>
                    </div>
                </form>
                <div class="row flex items-center">
                    <form action="{{route('inspections.by_client')}}" method="GET">
                        <select name="client" id="client" class="rounded-lg text-sm">
                            <option value="9999" {{($client_id == "9999")?'selected':''}}>All Clients</option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}" {{($client_id == $client->id)?'selected':''}}>{{$client->client}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="ml-2 h-7 btn-indigo-xs">Go</button>
                    </form>
                </div>
            </div>
        @endif
        @if($inspections->count() == 0)
            <div class="bg-indigo-700">
                <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        <span class="block">You have no completed inspections available to view.</span>
                        <span class="mt-8 block text-xl font-extrabold text-white sm:text-lg">Come back and try again later.</span>
                    </h2>
                    <a href="/" class="mt-8 w-1/3 inline-flex items-center justify-center btn-teal-lg">
                        Back to Main Menu
                    </a>
                </div>
            </div>
        @else
            @foreach($inspections as $inspection)
                <div class="mb-4 bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="row flex justify-between text-lg leading-6 font-medium text-gray-900">
                            <div>EPS - {{$inspection->job_number}} - {{$inspection->site}} - {{$inspection->client->client}}</div>
                            @if(auth()->user()->client_id == null)
                                <a href="{{route('inspections.show', $inspection->id)}}" class="py-1 text-xs md:text-sm px-2 flex ml-auto items-center justify-center btn-indigo">View / Edit</a>
                            @else
                                <a href="{{route('inspections.show', $inspection->id)}}" class="py-1 text-xs md:text-sm px-2 flex ml-auto items-center justify-center btn-indigo">View</a>
                            @endif
                        </h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                        <dl class="sm:divide-y sm:divide-gray-200">
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Inspector
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{$inspection->user->name}}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Inspected on
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{Carbon\Carbon::parse($inspection->checked_on)->format('d-m-Y')}}
                                </dd>
                            </div>

                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="row flex justify-start text-sm font-medium text-gray-500">
                                    <div class="row flex justify-start">
                                        <div class="mr-4">Attachments</div>
                                        @if(auth()->user()->client_id === null)
                                            <a href="{{route('documents.create', $inspection->id)}}">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 18C14.4183 18 18 14.4183 18 10C18 5.58172 14.4183 2 10 2C5.58172 2 2 5.58172 2 10C2 14.4183 5.58172 18 10 18ZM11 7C11 6.44772 10.5523 6 10 6C9.44772 6 9 6.44772 9 7V9H7C6.44772 9 6 9.44771 6 10C6 10.5523 6.44772 11 7 11H9V13C9 13.5523 9.44772 14 10 14C10.5523 14 11 13.5523 11 13V11H13C13.5523 11 14 10.5523 14 10C14 9.44772 13.5523 9 13 9H11V7Z" fill="#228B22"/>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </dt>

                                @if($inspection->documents->count() > 0)
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                                        @foreach($inspection->documents as $document)
                                            <ul class="mt-2 border border-gray-200 rounded-md divide-y divide-gray-200">
                                                <li class="pl-3 pr-4 py-1 flex items-center justify-between text-xs">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        <!-- Heroicon name: paper-clip -->
                                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="ml-2 flex-1 w-0 truncate">
                                                            {{$document->name}}  -  Filename: {{$document->filename}}
                                                        </span>
                                                    </div>
                                                    <div class="ml-4 flex-shrink-0">
                                                        <div class="row flex justify-end">
                                                            @if(auth()->user()->client_id === null)
                                                                <form action="{{route('documents.delete', $document->id)}}" method="POST">
                                                                    @csrf
                                                                    @method("DELETE")
                                                                    <button onclick="return confirm('Are you sure you want to delete {{$document->name}}?  This cann not be undone!')" type="submit" class="mr-8 font-medium text-red-600 hover:text-red-500">Delete</button>
                                                                </form>
                                                            @endif
                                                            <a href="{{route('documents.download', $document->id)}}" class="ml-4font-medium text-indigo-600 hover:text-indigo-500">
                                                                Download
                                                            </a>
                                                        </div>

                                                    </div>
                                                </li>
                                            </ul>
                                        @endforeach

                                    </dd>
                                @endif

                            </div>
                            <div class="row p-4 flex">
                                @if(auth()->user()->id == 1)
                                    <form action="{{route('inspection.delete')}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="text" hidden name="inspection" value="{{$inspection->id}}">
                                        <button class="ml-auto mr-4 py-1 text-xs md:text-sm px-2 flex ml-auto items-center justify-center btn-red" type="submit" onclick="return confirm('Are you sure yoy want to DELETE EPS - {{$inspection->job_number}} - {{$inspection->site}} - {{$inspection->client->client}}.  This can not be undone!!')">Delete</button>
                                    </form>
                                @endif
                                @if(auth()->user()->client_id == null)
                                    <div class="ml-auto mr-4 text-sm items-center">Visible to Client</div>
                                    <livewire:visible-switch :inspection="$inspection"/>
                                @endif
                            </div>
                        </dl>
                    </div>
                </div>
            @endforeach
        @endif
{{--        @isset($data)--}}
{{--            <div class="px-2 py-1">{{$inspections->appends(Request::except('page'))->links()}}</div>--}}
{{--        @else--}}
            <div class="px-2 py-1">{{$inspections->links()}}</div>
{{--        @endisset--}}
    </div>
@stop
