<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Constant extends BaseModel
{
    use SoftDeletes;
    protected $table = 'constants';


    public function children()
    {
        return $this->hasMany(Constant::class,'parent_id','id');
    }
}
