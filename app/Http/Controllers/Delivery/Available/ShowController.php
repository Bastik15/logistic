<?php

namespace App\Http\Controllers\Delivery\Available;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Order $order)
    {
        $products = $order->products()->get();
        return view('delivery.available.show', compact('products', 'order'));
    }
}
