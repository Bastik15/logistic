<?php

namespace App\Http\Controllers\ClientOrder;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Storage;

class EditController extends Controller
{

    public function __invoke(Order $order)
    {
        // Получение продуктов из БД
        $products = Storage::find($order->storage_id)->products()->get();
        // Получение продуктов в определенном заказе
        $orderProducts = $order->products()->get();
        return view('clientOrder.edit', compact('products', 'orderProducts', 'order'));
    }
}
