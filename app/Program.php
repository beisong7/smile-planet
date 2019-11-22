<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'title',  'url',  'detail', 'venue' ,  'date',  'time',  'status',  'type',  'gallery_id', 'dates', 'ticket',
        'hascert', 'certificate'
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }

    public function users(){
        return $this->hasMany(Eventreg::class);
    }


//    protected $dates = ['date'];




}
