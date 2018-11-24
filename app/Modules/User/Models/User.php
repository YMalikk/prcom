<?php

namespace App\Modules\User\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'tel',
        'sex',
        'address',
        'birth_date',
        'hired_date',
        'civil_situation',
        'last_connected_time',
        'banned_time',
        'nationality',
        'role_id',
        'cin',
        'passport',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function images()
    {
        return $this->hasMany('App\Modules\User\Models\Images', 'user_id','id');
    }
}
