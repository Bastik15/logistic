<?php

namespace App\Http\Middleware;

use App\Models\Order;
use App\Models\Storage;
use Closure;
use Illuminate\Http\Request;

class Count
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
        $realization = $request->route('realization');
        $products = $realization->products()->get();
        $storageProducts = Storage::find(1)->products()->get();

        foreach ($products as $key => $product) {
            if ($storageProducts->where('id', $product->product_id)->first()->more()->first()->amount < $product->amount) {
                break (1);
            } else {
                if (++$key == $products->count()) {
                    return $next($request);
                }
                continue;
            }
        }
        return redirect()->route('realization.show', $realization);
    }
}
