<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
class Admin
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
        if(Auth::check()) // check if user is authenticated
            if(Auth::user()->who >= 3){ // if so, check if the users role is an admin
                //update user record
                $now['last_seen'] = time();
               Auth::user()->update($now);
                return $next($request);
            }else{
                Auth::logout();
                return redirect(route('home'));
            }

        return redirect(route('console.login'))->withErrors(array('message' => 'Please Login to Continue'));
    }
}
