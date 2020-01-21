<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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


        $role = array_slice(func_get_args(), 2);
//
//        var_dump($role);
        if(array_key_exists($role)){
            echo 'good';
        }
        return $next($request);
    }
}
