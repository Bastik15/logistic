<?php

namespace App\Http\Controllers\Truck;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (auth()->user()->role->name == 'Водитель') {
            // Если авторизированный польхователь - Водитель, то выбираем все авто
            $trucks = Truck::where('user_id', null)->get();
            // Выбираем авто пользователя
            $myTruck = Truck::where('user_id', auth()->user()->id)->first();

            return view('truck.index', compact('trucks', 'myTruck'));
        } elseif (auth()->user()->role->name == 'Менеджер') {
            // Если менеджер, выбираем все авто
            $trucks = Truck::all();

            return view('truck.index', compact('trucks'));
        } else {
            // Возвращаем ошибку 403
            return abort(403);
        }
    }
}
