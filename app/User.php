<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'username', 'tel', 'email', 'ip', 'who', 'ptoken', 'job',
        'image', 'status', 'password', 'last_seen', 'api_token', 'dsalt',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    protected $dates = [
//        'last_seen',
//    ];


    public function setPasswordAttribute($value){
        return $this->attributes['password'] = bcrypt($value);
    }

    public function who(){
        return $this->belongsTo(Who::class);
    }

    public function timeago($time){
        return Carbon::createFromTimeStamp($time)->diffForHumans();
    }

    public function mails(){
        return $this->hasMany(Memo::class);
    }






}
