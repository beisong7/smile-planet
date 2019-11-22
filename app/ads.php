<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    protected $fillable = [
        'l_img',
        'p_img',
        'active',
        'target',
    ];
}
