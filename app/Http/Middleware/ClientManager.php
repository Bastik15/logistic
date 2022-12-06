<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientManager
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() == true || auth()->user()->role->id == 1 || auth()->user()->role->id == 3) {
            return $next($request);
        }

        abort(403);
    }
}
