<?php

namespace App\Http\Controllers\ClientOrder;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{

    public function __invoke()
    {
        $user = auth()->user();
        // Заказы пользователя
        $orders = $user->clientOrders;
        return view('clientOrder.index', compact('orders'));
    }
}
