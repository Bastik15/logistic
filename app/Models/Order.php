<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'orders_positions');
    }

    public function type()
    {
        return $this->belongsTo(TypeOrders::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
