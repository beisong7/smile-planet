<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $fillable = [
        'fname', 'lname', 'title', 'gender', 'busemp', 'pos', 'oaddress', 'ocity', 'ostate', 'zipcode', 'tel1', 'tel2',
        'email', 'country', 'city', 'address', 'website', 'fbook', 'igram', 'tweeta', 'status', 'password', 'image','dob',
        'formkey','formtime','verify', 'hearhow', 'hearhow2', 'aboutyou'
    ];
    //

}
