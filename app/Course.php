<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [

        'title',
        'gallery_id',
        'info',
        'status',
        'start',
        'cycle',
        'duration',
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }

    public function applicants(){
        return Coursereg::where('course_id', $this->id)->get();
    }

    public function lastApplied(){
        //how to get the last applied course
        $res = $this->recursiveDB($this->id,0,count(Facilit::all()));
        if($res['hasCourse']){
            return $res['time']->diffForHumans();
        }else{
            return 'not found';
        }


    }

    public function recursiveDB($key, $limit, $t){
        //t is the terminator i.e where the db is maxed out
        $response = array('hasCourse'=>false, 'time' => null );
        if($limit-1 === $t){
            return $response;
        }
        $facilit = Facilit::orderBy('created_at', 'desc')->skip($limit)->take(1)->first();


        //if not empty
        if(!empty($facilit)){
            foreach(explode('_', $facilit->courset) as $value){
                if(intval($value)===$key){
                    $response['hasCourse'] = true;
                    $response['time'] = $facilit->created_at;
                }
            }
        }

        if($response['hasCourse']){
            return $response;
        }else{
            $this->recursiveDB($key, $limit++, $t);
        }
    }

    public function facilitators(){
        $list = array();
        $facilitators = Facilitator::all();
        foreach ($facilitators as $facilitator){
            if(!empty($facilitator->extra->courset)){
                foreach(explode('_', $facilitator->extra->courset) as $value){
                    if(intval($value)===$this->id){
                        if (!in_array($facilitator->id, $list)){
                            array_push($list, $facilitator->id);
                        }
                    }
                }
            }
        }
        return Facilitator::whereIn('id', $list)->get();
    }

    public function setImage(){
        if(!empty($this->gallery->url)){
            return url('uploads/'.$this->gallery->url);
        }else{
            return url('img/default.png');
        }

    }

    public function numberofFac(){
        $application = Facilitator::all();
        $list = 0;
        foreach ($application as $person){
            if(!empty($person->extra->courset)){
                if(strpos($person->extra->courset, '_') !== false){
                    foreach(explode('_', $person->extra->courset) as $value){
                        if(intval($value) === $this->id){
                            $list++;
                        }
                    }
                }else{
                    if(intval($person->extra->courset) === $this->id){
                        $list++;
                    }
                }

            }
        }
        return $list;
    }


}
