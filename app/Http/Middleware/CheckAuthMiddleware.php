<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthMiddleware
{
        /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::guard('admin')->check() && (Auth::guard('admin')->user()->user_type == 'admin' || Auth::guard('admin')->user()->user_type == 'staff')) {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        else{
            return $next($request);
        }
    }
}
