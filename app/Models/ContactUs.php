<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends BaseModel
{
    protected $fillable = ['user_id','message', 'file'];
}
