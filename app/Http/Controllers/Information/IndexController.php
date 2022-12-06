<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use App\Models\About;

class IndexController extends Controller
{

    public function __invoke()
    {
        if (is_null(auth()->user()->about)) {
            // Создание информации о пользователе
            $about = About::create(['user_id' => auth()->user()->id]);
        } else {
            $about = auth()->user()->about;
        }

        return view('information.index', compact('about'));
    }
}
