<?php

namespace App\Models;

use App\Traits\Resoureces;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    use Resoureces;
    protected $guarded = [
        '_token',
    ];

    protected $fillable = ['name', 'order_index', 'status'];

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable');
    }

}
