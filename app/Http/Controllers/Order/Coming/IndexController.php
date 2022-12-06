<?php

namespace App\Http\Controllers\Order\Coming;

use App\Http\Controllers\Controller;
use App\Models\Order;

class IndexController extends Controller
{
    public function __invoke()
    {
        // Все новые заказы, типа ПРИХОД
        $orders = Order::where('type_id', 1)->where('status_id', 1)->get();
        return view('order.coming.index', compact('orders'));
    }
}
