<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Storage;

class EditController extends Controller
{
    public function __invoke(Order $order)
    {
        if ($order->type_id === 2) {
            // Если РАСХОД, то выбираем товары имеющиеся на складе
            $products = Storage::find($order->storage_id)->products()->get();
        } else {
            // Если приход, выбираем все возможнве товары
            $products = Product::all();
        }

        // Все продукты в заказе
        $orderProducts = $order->products()->get();
        return view('order.edit', compact('order', 'products', 'orderProducts'));
    }
}
