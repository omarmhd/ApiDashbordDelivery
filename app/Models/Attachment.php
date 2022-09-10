<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends BaseModel
{
    use HasFactory;

    public $guarded = ['_token'];

    public function attachmentable()
    {
        return $this->morphTo();
    }
}
