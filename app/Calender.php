<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    protected $fillable = [
        'date', 'time', 'theme', 'venue', 'organizer',
    ];
}
