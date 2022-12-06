<?php

namespace App\Http\Controllers\Order\Realization;

use App\Http\Controllers\Controller;
use App\Models\Order;

class IndexController extends Controller
{
    public function __invoke()
    {
        // Все новые заказы, типа РАСХОД

        $orders = Order::where('type_id', 2)->where('status_id', 1)->get();
        return view('order.realization.index', compact('orders'));
    }
}
