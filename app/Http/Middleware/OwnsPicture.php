<?php

namespace App\Http\Middleware;

use App\Models\Picture;
use Closure;
use Illuminate\Http\Request;

class OwnsPicture
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
        if (auth()->user()->admin || auth()->user()->client_id == null) {
            return $next($request);
        }
        $picture = Picture::findOrFail(request()->route()->parameter('picture')->id);
        if (auth()->user()->client_id == $picture->inspection->client_id) {
            return $next($request);
        }
        return response()->view('auth.not_owner');
    }
}
