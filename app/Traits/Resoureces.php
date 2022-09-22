<?php

namespace App\Traits;

use App\Models\Attachment;

trait Resoureces
{
    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->withDefault();
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function  getImageUrlAttribute(){

        return $this->attachment->name?asset('images/').'/'.$this->attachment->name:null;

    }
}
