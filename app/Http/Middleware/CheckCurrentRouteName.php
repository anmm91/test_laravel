<?php

namespace App\Http\Middleware;

use Closure;

class CheckCurrentRouteName
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
        if($request->route()->named('named')){

            echo 'true middle ware to check named method';
        }else{
            echo 'the name of current route not match to the name of this route';
        }
        return $next($request);
    }
}
