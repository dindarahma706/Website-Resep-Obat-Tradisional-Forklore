<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerifiedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * 
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->status == '1') {
                return $next($request);
            } else {
                return redirect('/home')->with('status', 'Kamu belum diverifikasi oleh admin');
            }
        } else {
            // return redirect()->route('logout');
            return redirect('/home')->with('status', 'Kamu belum Login.');
        }
    }
}
