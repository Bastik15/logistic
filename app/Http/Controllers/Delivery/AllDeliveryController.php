<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\User;

class AllDeliveryController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        // Все доставленные заказы
        $orders = $user->orders->where('status_id', 5);
        return view('delivery.allDelivery', compact('orders'));
    }
}
