<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\StoreRequest;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        // Получаем адресс
        $address = $request->validated();
        // Изменяем адресс авторизированного пользователя в БД
        auth()->user()->about->update(['address' => $address['address']]);

        return redirect()->route('information.index');
    }
}
