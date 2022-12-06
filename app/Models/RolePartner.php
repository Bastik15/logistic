<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePartner extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function partners()
    {
        return $this->hasMany(Partner::class);
    }
}
