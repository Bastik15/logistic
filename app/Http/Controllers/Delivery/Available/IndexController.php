<?php

namespace App\Http\Controllers\Delivery\Available;

use App\Http\Controllers\Controller;
use App\Models\Order;

class IndexController extends Controller
{
    public function __invoke()
    {
        // Доступные к доставке заказы
        $orders = Order::where('is_performed', 1)->where('status_id', 2)->where('driver_id', null)->get();
        return view("delivery.available.index", compact('orders'));
    }
}
