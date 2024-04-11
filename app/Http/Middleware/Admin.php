<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->user_type == 'admin') {
            return $next($request);
        } elseif (Auth::user()->user_type == 'client') {
            return redirect(route('dashboard'))->withErrors(['You do not have admin access']);
        } else {
            abort(401); // Not authorized
        }
    }
}
