@extends('layouts.app')

@section('title', '')

@section('content')

    <div class="text-center text-2xl text-indigo-600 font-extrabold">Users</div>
    <div class="row justify-end flex">
        <a href="{{route("welcome")}}" class="mb-4 justify-end inline-flex items-center btn-teal">Back</a>
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
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Role / Client</th>
                            <th class="px-6 py-3 bg-gray-100 text-right text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Options</th>
                        </tr>
                        </thead>
                        @foreach($users as $user)
                            @if($user->id != 1)
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="{{($loop->iteration % 2)?'bg-white':'bg-gray-200'}}">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                            {{$user->name}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                            {{$user->email}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-500">
                                            @if($user->client_id == null && $user->admin == false)
                                                Engineer
                                            @elseif($user->client_id == null && $user->admin == true)
                                                Admin
                                            @else
                                                {{$user->client->client}}
                                            @endif
                                        </td>
                                        <td class="px-4 py-2 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                            <div class="row flex">
                                                @if($user->id != auth()->user()->id)
                                                    <a href="{{route('users.un_auth', $user->id)}}" onclick="return confirm('Are you sure you want to remove authorisation for {{$user->name}}?')" class="ml-auto inline-flex items-center btn-yellow">Unauthorise</a>
{{--                                                    <form action="{{route('users.delete', $user->id)}}" method="POST">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('DELETE')--}}
{{--                                                        <button onclick="return confirm('Are you sure you want to delete {{$user->name}}?  This can not be undone!')" class="ml-4 inline-flex items-center btn-red">Delete</button>--}}
{{--                                                    </form>--}}
                                                @endif
                                                <a href="{{route('users.edit', $user->id)}}" class="{{($user->id == auth()->user()->id) ? 'ml-auto' : 'ml-4'}} inline-flex items-center btn-indigo">Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endif

                        @endforeach
                    </table>
                </div>
                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

@stop
