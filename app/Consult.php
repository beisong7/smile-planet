<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    protected $fillable = [

        'first_name',
        'surname',
        'other_name',
        'email',
        'phone',
        'bus_type',
        'bus_category',
        'bus_ideal',
        'location',
        'active',
        'time',

    ];

    public function fullname(){
        return $this->first_name .' '. $this->surname .' '. $this->other_name;
    }
}
