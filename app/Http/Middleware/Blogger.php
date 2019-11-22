<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Blogger
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
        if(Auth::user()->who ===4 || Auth::user()->job === 'BL'){
            return $next($request);
        }else{
            return back()->withErrors(array('message'=>'You dont have access to this operation.'));
        }

    }
}
