<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        // Выбираем всех пользователей
        $users = User::all();
        return view('users.index', compact('users'));
    }
}
