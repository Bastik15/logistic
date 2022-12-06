<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Client
{

    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() == false || auth()->user()->role->id != 1) {
            abort(403);
        }
        return $next($request);
    }
}
