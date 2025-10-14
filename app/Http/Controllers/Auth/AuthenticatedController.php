<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthenticatedController
{
    public function login()
    {

        return view('auth.login.login');
    }

    public function authenticated(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index');
        }
        else{
            return redirect()->route('auth.login');
        }
    }
    public function destroy(Request $request):RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function berbinarPlusLogin()
    {
        return view('auth.login.login-user');
    }
}
