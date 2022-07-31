<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'ammount',
        'uses',
        'status',
        'start_avilable_at',
        'end_avilable_at',
    ];
}
