<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function role()
    {
        return $this->belongsTo(RolePartner::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
