<?php

namespace App\Http\Controllers\Order\Coming;

use App\Http\Controllers\Controller;
use App\Models\Order;

class ShowController extends Controller
{
    public function __invoke(Order $coming)
    {
        // Продукты заказа
        $products = $coming->products()->get();
        return view('order.coming.show', compact('products', 'coming'));
    }
}
