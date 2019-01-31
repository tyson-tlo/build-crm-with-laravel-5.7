<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckActive
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
        if(!Auth::user()->isActive == 1){
            Auth::logout();
            
            //Message not returning likely because the flashed session data is lost between Logout and redirecting to our login form fomr the built-in Auth methods.
            return redirect('/')->with('not_active', 'Your account is not currently active!');
        }

        return $next($request);
    }
}
