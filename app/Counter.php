<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;
use Carbon\Carbon;
use DateTime;

class Counter extends Model
{
    protected $fillable = [
        'ip', 'device', 'region', 'city', 'country','url', 'time',
    ];

    public static function saveit($data){
        $ip = $data['ip'];
        $today = strtotime('today');
        $visits = Counter::where('ip','=', $ip)->where('time', '>=', $today)->first();

        if(!empty($visits) && count($visits)>0){
            $visits->update($data);
            Hit::create($data);
        }else{
            Counter::create($data);
            Hit::create($data);
        }
    }

    public function timeago(){
        return Carbon::createFromTimeStamp($this->time)->diffForHumans();
    }

    public function hits(){
        return Hit::orderBy('id', 'DESC')->where('ip', '=',$this->ip)
            ->where('time','>=', strtotime(date('F d, Y', $this->time)))
            ->where('time','<', strtotime(date('F d, Y', $this->time))+86400)
            ->get();
    }

    public function today(){
        return Counter::where('time','>=', strtotime('today'))->get();
    }

    public function thismonth(){

        $thismonth = new DateTime('first day of this month');
        $thismonth = strtotime($thismonth->format('F Y'));
        return Counter::where('time','>=', $thismonth)->get();
    }

    public function thisweek(){
        $disweek = strtotime('last Monday');
        return Counter::where('time','>=', $disweek)->get();
    }

    public function thisyear(){
        $thisyear = strtotime('first day of January'.date('Y'));
        return Counter::where('time','>=', $thisyear)->get();
    }
}
