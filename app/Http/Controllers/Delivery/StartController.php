<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        // Все заказы принятые к доставке
        $orders = $user->orders->where('status_id', 3);
        // Изменение статуса заказов на "В пути"
        foreach ($orders as $order) {
            $order->update(['status_id' => 4]);
        }

        return back();
    }
}
