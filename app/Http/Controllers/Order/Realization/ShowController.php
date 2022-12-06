<?php

namespace App\Http\Controllers\Order\Realization;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Storage;

class ShowController extends Controller
{
    public function __invoke(Order $realization)
    {
        // Продукты заказа
        $products = $realization->products()->get();
        $storageProducts = Storage::find(1)->products()->get();

        return view('order.realization.show', compact('products', 'realization', 'storageProducts'));
    }
}
