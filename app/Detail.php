<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $fillable = [
        'title',
        'info',
        'link',
        'image',
        'type',
        'relative',
        'creator_id',
        'active',
    ];

    public function creator(){
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function people(){
        return People::where('related', $this->relative)->get();
//        return $this->hasMany(People::class, 'related', 'relative');
    }
}
