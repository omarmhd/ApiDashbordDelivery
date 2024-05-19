<?php

namespace App\Models;

use App\Traits\Resoureces;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meal extends BaseModel
{
    use HasFactory;
    use Resoureces;

    public  function extrasReL()
    {
        return $this->hasMany(Extras::class, 'meals_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
}
