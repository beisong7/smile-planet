<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{

    protected $fillable = [
        'title',  'album_id',  'gallery_id',  'status',
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }

    public function album(){
        return $this->hasMany(Album::class);
    }


}
