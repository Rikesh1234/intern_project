<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check() ) {
            $user = Auth::user();

            // Check the user's status
            if (!$user->status) {
                // Forcefully log out the user
                Auth::logout();

                // Redirect to the login page with a message
                return redirect()->route('login')->with('error', 'Your account is not active.');
            }

            if($user->force_logout_token != null){
                Auth::logout();

                $user->force_logout_token = null;
                $user->update();
                // Redirect to the login page with a message
                return redirect()->route('login')->with('error', 'Password was changed please log in to continue.');
            }
        }

        return $next($request);
    }
}
