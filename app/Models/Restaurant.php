<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $guarded = [
        '_token',

    ];
    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->withDefault();
    }
}
