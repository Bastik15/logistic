<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Partner $partner)
    {
        // Удаление партнера
        $partner->delete();
        return back();
    }
}
