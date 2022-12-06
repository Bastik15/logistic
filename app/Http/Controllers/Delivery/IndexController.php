<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;

class IndexController extends Controller
{

    public function __invoke()
    {
        $user = auth()->user();
        // Все машины
        $truck = $user->truck->first();
        // Все заказы которые не доставлены у определенного водителя
        $orders = Order::where('driver_id', $user->id)->where('status_id', '<>', 5)->get();
        return view('delivery.index', compact('truck', 'orders'));
    }
}
