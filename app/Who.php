<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Who extends Model
{
    public function user(){
        return $this->hasOne(Who::class);
    }

    protected $fillable = [
        'role_name', 'role_detail', 'permission_id',
    ];
}
