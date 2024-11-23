<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Engineer
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
        if(auth()->user()->client_id != null){
            return response()->view('auth.engineer');
        }
        return $next($request);
    }
}
