@extends('layouts.app')

@section('title', 'Upload Document')

@section('content')



    <div class="text-center text-2xl text-indigo-600 font-extrabold">Upload Document to</div>
    <div class="text-center text-2xl text-indigo-600 font-extrabold">EPS-{{$inspection->job_number}}-{{$inspection->site}}-{{$inspection->client->client}}</div>
    <div class="p-8 flex items-center justify-center bg-gray-300">
        <div class="w-full max-w-xl mx-auto">
            <form action="{{route('documents.upload', $inspection->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="bg-gray-100 p-4 rounded-lg border border-gray-400">
                    <label for="name" class="block text-sm font-medium text-gray-700">Document Name</label>
                    <input type="text" id="name" name="name" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{old('name')}}">
                    <label for="upload" class="mt-6 block text-sm font-medium text-gray-700">Upload File</label>
                    <div class="mt-4">
                        <input type="file" id="upload" name="upload" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{old('upload')}}">
                    </div>
                    <div class="row flex justify-end">
                        <a href="{{route('inspections')}}" class="mt-8 ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:shadow-outline-yellow active:bg-yellow-700 transition ease-in-out duration-150">Back</a>
                        <button type="submit" class="mt-8 ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="mt-6 mb-8 text-center text-2xl text-indigo-600 font-extrabold">Documents currently uploaded to this Inspection</div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="w-full max-w-4xl mx-auto">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Filename
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Uploaded
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($docs as $document)

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{$document->name}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$document->filename}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{Carbon\Carbon::parse($document->created_at)->format('d-m-Y')}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


