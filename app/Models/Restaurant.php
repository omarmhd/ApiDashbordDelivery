<?php

namespace App\Models;

use App\Traits\Resoureces;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends BaseModel
{
    use HasFactory;
    use Resoureces;
    protected $guarded = [
        '_token',

    ];
    public $appends=['image_url'];
    public $hidden=['updated_at','attachment','image','latitude','longitude','phone','delivery_time','description'];
}
