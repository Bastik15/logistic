<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Partner\StoreRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $partner = $request->validated();
        // Создание контрагента
        Partner::create([
            'title' => $partner['title'],
            'role_id' => $partner['role_id'],
        ]);

        return redirect()->route('partner.index');
    }
}
