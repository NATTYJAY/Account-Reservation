<?php

namespace App\Http\Middleware;

use Closure;

class checkAccountReservedSession
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
        if($request->session()->has('api_token')){
            return $next($request);
        }else{
            return redirect(route('login'))->with('error','Your Session has expired');
        }
        
    }
}
