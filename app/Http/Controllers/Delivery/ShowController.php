<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Status;

class ShowController extends Controller
{
    public function __invoke(Order $order)
    {
        // Товары определенного заказа
        $products = $order->products()->get();
        return view('delivery.show', compact('products', 'order'));
    }
}
