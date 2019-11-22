<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'slug', //
        'title', //
        'desc', //
        'detail',
        'category_id',//
        'tags',//
        'type',//
        'keywords',
        'banner', //
        'user_id', //
        'status', //
        'hits'


    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }

    public function status(){
        return $this->status?'Published':'Unpublished';
    }

    public function banner(){
        return url( is_file('uploads/'.$this->banner)?'uploads/'.$this->banner:'uploads/img/loading.png');
    }
}
