<?php

namespace App\Models;

use App\Traits\Resoureces;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extras extends BaseModel
{
    use HasFactory,Resoureces;

    protected $guarded = [
        '_token',
    ];
    public $appends=['image_url'];


}
