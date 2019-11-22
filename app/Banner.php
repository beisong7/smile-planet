<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title', 'target', 'gallery_id','type'
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }

}
