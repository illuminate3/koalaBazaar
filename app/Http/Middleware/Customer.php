<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Customer
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

        if(!Auth::user()->isCustomer()){
           return redirect()->action('AuthenticationController@showRegister')->withErrors(['messages'=>['Lütfen müşteri olarak giriş yapınız.']]);
        }
            return $next($request);


    }
}
