<?php

namespace App\Http\Controllers\ClientOrder;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientOrder\StoreRequest;
use App\Models\Order;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $order = $request->validated();
        // Добавление в БД заказа
        $order = Order::create(['title' => $order['title'], 'deadline' => $order['deadline'], 'type_id' => 2, 'client_id' => auth()->user()->id]);

        return redirect()->route('clientOrder.edit', $order);
    }
}
