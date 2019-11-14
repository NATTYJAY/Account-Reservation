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
            if($request->session()->has('api_token_expired') && $request->session()->get('api_token_expired') != 0){
                return $next($request);
            }
        }else{
            return redirect(route('login'))->with('error','Your Session has expired');
            $request->session()->has('api_token');
            $request->session()->has('api_token_expired');
           
        }
        
    }
}
