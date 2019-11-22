<?php

namespace App\Http\Middleware;

use App\Counter;
use App\Detail;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Count
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        View::share('abouts', Detail::where('active',true)->where('type', 'about')->select(['link', 'type', 'title'])->get());
        View::share('courses', Detail::where('active',true)->where('type', 'courses')->select(['link', 'type', 'title'])->get());
        View::share('vocations', Detail::where('active',true)->where('type', 'vocations')->select(['link', 'type', 'title'])->get());

        if ($request->isMethod('get')){

            $ip = getenv('HTTP_CLIENT_IP') ? :
                getenv('HTTP_X_FORWARDED_FOR') ? :
                    getenv('HTTP_X_FORWARDED') ? :
                        getenv('HTTP_FORWARDED_FOR') ? :
                            getenv('HTTP_X_FORWARDED') ? :
                                getenv('REMOTE_ADDR');

//            $counter = new Counter();
//            $counter->setIpInfo($ip);

            //get device type

            $url = $request->url();

            $save['ip'] = $request->ip();
            $save['device'] = $this->detectDevice($request->header('User-Agent'));
            $save['url'] = $url;
            $save['time'] = time();


            Counter::saveit($save);

            return $next($request);
        }

        if($request->isMethod('post')){
            return $next($request);
        }
    }

    function detectDevice($agent){
        $deviceName= '';
        $userAgent = $_SERVER["HTTP_USER_AGENT"];
        $devicesTypes = array(
            "computer" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
            "tablet"   => array("tablet", "android", "ipad", "tablet.*firefox"),
            "mobile"   => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
            "bot"      => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
        );
        foreach($devicesTypes as $deviceType => $devices) {
            foreach($devices as $device) {
                if(preg_match("/" . $device . "/i", $agent)) {
                    $deviceName = $deviceType;
                }
            }
        }
        return ucfirst($deviceName);
    }
}
