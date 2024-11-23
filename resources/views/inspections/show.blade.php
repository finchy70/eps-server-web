@extends('layouts.app')

@section('title', 'Inspection - $inspection->job_number')

@section('content')
    <div class="max-w-7xl ml-auto mr-auto">
        <div class="mb-8 flex">
            <x-report-buttons :inspection="$inspection"/>
        </div>
        <div class="mt-2 row flex justify-between">
            <a href="https://epsconstruction.co.uk">
                <img style="height: 150px; width:150px" src="{{asset('images/eps_inspect_200.png')}}" alt="EPS Logo">
            </a>
            <a href="https://epsconstruction.co.uk">
                <img style="height: 150px; width:300px" src="{{asset('images/EPS Logo.png')}}" alt="EPS Logo">
            </a>
        </div>
        <div class="row ml-1">
            <h2 class="my-8 text-center text-4xl font-extrabold">Electrical Power Solutions High Voltage Maintenance Inspection</h2>
        </div>
        <div class="mt-4 mb-4 row">
            <h3 class="text-3xl">Introduction</h3>
        </div>
        <div>
            <p class="leading-relaxed">
                Electrical Power Solutions maintenance protocol carried out in accordance with UK legislation and
                industry standard.
                The Health and Safety at Work Act 1974 (the HSW Act), the Management of Health and Safety at Work
                Regulations 1999 (the Management Regulations) and the Electricity at Work Regulations 1989 (EAWR) are
                applicable to the selection, use, operation and maintenance of high-voltage switchgear. The HSW Act also
                places duties on the manufacturers of switchgear.
                The use, maintenance and operation of high-voltage switchgear must be managed to prevent both the
                equipment giving rise to danger and to ensure the safety of the people who use it. Allowing equipment to
                become unsafe and, as a result, exposing people to danger during its use is likely to breach the law.
                Oil-filled switchgear presents particular issues not encountered with other types of equipment.
                Switchgear must only be operated by people who are competent to do so. People with the necessary
                competence to operate switchgear are often referred to as ‘authorised persons’. A system should be in
                place to assess and appoint the people who can operate switchgear (authorised persons), record who they
                are, what training they have received, what experience they have, what items of switchgear they are
                permitted to operate, and what duties they are authorised to undertake.
            </p>
        </div>
        <hr class="my-4 border-2 border-gray-400">
        <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <li class="col-span-1 bg-white rounded-lg shadow">
                <div class="w-full flex items-center justify-between pl-4 pr-1 py-1 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-gray-900 text-sm font-lg truncate">Client</h3>
                        </div>
                        <p class="mt-1 text-gray-500 text-sm truncate">{{$inspection->client->client}}</p>
                    </div>
                </div>
            </li>

            <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="w-full flex items-center justify-between pl-4 pr-1 py-1 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-gray-900 text-sm font-lg truncate">Location</h3>
                        </div>
                        <p class="mt-1 text-gray-500 text-sm truncate">{{$inspection->site}}</p>
                    </div>
                </div>
            </li>

            <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="w-full flex items-center justify-between pl-4 pr-1 py-1 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-gray-900 text-sm font-lg truncate">EPS Job Number</h3>
                        </div>
                        <p class="mt-1 text-gray-500 text-sm truncate">EPS-{{$inspection->job_number}}</p>
                    </div>
                </div>
            </li>

            <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="w-full flex items-center justify-between pl-4 pr-1 py-1 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-gray-900 text-sm font-lg truncate">Inspector</h3>
                        </div>
                        <p class="mt-1 text-gray-500 text-sm truncate">{{$inspection->user->name}}</p>
                    </div>
                </div>
            </li>

            <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="w-full flex items-center justify-between pl-4 pr-1 py-1 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-gray-900 text-sm font-lg truncate">Position</h3>
                        </div>
                        <p class="mt-1 text-gray-500 text-sm truncate">Engineer</p>
                    </div>
                </div>
            </li>

            <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="w-full flex items-center justify-between pl-4 pr-1 py-1 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-gray-900 text-sm font-lg truncate">Inspection Date</h3>
                        </div>
                        <p class="mt-1 text-gray-500 text-sm truncate">{{$inspection->checked_on}}</p>
                    </div>
                </div>
            </li>
        </ul>
        <hr class="my-4 border-2 border-gray-400">
        <div class="mt-4 mb-4 row">
            <h3 class="text-3xl">Checklist</h3>
        </div>
        @foreach($sections as $section)
            @if(in_array($section->id, $included_sections))
                <div class="text-2xl font-extrabold">{{$section->name}}</div>
                <hr class="my-4 border-1 border-gray-400">
                @foreach($answers as $answer)
                    @if($answer->question->section->id == $section->id)
                        <div id="answer-{{$answer->id}}" class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <div class="row flex items-center justify-start">
                                    <h3 class="text-lg leading-6 font-extrabold text-gray-600">
                                        {{$answer->question->question}}
                                    </h3>
                                    @if(auth()->user()->admin || auth()->user()->client_id == null)
                                        <a class="ml-4" href="{{route('answers.edit', $answer->id)}}">
                                            <svg class="text-gray-600" width="25" height="25" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" fill="#000000" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" fill="#000000" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                                <dl class="sm:divide-y sm:divide-gray-200">
                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-bold text-gray-600">
                                            Check Outcome
                                        </dt>
                                        @if($answer->acceptable == "Acceptable")
                                            <dd class="mt-1 text-sm text-green-700 font-extrabold sm:mt-0 sm:col-span-2">
                                                {{$answer->acceptable}}
                                            </dd>
                                        @else
                                            <dd class="mt-1 text-sm text-red-700 font-extrabold sm:mt-0 sm:col-span-2">
                                                {{$answer->acceptable}}
                                            </dd>
                                        @endif
                                    </div>
                                    @if($answer->remedial_type !== "No Action")
                                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">

                                            @if($answer->remedial_type == "Monitor")
                                                <dt class="text-sm font-bold text-gray-600">
                                                    Action - <span class="text-yellow-700">{{$answer->remedial_type}}</span>
                                                </dt>
                                                <dd class="mt-1 text-sm text-yellow-700 sm:mt-0 sm:col-span-2">
                                                    {{$answer->remedial_comment}}
                                                </dd>
                                            @elseif($answer->remedial_type == "Recommended")
                                                <dt class="text-sm font-bold text-gray-600">
                                                    Action - <span class="text-green-700">{{$answer->remedial_type}}</span>
                                                </dt>
                                                <dd class="mt-1 text-sm text-green-700 sm:mt-0 sm:col-span-2">
                                                    {{$answer->remedial_comment}}
                                                </dd>
                                            @elseif($answer->remedial_type == "Immediate Action")
                                                <dt class="text-sm font-bold text-gray-600">
                                                    Action - <span class="text-red-700">{{$answer->remedial_type}}</span>
                                                </dt>
                                                <dd class="mt-1 text-sm text-red-700 sm:mt-0 sm:col-span-2">
                                                    {{$answer->remedial_comment}}
                                                </dd>
                                            @endif
                                        </div>
                                    @endif
                                    @if($answer->comment !== "")
                                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-bold text-gray-600">
                                                General Comments
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$answer->comment}}
                                            </dd>
                                        </div>
                                    @endif
                                </dl>
                            </div>
                        </div>
                        <div class="mt-4 row flex justify-start">
                            <div class="mr-2 text-lg font-extra[bold">Pictures</div>
                            @if(auth()->user()->client_id == null)
                                <a href={{route('pictures.upload', [$inspection->id, $answer->id])}}>
                                    <svg width="25" height="25" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 18C14.4183 18 18 14.4183 18 10C18 5.58172 14.4183 2 10 2C5.58172 2 2 5.58172 2 10C2 14.4183 5.58172 18 10 18ZM11 7C11 6.44772 10.5523 6 10 6C9.44772 6 9 6.44772 9 7V9H7C6.44772 9 6 9.44771 6 10C6 10.5523 6.44772 11 7 11H9V13C9 13.5523 9.44772 14 10 14C10.5523 14 11 13.5523 11 13V11H13C13.5523 11 14 10.5523 14 10C14 9.44772 13.5523 9 13 9H11V7Z" fill="#228B22"/>
                                    </svg>
                                </a>
                            @endif
                        </div>

                        @if($answer->pictures->count() > 0)

                            @foreach($answer->pictures as $picture)
                                @if($loop->first)
                                    <div id="picture-{{$picture->id}}" class="row flex justify-center">
                                @elseif(($loop->iteration - 1) % 4 == 0)
                                    <div class="row flex justify-center">
                                @endif

                                <div style="width: 220px" class="m-1 p-3 bg-white border border-gray-700 rounded-lg">
                                    <a href="{{route('pictures.show', [$inspection->id, $picture->id])}}">
                                        <div id="picture-{{$picture->id}}">
{{--                                            <img width="200px" src="https://daysheets.fra1.digitaloceanspaces.com/thumb/image_picker_9B4B8D16-7E6B-44C8-BE73-FB1D895758DF-705-00000030B67ED741.jpg" alt="thumbnail"/>--}}
                                            <img width="200px" src="{{Storage::url('thumb/'.$picture->filename)}}"
                                                 alt="thumbnail"/>
                                            @if($picture->comments)
                                                <div class="px-1 border border-gray-800 bg-gray-100 rounded text-left mt-1">
                                                    <div class="text-xs text-gray-500 italic">Comments</div>
                                                    <p class="h-8 text-xs line-clamp-2">{{$picture->comments}}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                    <div>
                                        <a href="{{route('pictures.show', [$inspection->id, $picture->id])}}"
                                           class="my-1 flex text-xs items-center justify-center btn-indigo">View</a>
                                        @if(auth()->user()->admin || auth()->user()->client_id == null)
                                            <a href="{{route('pictures.edit_comment', [$picture->id, $inspection->id])}}"
                                               class="my-1 flex text-xs items-center justify-center btn-yellow">Add
                                                / Edit Comment
                                            </a>
                                            <form
                                                action="{{route('pictures.delete', [$picture->id, $inspection->id])}}"
                                                method="POST">
                                                @csrf
                                                @method("DELETE")

                                                <button type="submit"
                                                        onclick="return confirm('Confirm delete picture?')"
                                                        class="w-full justify-center inline-flex text-xs items-center btn-red">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>

                                @if($loop->last || $loop->iteration % 4 == 0)
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        @if(!$loop->last)
                            <hr class="my-4 border-2 border-gray-400">
                        @endif
                    @endif
                @endforeach
            @endif
            @if(in_array($section->id, $included_sections))
                <hr class="my-4 border-2 border-red-400">
            @endif
        @endforeach

        @if($inspection->batteries != null)
            <div class="text-3xl">Battery</div>
            <div class="mt-4 flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Tripping V
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Output V
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Battery V
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Make
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Installed
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Temp
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inspection->batteries as $battery)
                                        <tr class="{{(($loop->iteration) % 2 == 0)?'bg-gray-200':'bg-white'}}">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{$battery->name}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                {{$battery->tripping_voltage}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                {{$battery->output_voltage}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                {{$battery->battery_voltage}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                {{$battery->battery_make}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                {{$battery->install_date}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                {{$battery->temperature}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4 border-2 border-red-400">
        @endif

        @if($inspection->battery_cells != null)
            <div class="mt-4 text-3xl">Battery Cells</div>
            <div class="mt-4 flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Battery
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Cell
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Voltage
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            mOhm
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($inspection->battery_cells as $cell)
                                    <tr class="{{(($loop->iteration) % 2 == 0)?'bg-gray-200':'bg-white'}}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{$cell->battery}}</td>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$cell->cell_number}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$cell->cell_voltage}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$cell->mohm}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4 border-2 border-red-400">
        @endif

        @if($inspection->transformers != null)
            <div class="text-3xl">Transformer</div>
            <div class="mt-4 flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Manufacturer
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Year
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Conservator
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Insultation
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Tap Changer Pos
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Breather
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Rating (kVA)
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Oil Volume
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Pri Voltage
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Sec Voltage
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Sited
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Serial
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inspection->transformers as $tx)
                                    <tr class="{{(($loop->iteration) % 2 == 0)?'bg-gray-200':'bg-white'}}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{$tx->name}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tx->manufacturer}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tx->year}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tx->conservator}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tx->insulate_props}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tx->tap_changer_pos}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tx->breather}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{$tx->rating_kva}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tx->oil_vol}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tx->prim_voltage}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tx->sec_voltage}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tx->sited}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tx->tx_serial}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4 border-2 border-red-400">
        @endif

        @if($inspection->switchgears != null)
            <div class="text-3xl">Switchgear</div>
            <div class="mt-4 flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Panel
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Manufacturer
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Year
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Circuit
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Switch Operations
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Serial
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Ops Locks in Position
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Check Earth
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Check Diagram
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Check SF14
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        General Condition
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Check Interlocks
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Cables and Ducts
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Comments
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inspection->switchgears as $switchgear)
                                    <tr class="{{(($loop->iteration) % 2 == 0)?'bg-gray-200':'bg-white'}}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{$switchgear->panel_number}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$switchgear->manufacturer}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$switchgear->year}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$switchgear->circuit}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$switchgear->switching_operations}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$switchgear->serial_number}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$switchgear->op_locks}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{$switchgear->check_earth_connections}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$switchgear->ops_diagram}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$switchgear->check_sf14}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$switchgear->general_condition}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$switchgear->check_interlocks}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$switchgear->cables_and_ducts}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$switchgear->comments}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4 border-2 border-red-400">
        @endif

        @if($inspection->tevs != null)
            <div class="text-3xl">TEV</div>
            <div class="mt-4 flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Panel Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Switch Position
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        BusBar Right
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        BusBar Left
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Switch Tank
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        CT Chamber
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Volt TX's
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Term Box
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Ultra Sonic Test
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        TX BG Reading Metal
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        TX HV Box
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        TX Main Body
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-600 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        TX Ultra Sonic Test
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inspection->tevs as $tev)
                                    <tr class="{{(($loop->iteration) % 2 == 0)?'bg-gray-200':'bg-white'}}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{$tev->panel_name}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tev->switch_position}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tev->busbar_right}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tev->busbar_left}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tev->switch_tank}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tev->ct_chamber}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tev->volt_txs}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{$tev->term_box}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tev->ultra_sonic_test}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tev->tx_background_readings_metal}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tev->tx_hv_box}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tev->tx_main_body}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{$tev->tx_ultra_sonic_test}}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4 border-2 border-red-400">
                <div class="mb-8 flex">
                    <x-report-buttons :inspection="$inspection"/>
                </div>
        @endif
    </div>
@stop
