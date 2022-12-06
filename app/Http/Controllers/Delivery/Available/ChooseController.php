<?php

namespace App\Http\Controllers\Delivery\Available;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ChooseController extends Controller
{

    public function __invoke(Order $order)
    {
        // Доставляемые заказы
        $order->update(['driver_id' => auth()->user()->id, 'status_id' => 3]);
        return redirect()->route('available.index');
    }
}
