<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Authenticate extends Middleware
{

    public function handle($request, Closure $next, ...$guards)
{
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->guest()) {
            $currentGuard = $guard;

            if ($request->expectsJson()) {
                return response('Unauthorized.', 401);
            }

            if ($currentGuard === 'admin') {
                return redirect()->guest(route('admin.login'));
            }

            // Add more guards and their respective login routes if needed

            return redirect()->guest(route('login')); // Default login route for the 'web' guard
        }
    }

    return $next($request);
}

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {

    //     if (!$request->expectsJson()) {
    //         $currentGuard = $this->getGuardName();

    //         if ($currentGuard === 'admin') {
    //             return route('admin.login');
    //         }

    //         // Add more guards and their respective login routes if needed

    //         return route('login'); // Default login route for the 'web' guard
    //     }


    // }

    // protected function getGuardName()
    // {
    //     foreach (array_keys(config('auth.guards')) as $guard) {
    //         if (Auth::guard($guard)->check()) {
    //             return $guard;
    //         }
    //     }

    //     return null;
    // }
}