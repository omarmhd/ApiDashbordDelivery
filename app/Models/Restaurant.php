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
    public $appends=['image_url'];
    public $hidden=['updated_at','attachment','image','latitude','longitude','phone','delivery_time','description'];

    public function  getImageUrlAttribute(){

        return $this->attachment->name?asset('asset/images/').$this->attachment->name:null;

    }
    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->withDefault();
    }
}
