<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilit extends Model
{
    protected $fillable = [
        'facilitator_id',
        'areatofac',
        'yourdays',
        'beava',
        'beava2',
        'state',
        'areaqualify',
        'areasector',
        'courset',
        'courset2',

    ];

    public function facilitator(){
        return $this->belongsTo(Facilitator::class);
    }


}
