<?php

namespace App\Http\Middleware;

use App\Models\Inspection;
use Closure;
use Illuminate\Http\Request;
use Throwable;

class OwnsInspection
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $inspection = Inspection::findOrFail(request()->route()->parameter('inspection')->id);


        if(auth()->user()->admin || auth()->user()->client_id == null){
            return $next($request);
        }
        elseif(auth()->user()->client_id == $inspection->client_id){
            return $next($request);
        }
        return redirect()->route('not_owner');
    }
}
