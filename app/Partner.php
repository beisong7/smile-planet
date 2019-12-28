<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'gallery_id',
        'type',
        'active'
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }
}
