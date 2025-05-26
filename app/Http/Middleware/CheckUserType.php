<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$usertypes
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next, ...$usertypes)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the current user's usertype
            $userType = Auth::user()->UserType;

            // If the user's type is not in the allowed usertypes, deny access
            if (!in_array($userType, $usertypes)) {
                abort(403, 'Unauthorized action - No sufficient Privileges.');
            }
        }

        // Proceed to the next middleware or controller
        return $next($request);
    }
}
