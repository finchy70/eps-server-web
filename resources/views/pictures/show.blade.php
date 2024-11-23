@extends('layouts.app')

@section('title', 'Picture Viewer')

@section('content')

    <div class="row flex justify-center">
        <img class="p-2 max-w-3xl border border-gray-700 bg-gray-200 rounded-lg overflow-hidden" src="{{ Storage::disk('digitalocean')->url('img/'.$picture->filename)}}"/>
    </div>
    <div class="max-w-3xl mx-auto">
        <div>
            @if($picture->comments)
                <div class="mt-4 row ml-auto mr-auto border border-gray-700 bg-gray-200 rounded-lg overflow-hidden">
                <div class="row ml-4 text-xs itallic text-gray-500">Comment</div>
                <div class="px-2 pb-1">{{$picture->comments}}</div>
            @endif
        </div>
        <div class="row flex justify-end">
            <a href="{{route('inspections.show', [$id, '#picture-'.$picture->id])}}" class="mt-2 row flex ml-auto py-1 text-xs md:text-sm px-2 items-center justify-center border border-transparent rounded-md text-xs text-white bg-yellow-600 hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:shadow-outline-yellow transition duration-150 ease-in-out">
                Back
            </a>
        </div>
    </div>

@stop
