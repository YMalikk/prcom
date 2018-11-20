<?php

namespace App\Modules\User\Models;

class AuthAccessToken
{

    protected $table = 'oauth_access_tokens';
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
