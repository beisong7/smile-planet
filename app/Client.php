<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;
    //
    //

    protected $fillable = [
        'unid',
        'names',
        'email',
        'email_valid',
        'phone_valid',
        'phone',
        'passport',
        'username',
        'address',
        'active',
        'terms',
        'password',
        'seen_last',
        'countdown_pass',
        'reset_toke',
        'creator_key',
    ];

}
