<?php

namespace App\Http\Controllers\Truck;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{

    public function __invoke()
    {
        return view('truck.create');
    }
}
