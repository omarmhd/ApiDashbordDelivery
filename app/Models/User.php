<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{

    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        '_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->withDefault();
    }

    public function driver()
    {
        return $this->hasOne(Driver::class)->withDefault();
    }

    public function fullName()
    {
        return  $this->first_name . ' ' . $this->last_name;
    }

    public function arRoleName(){
        $role = $this->roles[0]->name;
        return __('others.'.$role);
    }

    public function roleName(){
        return $this->roles[0]->name;
    }

}
