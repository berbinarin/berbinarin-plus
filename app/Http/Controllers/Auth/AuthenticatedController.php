<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\Berbinarp_User;

class AuthenticatedController
{
    // Login admin
    public function login()
    {
        return view('auth.login.login');
    }

    // Login user
    public function berbinarPlusLogin()
    {
        return view('auth.login.login-user');
    }

    // Proses login admin
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
        } else {
            return redirect()->route('auth.login')->with([
                'alert' => true,
                'icon' => asset('assets/images/dashboard/error.webp'),
                'title' => 'Login Gagal',
                'message' => 'Username atau password salah',
                'type' => 'error',
            ]);
        }
    }

    // Proses login user biasa
    public function authenticateUser(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $user = Berbinarp_User::where('username', $credentials['username'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::guard('berbinar')->login($user);
            // Kirim data user ke halaman profile
            return redirect()->route('landing.home.index')->with([
                'alert' => true,
                'icon' => asset('assets/images/dashboard/success.webp'),
                'title' => 'Login Berhasil',
                'message' => 'Selamat datang di Berbinar+',
                'type' => 'success',
                'user' => $user,
            ]);
        } else {
            return redirect()->route('auth.berbinar-plus.login')->with([
                'alert' => true,
                'icon' => asset('assets/images/dashboard/error.webp'),
                'title' => 'Login Gagal',
                'message' => 'Username atau password salah',
                'type' => 'error',
            ]);
        }
    }

    // Untuk admin
    public function logoutAdmin(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login')->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Logout Berhasil',
            'message' => 'Sampai jumpa lagi',
            'type' => 'success',
        ]);
    }

    // Untuk user biasa
    public function logoutUser(Request $request): RedirectResponse
    {
        Auth::guard('berbinar')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.berbinar-plus.login')->with([
            'alert' => true,
            'icon' => asset('assets/images/dashboard/success.webp'),
            'title' => 'Logout Berhasil',
            'message' => 'Sampai jumpa lagi',
            'type' => 'success',
        ]);
    }
}
