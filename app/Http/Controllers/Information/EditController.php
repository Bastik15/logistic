<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use App\Models\About;

class EditController extends Controller
{
    public function __invoke()
    {
        // Создание информации о пользователе
        if (is_null(auth()->user()->about)) {
            About::create(['user_id' => auth()->user()->id]);
        }

        $about = auth()->user()->about;


        return view('information.edit', compact('about'));
    }
}
