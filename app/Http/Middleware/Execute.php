<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Execute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        !is_null($request->route('coming')) ? $data = $request->route('coming') : $data = $request->route('realization');
        if ($data->is_performed == 0) {
            return $next($request);
        }
        return abort(403);
    }
}
