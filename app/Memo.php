<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable = [
        'email', 'subject', 'title', 'body', 'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
