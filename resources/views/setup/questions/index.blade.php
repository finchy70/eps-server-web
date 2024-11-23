@extends('layouts.app')

@section('title', 'Setup Menu')

@section('content')
    <div class="row flex justify-center">
        <div class="mt-4 mb-2 text-4xl text-indigo-600 font-bold">Question Setup</div>
    </div>
    <div class="row flex justify-center">
        <div class="mt-2 mb-4 text-sm text-indigo-600 font-bold">Select the section that the question you need to edit / add belongs to.</div>
    </div>
    <div class="w-5/6 md:w-1/2 p-4 mx-auto border bg-grey-50 border-indigo-600 rounded-lg">
        <ul class="divide-y divide-gray-600">
            @foreach($sections as $section)
                <li class="py-4 flex justify-between items-center">
                    <div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">{{$section->name}}</p>
                            <p class="text-sm text-gray-500">Number of questions: {{$section->questions->count()}}</p>
                        </div>
                    </div>
                    <div class="items-center">
                        <a href="{{route('setup.questions.show', $section->id)}}" class="btn-indigo">
                            Select
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>
    <div class="mx-auto mt-4 w-5/6 md:w-1/2 row flex justify-end">
        <a href="{{route('setup')}}" class="mr-4 mt-2 btn-yellow">Back</a>
    </div>
@stop
