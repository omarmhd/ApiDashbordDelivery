<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes;

    protected $guarded = ['_token'];
    protected $casts = [
        "created_at" => 'datetime:Y-m-d H:i:s',
        "updated_at" => 'datetime:Y-m-d H:i:s',
        "deleted_at" => 'datetime:Y-m-d H:i:s',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getCreatedDateAttribute()
    {
      return Carbon::parse($this->created_at)->format('Y-m-d H:i:s');
    }
    public function getUpdatedDateAttribute()
    {
      return Carbon::parse($this->created_at)->format('Y-m-d H:i:s');
    }
}
