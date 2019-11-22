<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coursereg extends Model
{
    protected $fillable = [
        'course_id',
        'email',
        'names',
        'phone',
        'gender',
        'dob',
        'country',
        'address',
        'edu_level',
        'nok_name',
        'nok_address',
        'nok_phone',
        'status',
        'course_expec',
        'course_qst',
    ];

    public function course($tag){
        return Course::where('id', $this->course_id)->first()->$tag;
    }

    public function coursename(){

    }

    public function setedu(){
        switch ($this->edu_level){
            case 1:
                return 'Primary School Certificate';
                break;
            case 2:
                return 'Secondary School Certificate';
                break;
            case 3:
                return 'Higher Institution/Equivalent';
                break;
            case 4:
                return 'Masters/Equivalent';
                break;
            case 5:
                return 'Doctorate';
                break;


        }
    }













}
