<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'aboutus', 'f_aboutus', 'e_aboutus','vision','corevals','mission', 'f_what_we_do',
        'f_what_we_do_img', 'f_aims_obj', 'f_aims_obj_img', 'f_events', 'f_events_img',
        'f_reach', 'f_reach_img',
    ];



}
