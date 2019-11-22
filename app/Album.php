<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'title',  'type',  'gallery_id',   'info',  'status',
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }

    public function picture(){
        return $this->hasMany(Picture::class);
    }

}
