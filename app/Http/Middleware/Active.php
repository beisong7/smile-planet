<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Active
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
        if(Auth::check()){
            // check if user is authenticated
            if(Auth::user()->who >= 3){ // if so, check if the users role is an admin
                return redirect(route('console.home'));
            }else{
                Auth::logout();
                return redirect(route('home'));
            }
        }else{
            return $next($request);
        }
    }
}
