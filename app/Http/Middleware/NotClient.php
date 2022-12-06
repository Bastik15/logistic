<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NotClient
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role->id == 1) {
            return abort(403);
        }

        return $next($request);
    }
}
