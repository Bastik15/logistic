<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __invoke(Request $request)
    {
        // Все партнеры
        $partners = Partner::all();
        return view('partner.index', compact('partners'));
    }
}
