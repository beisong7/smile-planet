<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pform extends Model
{
    //
    protected $fillable = [
        'first_name',
        'surname',
        'other_name',
        'email',
        'phone',
        'bus_type',
        'bus_name',
        'bus_category',
        'bus_phone',
        'bus_email',
        'bus_address',
        'num_employee',
        'bus_certs',
        'prog_attended',
        'seen',
        'active',
        'time',
        'detail_link',
        'detail_type',
    ];
}
