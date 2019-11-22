<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name',  'gallery_id',
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }
}
