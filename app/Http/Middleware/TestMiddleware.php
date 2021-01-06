<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Blade;

class TestMiddleware
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
        session()->regenerate();
        $v= session()->get('table');
        if($v != 'doctor'){return back();}


        return $next($request);

    }
}
