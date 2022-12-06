<?php

namespace App\Http\Controllers\Truck;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use App\Models\User;

class ChooseController extends Controller
{
    public function __invoke(Truck $truck)
    {
        $user = auth()->user();
        if (is_null($user->truck->first())) {
            // Если у пользователя нет авто - добавляем
            $truck->update(['user_id' => $user->id]);
        } elseif ($user->truck->first()->id == $truck->id) {
            // Если у пользователя авто, которую мы выбрали - удаляем
            $user->truck->first()->update(['user_id' => null]);
            foreach ($user->orders->where('status_id', '<>', 5) as $order) {
                // Также удаляем все заказы, которые он принял для доставки
                $order->update(['driver_id' => null, 'status_id' => 2]);
            }
        } else {
            // Удаляем авто у пользователя
            $user->truck->first()->update(['user_id' => null]);
            $truck->update(['user_id' => $user->id]);
        }

        return back();
    }
}
