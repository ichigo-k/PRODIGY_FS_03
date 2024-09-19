<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check the user's role
            if (Auth::user()->role === $role) {
                return $next($request);
            } else {
                // Redirect based on user's role if they don't have the required role
                if (Auth::user()->role === 'admin') {
                    return redirect('/admin/dashboard');
                } else {
                    return redirect('/');
                }
            }
        }

        // Redirect if not authenticated
        return redirect('/');
    }
}
