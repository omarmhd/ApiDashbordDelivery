<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverOrderRequest extends Model
{
    use HasFactory;

    protected $fillable = ['driver_id', 'order_id'];

    public function driver()
    {
        return $this->hasOne(User::class, 'id', 'driver_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id', 'order_id');
    }
}
