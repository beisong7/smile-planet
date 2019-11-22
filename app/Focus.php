<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Focus extends Model
{

    protected $fillable = [
        'career', 'technical', 'mentoring', 'l_coaching', 'vocation_skills', 'etrep', 'l_gov', 'body_spirit',
    ];

}
