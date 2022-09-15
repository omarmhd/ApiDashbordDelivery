<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMealDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'meal_id',
        'number_of_meals',
        'extras',
        'categories',
        'total_price',
        'meal_extras',
    ];

    public function meal()
    {
        return $this->belongsTo(Meal::class, 'meal_id');
    }
}
