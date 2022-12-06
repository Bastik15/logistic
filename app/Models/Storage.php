<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // public function availableProducts()
    // {
    //     return $this->belongsToMany(Product::class, 'storage_products');
    // }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'storage_products');
    }
}
