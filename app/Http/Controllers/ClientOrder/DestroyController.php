<?php

namespace App\Http\Controllers\ClientOrder;

use App\Http\Controllers\Controller;
use App\Models\Order;

class DestroyController extends Controller
{

    public function __invoke(Order $order)
    {
        $order->delete();
        return back();
    }
}
