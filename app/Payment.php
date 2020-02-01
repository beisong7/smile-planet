<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'client_key',
        'unid',
        'reference',
        'kobo',
        'details',
        'success',
        'amount',
        'status',
        'gateway_message',
        'start',
        'ends',
        'link',
        'email',
    ];

    public function client(){
        return $this->hasOne(Client::class, 'unid', 'client_key');
    }

    public function purpose(){
        return $this->hasOne(Detail::class, 'link', 'link');
    }


}
