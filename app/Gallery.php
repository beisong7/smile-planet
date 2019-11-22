<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'url','size','type','file_name'
        ];

    public function banner(){
        return $this->hasOne(Banner::class);
    }

    public function program(){
        return $this->hasOne(Program::class);
    }

    public function partner(){
        return $this->hasOne(Partner::class);
    }

    public function people(){
        return $this->hasOne(People::class);
    }

    public function blog(){
        return $this->hasMany(Blog::class);
    }

    public function album(){
        return $this->hasMany(Album::class);
    }
    public function picture(){
        return $this->hasMany(Picture::class);
    }

}
