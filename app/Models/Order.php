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
        'status',
        'total_arrive_time',
        'payment_way',
        'delivery_time',
        'time_of_receipt',
        'notes',
        'rate',
        'driver_id',
    ];
}
