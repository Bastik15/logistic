<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\RolePartner;

class CreateController extends Controller
{
    public function __invoke()
    {
        $roles = RolePartner::all();
        return view('partner.create', compact('roles'));
    }
}
