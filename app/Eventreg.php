<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventreg extends Model
{
    protected $fillable = [
        'program_id',
        'title',
        'fname',
        'lname',
        'email',
        'telephone',
        'location',
        'gender',
        'status',
        'dob',
        'hearhow',
        'expectation',
        'ticket',
        'tverify',
        'tvtime',
        'certificate'
    ];

    public function event($id){
        return Program::find($id)->title;
    }

    public function events(){
        return $this->belongsTo(Program::class);
    }

}
