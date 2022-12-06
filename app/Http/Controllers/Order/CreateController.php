<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Storage;
use App\Models\TypeOrders;

class CreateController extends Controller
{
    public function __invoke()
    {
        $storages = Storage::all();
        $partners = Partner::all();
        $types = TypeOrders::all();
        return view('order.create', compact('storages', 'partners', 'types'));
    }
}
