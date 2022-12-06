<?php

namespace App\Http\Controllers\Order\Realization;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\StorageProduct;

class ExecuteController extends Controller
{

    public function __invoke(Order $realization)
    {
        // Продукты заказа Реализации
        $products = $realization->products()->get();
        $storage = StorageProduct::all();
        foreach ($products as $product) {
            // Если запись в заказе имеется, то уменьшаем количество товара
            $check = $storage->where('product_id', $product->product_id)->first();
            !is_null($check) ? $check->update(['amount' => $check->amount - $product->amount]) : '';
        }

        // Меняем статус заказа на "На рассмотрении" и указываем что заказ проведен
        $realization->update(['is_performed' => 1, 'status_id' => 2]);
        return redirect()->route('realization.index');
    }
}
