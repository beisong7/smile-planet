<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'image',
        'logo',
        'writeup1',
        'writeup2',
        'link',
        'active',
        'creator',
        'show_btn',
        'show_logo',
        'btn1_name',
        'btn1_link',
        'btn2_name',
        'btn2_link',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'creator');
    }
}
