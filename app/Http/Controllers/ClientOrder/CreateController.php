<?php

namespace App\Http\Controllers\ClientOrder;

use App\Http\Controllers\Controller;


class CreateController extends Controller
{
    public function __invoke()
    {
        return view('clientOrder.create');
    }
}
