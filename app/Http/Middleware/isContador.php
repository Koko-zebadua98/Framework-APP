<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Closure;

class isContador
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
     
        $user = Auth::user()->role;
        if($user === 2){

            return $next($request);
        }

        $servicio = DB::table('servicios')->get();
        return response(view('welcome', ['servicios' => $servicio]));
        
    }
}