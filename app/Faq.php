<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'qst',
        'unid',
        'ans',
        'active',
    ];
}
