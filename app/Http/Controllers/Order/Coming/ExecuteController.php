<?php

namespace App\Http\Controllers\Order\Coming;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\StorageProduct;

class ExecuteController extends Controller
{

    public function __invoke(Order $coming)
    {
        // Продукты заказа ПРИХОД
        $products = $coming->products()->get();
        $storage = StorageProduct::all();

        foreach ($products as $product) {
            // Если в базе есть товар, то добавляем к количеству, иначе создаем запись
            $check = $storage->where('product_id', $product->product_id)->first();
            !is_null($check) ? $check->update(['amount' => $check->amount + $product->amount]) : StorageProduct::create(['product_id' => $product->product_id, 'amount' => $product->amount, 'price' => $product->price, 'storage_id' => 1]);
        }

        // Меняем статус заказа на "На рассмотрении" и указываем что заказ проведен
        $coming->update(['is_performed' => 1, 'status_id' => 2]);
        return redirect()->route('coming.index');
    }
}
