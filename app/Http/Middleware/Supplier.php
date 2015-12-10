<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Supplier
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
        if(!Auth::user()->isSupplier()){
            return redirect()->action('AuthenticationController@showRegister')->withErrors(['messages'=>['Lütfen mağaza olarak giriş yapınız.']]);
        }
            return $next($request);



    }
}
