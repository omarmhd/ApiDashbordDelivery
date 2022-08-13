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
        'is_selected',
        'start_avilable_at',
        'end_avilable_at',
    ];

    public function setStatusAttribute($value)
    {
        return $value == 1 ? 'ACTIVE' : 'NOT_ACTIVE';
    }

    // public function getStatusAttribute()
    // {
    // return $this->value == 'ACTIVE' ? 1 : 'NOT_ACTIVE';
    // }
}
