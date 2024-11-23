@props([
    'date'
])

<div>
    <div class="flex items-center justify-between mb-4 text-xs bg-white shadow overflow-hidden sm:rounded-md px-4 py-4 sm:px-6">
        <div>
            @if(auth()->user()->admin)
                <a href="{{route('diary.create')}}" class="px-2 py-1 bg-green-300 rounded border border-green-600 focus:underline hover hover:bg-green-200">New Diary Entry</a>
            @endauth
        </div>
        <div>
            <a href="{{route('diary.week', $date)}}" class="px-2 py-1 bg-yellow-300 rounded border border-yellow-500 focus:underline hover hover:bg-yellow-200">Week</a>
            <a href="{{route('diary.month', $date)}}" class="ml-2 px-2 py-1 bg-yellow-300 rounded border border-yellow-500 focus:underline hover hover:bg-yellow-200">Month</a>
        </div>
    </div>
</div>
