<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Models\Order;

class StoreOrderController extends Controller
{
    public function __invoke(StoreOrderRequest $request, Order $order)
    {
        $product = $request->validated();
        // Создание продукта в заказе
        $order->products()->create(['product_id' => $product['product_id'], 'amount' => $product['amount'], 'price' => $product['price']]);

        return back();
    }
}
