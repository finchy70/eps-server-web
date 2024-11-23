@extends('layouts.app')

@section('title', 'Picture')



@section('scripts')
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
@endsection

@section('content')

        <div class="mx-auto max-w-5xl lg:max-w-2xl">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Site</label>
                <div class="mt-1">
                    <input type="text" disabled class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com" value="{{$inspection->site}}">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Client</label>
                <div class="mt-1">
                    <input type="text" disabled class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com" value="{{$inspection->client->client}}">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Checked On</label>
                <div class="mt-1">
                    <input type="text" disabled class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com" value="{{$inspection->checked_on}}">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Checklist Section</label>
                <div class="mt-1">
                    <input type="text" disabled class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com" value="{{$picture->answer->question->section->name}}">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Checklist Question</label>
                <div class="mt-1">
                    <input type="text" disabled class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com" value="{{$picture->answer->question->question}}">
                </div>
            </div>

            <div class="my-4 row flex justify-center">
                <img class="border border-gray-700 p-3 rounded-lg overflow-hidden" width=350 src="{{Storage::url('thumb/'.$picture->filename)}}" alt="large picture" />
            </div>

            <form action="{{route('pictures.update_comment', [$picture->id, $inspection->id])}}" method="POST">
                @csrf
                @method("PATCH")
                <label for="">Picture Comment:</label>
                <div class="row flex justify-center mt-3">
                    <input type="text" name="comments" value="{{$picture->comments}}" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <hr>
                </div>
                <div class="mt-5 row flex items-center justify-end">
                    <a href="{{route('inspections.show', [$inspection->id, '#picture-'.$picture->id])}}" class="py-1 text-xs md:text-sm px-2 flex ml-2 items-center justify-center border border-transparent rounded-md text-xs text-white bg-yellow-600 hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:shadow-outline-yellow transition duration-150 ease-in-out">Back</a>
                    <button type="submit" class="ml-4 py-1 text-xs md:text-sm px-2 flex ml-2 items-center justify-center border border-transparent rounded-md text-xs text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition duration-150 ease-in-out">Update</button>
                </div>
            </form>


        </div>
    </div>
@stop
