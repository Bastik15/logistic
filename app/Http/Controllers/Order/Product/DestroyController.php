<?php

namespace App\Http\Controllers\Order\Product;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class DestroyController extends Controller
{

    public function __invoke(Order $order, Product $product)
    {
        // Удаление товара в заказе
        $order->products()->where('product_id', $product->id)->first()->delete();
        return back();
    }
}
