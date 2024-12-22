<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/cms/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->force_logout_token != null) {
            $user->force_logout_token = null;
            $user->update();
        }

        if (!$user->status) {
            // If user status is not active, log them out
            Auth::logout();
            auth()->logout();
            return redirect()->route('login')->with('error', 'Your account is not active.');
        }
    }

    protected function loggedOut(Request $request)
    {
        return redirect('/login'); // Change this to the desired URL after logout
    }
}
