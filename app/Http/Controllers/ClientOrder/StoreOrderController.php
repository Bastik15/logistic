<?php

namespace App\Http\Controllers\ClientOrder;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientOrder\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreOrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreOrderRequest $request, Order $order)
    {
        $product = $request->validated();
        // Добавление данных в Storage_products
        $order->products()->create(['product_id' => $product['product_id'], 'amount' => $product['amount'], 'price' => Product::find($product['product_id'])->more->price]);
        return back();
    }
}
