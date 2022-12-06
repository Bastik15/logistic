<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use App\Models\Storage;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        // Продукты в заказе
        $products = Storage::find(1)->products()->get();
        return view('storage.index', compact('products'));
    }
}
