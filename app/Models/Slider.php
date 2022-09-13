<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [
        '_token',
    ];

    protected $fillable = ['name', 'order_index', 'status'];

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable');
    }

}
