<?php

namespace App\Http\Middleware;

use App\Models\Document;
use Closure;
use Illuminate\Http\Request;

class OwnsDocument
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
        $doc = Document::findOrFail(request()->route()->parameter('id'));
        if (auth()->user()->client_id == $doc->inspection->client_id) {
            return $next($request);
        }
        return redirect()->route('not_owner');
    }
}
