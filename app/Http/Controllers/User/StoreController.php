<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $user = $request->validated();
        // Создаем пользователя, силами небес(Администратор)
        User::create([
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
            'role_id' => $user['role_id'],
        ]);

        return redirect()->route('users.index');
    }
}
