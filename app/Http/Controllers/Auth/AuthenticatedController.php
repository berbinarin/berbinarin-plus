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
            return redirect()->route('dashboard.index')->with([
                'alert' => true,
                'icon' => asset('assets/images/dashboard/success.webp'),
                'title' => 'Login Berhasil',
                'message' => 'Silakan masuk',
                'type' => 'success',
            ]);
        }
        else{
            return redirect()->route('auth.login')->with([
                'alert' => true,
                'icon' => asset('assets/images/dashboard/error.webp'),
                'title' => 'Login Gagal',
                'message' => 'Username atau password salah',
                'type' => 'error',
            ]);
        }
    }
    public function destroy(Request $request):RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Logout Berhasil',
            'message' => 'Sampai jumpa lagi',
            'type' => 'success',
        ]);
    }

    public function berbinarPlusLogin()
    {
        return view('auth.login.login-user');
    }
}
