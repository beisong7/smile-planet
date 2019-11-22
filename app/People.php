<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    //
    protected $fillable = [
        'names',
        'office',
        'pos',
        'gallery_id',
        'telephone',
        'email',
        'related',
        'active',
        'o_details',
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }





}
