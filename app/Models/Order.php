<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'status', //'NOT_GET_YET', 'GET_ORDER', 'IN_WAY', 'IN_LOCATION'
        'total_arrive_time',
        'payment_way',
        'delivery_time',
        'time_of_receipt',
        'notes',
        'rate',
        // 'driver_id',
    ];

    public function customer()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function driver()
    {
        return $this->hasOne(User::class, 'id', 'driver_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderMealDetails::class, 'order_id');
    }
}
