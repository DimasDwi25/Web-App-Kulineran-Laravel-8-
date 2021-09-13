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
    public function handle($request, Closure $next, $roles)
    {
        //jika akun yang login sesuai dengan role
        //maka silahkan akses
        //jika tidak sesuai akan diarahkan ke home

        if($request->user()->role == $roles){
            return $next($request);
        }
        return redirect('/');
    }
}
