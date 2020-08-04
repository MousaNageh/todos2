<?php

namespace App\Http\Middleware;

use Closure;

class chackIfEmailChanges
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
        if(auth()->user()->email == $request->email){
            auth()->user()->update(["email"=>""]) ; 
            return $next($request);
        } 
        else {
            return $next($request);
        }

        
    }
}
