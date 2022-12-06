<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;

class EndController extends Controller
{

    public function __invoke(Order $order)
    {
        // Обновление заказа как доставленного
        $order->update(['status_id' => 5]);
        return redirect()->route('delivery.index');
    }
}
