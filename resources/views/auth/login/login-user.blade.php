@extends('auth.layouts.app', [
    'title' => 'Login Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('style')
    <style>
        .bg-white {
            background-color: white;
        }
    </style>
@endsection

@section('content')
    <div class="flex flex-col h-full w-full lg:hidden">
        <img src="{{ asset('assets/images/landing/login/login-image-mobile.webp') }}" alt=""
            class="max-[325px]:-mb-8 max-[380px]:-mb-10 max-[430px]:-mb-12 w-full">

        <div class="w-full flex flex-col bg-white rounded-t-[2rem] h-full pt-8 px-4 shadow-xl">
            <h1 class="text-3xl font-semibold mb-1">Masuk</h1>
            <p class="text-xs mb-4">Gunakan <span class="italic">username</span> dan <span class="italic">password</span> yang
                telah diberikan oleh <span class="italic">admin</span> Berbinar+.</p>
            <input type="text" name="username" id="username"
                class="mb-3 rounded-xl border border-gray-300 focus:border-gray-500 focus:ring-2 focus:ring-gray-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                placeholder="Username">
            <input type="text" name="password" id="password"
                class="mb-4 rounded-xl border border-gray-300 focus:border-gray-500 focus:ring-2 focus:ring-gray-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                placeholder="Password">
            <button type="submit"
                class="flex flex-row justify-center mb-6 text-center rounded-xl text-white bg-gradient-to-r from-[#3986A3] to-[#15323D] border-0 py-2 px-8 focus:outline-none hover:bg-primary focus:ring-2 focus:ring-offset-2 focus:ring-primary text-lg">
                Masuk
            </button>
        </div>
    </div>

    <div class="hidden lg:flex flex-row w-full">
        <img src="{{ asset('assets/images/landing/login/login-image.webp') }}" alt="" class="h-full max-h-[100vh]">
        <div class="w-full flex flex-col justify-center items-center">
            <div class="w-[75%] flex flex-col">
                <h1 class="text-5xl font-semibold mb-4">Masuk</h1>
                <p class="text-xl mb-6">Gunakan <span class="italic">username</span> dan <span
                        class="italic">password</span> yang telah diberikan oleh <span class="italic">admin</span>
                    Berbinar+.</p>
                <input type="text" name="username" id="username"
                    class="w-[90%] mb-6 rounded-xl border border-gray-300 focus:border-gray-500 focus:ring-2 focus:ring-gray-200 text-lg outline-none text-gray-700 px-5 py-3 leading-8 transition-colors duration-200 ease-in-out"
                    placeholder="Username">
                <input type="text" name="password" id="password"
                    class="w-[90%] mb-8 rounded-xl border border-gray-300 focus:border-gray-500 focus:ring-2 focus:ring-gray-200 text-lg outline-none text-gray-700 px-5 py-3 leading-8 transition-colors duration-200 ease-in-out"
                    placeholder="Password">
                <button type="submit"
                    class="w-[90%] justify-center mb-6 text-center rounded-xl text-white bg-gradient-to-r from-[#3986A3] to-[#15323D] border-0 px-5 py-3 focus:outline-none hover:bg-primary focus:ring-2 focus:ring-offset-2 focus:ring-primary text-2xl">
                    Masuk
                </button>
            </div>
        </div>
    </div>
@endsection
