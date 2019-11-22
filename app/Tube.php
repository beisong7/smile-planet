<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tube extends Model
{
    protected $fillable = [
        'name', 'link',
    ];
}
