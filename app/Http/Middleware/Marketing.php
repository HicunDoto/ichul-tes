<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Marketing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        dd(auth()->user());

        if ( ! auth()->user() ){
            return redirect('/')->with('status', 'Mohon Login Terlebih Dahulu!');; 
        }elseif(auth()->user()->level != "1"){
            //dd($request->all());
            return redirect('/customer'); 
        }else{
            return $next($request);
        }
    }
}
