<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Detail extends Model
{
    //
    protected $fillable = [
        'title',
        'info',
        'link',
        'image',
        'type',
        'featured',
        'featured1',
        'relative',
        'creator_id',
        'use_reg',
        'active',
        'pay',
        'price'
    ];

    public function creator(){
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function people(){
        return People::where('related', $this->relative)->orderBy('id', 'asc')->get();
//        return $this->hasMany(People::class, 'related', 'relative');
    }

    public function info($n){
        return Str::words(strip_tags($this->info), $n, '...');
    }


}
