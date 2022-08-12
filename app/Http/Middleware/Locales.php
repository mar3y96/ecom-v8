<?php

namespace App\Http\Middleware;

use Closure;

class Locales
{
    public function __construct(){
        if ($lang = session()->get('lang')) {
            \App::setLocale($lang);
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
