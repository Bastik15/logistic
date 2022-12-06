<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Models\Order;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $order = $request->validated();
        // Создание заказа
        $order = Order::create($order);

        return redirect()->route('order.edit', $order);
    }
}
