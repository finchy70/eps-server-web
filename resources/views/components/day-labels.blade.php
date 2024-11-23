@props([
'startOfMonth',
'actualStartOfMonth',
'actualEndOfMonth',
'i'
])
<div class="mb-4 mt-1 grid grid-cols-7 gap-2 text-xs">
    <div class="{{(Carbon\Carbon::parse($startOfMonth->copy())->addDays($i*7) <
        Carbon\Carbon::parse($actualStartOfMonth) || Carbon\Carbon::parse($startOfMonth->copy())->addDays($i*7) >
        Carbon\Carbon::parse($actualEndOfMonth)) ? 'text-gray-400 ' : 'text-gray-900'}}">
        Mon: {{Carbon\Carbon::parse($startOfMonth->copy())->addDays($i*7)->format('d-m-y')}}
    </div>
    <div class="{{(Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+1) <
        Carbon\Carbon::parse($actualStartOfMonth) || Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+1) >
        Carbon\Carbon::parse($actualEndOfMonth) ? 'text-gray-400 ' : 'text-gray-900')}}">
        Tues: {{Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+1)->format('d-m-y')}}
    </div>
    <div class="{{(Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+2) <
        Carbon\Carbon::parse($actualStartOfMonth) || Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+2) >
        Carbon\Carbon::parse($actualEndOfMonth) ? 'text-gray-400 ' : 'text-gray-900')}}">
        Wed: {{Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+2)->format('d-m-y')}}
    </div>
    <div class="{{(Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+3) <
        Carbon\Carbon::parse($actualStartOfMonth) || Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+3) >
        Carbon\Carbon::parse($actualEndOfMonth) ? 'text-gray-400 ' : 'text-gray-900')}}">
        Thur: {{Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+3)->format('d-m-y')}}
    </div>
    <div class="{{(Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+4) <
        Carbon\Carbon::parse($actualStartOfMonth) || Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+4) >
        Carbon\Carbon::parse($actualEndOfMonth) ? 'text-gray-400 ' : 'text-gray-900')}}">
        Fri: {{Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+4)->format('d-m-y')}}
    </div>
    <div class="{{(Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+5) <
        Carbon\Carbon::parse($actualStartOfMonth) || Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+5) >
        Carbon\Carbon::parse($actualEndOfMonth) ? 'text-gray-400 ' : 'text-gray-900')}}">
        Sat: {{Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+5)->format('d-m-y')}}
    </div>
    <div class="{{(Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+6) <
        Carbon\Carbon::parse($actualStartOfMonth) || Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+6) >
        Carbon\Carbon::parse($actualEndOfMonth) ? 'text-gray-400 ' : 'text-gray-900')}}">
        Sun: {{Carbon\Carbon::parse($startOfMonth->copy())->addDays(($i*7)+6)->format('d-m-y')}}
    </div>
</div>


