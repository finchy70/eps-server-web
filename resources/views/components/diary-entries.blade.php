@props([
'start',
'end',
'entry'
])

<div>
    <div class="hidden lg:block">
        <div class="mb-2 grid grid-cols-7 gap-2">
            <ul class="col-start-{{$start}} col-span-{{$end-($start-1)}} bg-white rounded-lg shadow">
                <div class="w-full flex justify-between pt-2 pl-2 pr-2 space-x-6">
                    <div class="flex-1">
                        <div class="flex justify-between items-center space-x-3">
                            @if($entry->diary_type_id == 1)
                                <a href="{{route('diary.show', $entry->id)}}" class="text-xs leading-5 font-medium text-indigo-600">
                                    {{$entry->job_title}} <span class="text-xs bg-indigo-600 text-gray-50 px-1 rounded-full">{{$entry->diary_type->type}}</span>
                                </a>
                            @elseif($entry->diary_type_id == 2)
                                <a href="{{route('diary.show', $entry->id)}}" class="text-xs leading-5 font-medium text-green-600">
                                    {{$entry->job_title}} <span class="text-xs bg-green-600 text-gray-50 px-1 rounded-full">{{$entry->diary_type->type}}</span>
                                </a>
                            @else
                                <a href="{{route('diary.show', $entry->id)}}" class="text-xs leading-5 font-medium text-orange-600">
                                    {{$entry->job_title}} <span class="text-xs bg-orange-600 text-gray-50 px-1 rounded-full">{{$entry->diary_type->type}}</span>
                                </a>
                            @endif
                        </div>
                        <div class="mt-1 text-gray-600 font-bold text-xs leading-5">Project Manager - <span class="text-gray-400">{{$entry->project_manager}}</span></div>
                        @if($entry->users->count())
                            <div class="mt-1 text-gray-600 font-bold text-xs leading-5">Engineers</div>
                            @foreach($entry->users as $engineer)
                                <div class="{{($engineer->id == auth()->user()->id)
                                    ?'text-red-500 font-bold':'text-gray-700'}} text-xs">{{$engineer->name}}
                                </div>
                            @endforeach
                        @endif
                        <div class="mt-1 flex items-center font-bold text-xs leading-5">
                            @if(auth()->user()->admin)
                                <a class="text-green-500 mr-2 hover:text-green-700 focus:underline"
                                   href="{{route('documents.upload', $entry->id)}}">
                                    <svg class="h-5" fill="none" viewBox="0 0 24 24" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </a>
                            @endif
                            Documents: {{$entry->documents->count()}}
                        </div>
                    </div>

                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="pl-2 pb-3 pr-2 pt-2 flex">
                            @if(auth()->user()->admin)
                                <a href="{{route('diary.edit', $entry->id)}}" class="text-gray-800 bg-white">
                                    <svg class="text-gray-800 h-5" fill="none" viewBox="0 0 24 24" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11
                                        5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828
                                        2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>

                                <a href="{{route('diary.duplicate', $entry->id)}}" class="ml-4 text-gray-800 bg-white">
                                    <svg class="text-gray-800 h-5" fill="none" viewBox="0 0 24 24" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8
                                        7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0
                                        01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0
                                        002-2v-2"/>
                                    </svg>
                                </a>
                                <form action="{{route('diary.delete', $entry->id)}}" method="POST">
                                    @csrf
                                    <input type="text" hidden name="diary_id" value="{{$entry->id}}"/>
                                    <button onclick="
                                        return confirm('Are you sure you want to delete {{$entry->job_title}}?')"
                                            type="submit" class="ml-4 text-gray-800 bg-white">
                                        <svg class="text-gray-800 h-5" fill="none" viewBox="0 0 24 24" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5
                                                  7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="pl-6 pb-3 pr-6 pt-2">
                        @if(auth()->user()->admin)
                            <livewire:visible-switch :entry="$entry"/>
                        @endif
                    </div>
                </div>

            </ul>
        </div>
    </div>
    <div class="lg:hidden">
        <div class="mb-2 bg-white shadow overflow-hidden sm:rounded-md">
            <ul>
                <li>
                    <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition
                    duration-150 ease-in-out">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-start">

                                <a class="text-indigo-600 text-sm" href="/diary/{{$entry->id}}">
                                    {{$entry->job_title}}
                                </a>
                                <div class="ml-auto">
                                    <div class="flex">
                                        <span class="ml-auto px-2 inline-flex text-xs leading-5 font-semibold rounded-lg
                                        bg-green-200 text-green-800">
                                            Start: {{$entry->full_date($entry->start_date)}}
                                        </span>
                                    </div>
                                    <div class="flex">
                                        <span class="ml-auto mt-1 px-2 inline-flex text-xs leading-5 font-semibold
                                        rounded-lg bg-red-200 text-green-800">
                                            Finish: {{$entry->full_date($entry->end_date)}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between mt-2">
                                <div>
                                    <div class="text-sm leading-5 text-red-400">Project Manager - {{$entry->project_manager}}
                                    <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                             fill="currentColor">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93
                                            17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6
                                            11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                        </svg>
                                        Engineers
                                    </div>
                                    <div>
                                        @foreach($entry->users as $engineer)
                                            <div class="{{($engineer->id == auth()->user()->id)
                                                ?'text-red-500 font-bold':'text-gray-700'}} text-xs">{{$engineer->name}}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="text-xs flex">
                                    @if(auth()->user()->admin)
                                        <a class="text-green-500 mr-2 hover:text-green-700 focus:underline"
                                           href="{{route('documents.upload', $entry->id)}}">
                                            <svg class="h-5" fill="none" viewBox="0 0 24 24" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </a>
                                    @endif
                                    Documents: {{$entry->documents->count()}}
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="pl-2 pb-3 pr-2 pt-2 flex">
                            @if(auth()->user()->admin)
                                <a href="{{route('diary.edit', $entry->id)}}" class="text-gray-800 bg-white">
                                    <svg class="text-gray-800 h-5" fill="none" viewBox="0 0 24 24" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11
                                        5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828
                                        2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>

                                <a href="{{route('diary.duplicate', $entry->id)}}" class="ml-4 text-gray-800 bg-white">
                                    <svg class="text-gray-800 h-5" fill="none" viewBox="0 0 24 24" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8
                                        7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0
                                        01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0
                                        002-2v-2"/>
                                    </svg>
                                </a>

                                <form action="route{{'diary.delete', $entry->id}}" method="POST">
                                    @csrf
                                    <input type="text" hidden name="diary_id" value="{{$entry->id}}"/>
                                    <button @click="return confirm('Are you sure you want to delete
                                        {{$entry->job_title}}?')" type="submit" class="ml-4 text-gray-800 bg-white">
                                        <svg class="text-gray-800 h-5" fill="none" viewBox="0 0 24 24" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5
                                                  7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="pl-6 pb-3 pr-6 pt-2">
                        @if(auth()->user()->admin)
                            <livewire:visible-switch :entry="$entry"/>
                        @endif
                    </div>
                </div>
            </ul>
        </div>
    </div>
</div>

