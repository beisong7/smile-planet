<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilitator extends Model
{
    //

    protected $fillable = [
        'fname',  'lname',  'title',  'gender',  'dob',  'passport',  'edu_course',  'edu_grad',  'edu_pcourse',
        'edu_pgrad',  'jobrole',  'cur_busname',  'other_skill',  'oavailable',  'oavailable2',  'fduty',  'fduty2',
        'skilreq',  'skilnhobby',  'rea4app',  'exp4role',  'hearhow',  'hearhow2',  'tel1',  'tel2',  'email',
        'country',  'state',  'address',  'website',  'fbook',  'igram',  'twitter',  'arname',  'arorganisation',
        'arposition',  'aremail',  'arphone',  'prname',  'prorganisation',  'prposition',  'premail',  'prphone',
        'status',  'verify',  'formkey',
    ];

    public function extra(){
        return $this->hasOne(Facilit::class);
    }

    public function hasApplied(){
        $applied = Facilit::where('facilitator_id', $this->id)->first();
        if(empty($applied)){
            return false;
        }else{
            return true;
        }
    }

    public function courseTitle($title){
        $course = Course::where('title', $title)->first();
        if(empty($course)){
           return "Course with title ( $title ) Not Found";
        }
        return $course->title;
    }
}
