<?php

namespace App\Http\Middleware;
// use Illuminate\Support\Facades\Auth;

use Closure;

class Owner
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
        $user = auth()->user();
        if(strtolower($user->admin) == 1){
            return $next($request);

        }
           return abort(404);
    }
}
