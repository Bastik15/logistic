<?php

namespace App\Http\Controllers\Truck;

use App\Http\Controllers\Controller;
use App\Http\Requests\Truck\StoreRequest;
use App\Models\Truck;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $truck = $request->validated();
        // Создаем машину
        Truck::create($truck);

        return redirect()->route('truck.index');
    }
}
