<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsVendor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Admin = 1
        // Seller = 2
        // User = 0

        if (Auth::guard('vendor')->check())
        {
            return $next($request);
        }
        else{
            return redirect()->route('vendor.login.get');
        }
    }
}
