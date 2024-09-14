<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckVendor
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
        // Check if the user is authenticated and is a vendor
        if (Auth::guard('vendor')->check()) {
            // User is authenticated as a vendor
            return $next($request);
        }

        // User is not authenticated as a vendor, redirect or show an error
        return redirect()->route('vendor.login')->with('error', 'You must be logged in as a vendor to access this page.');
    }
}
