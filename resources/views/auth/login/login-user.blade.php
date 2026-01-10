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
    {{-- Login Mobile --}}
    <div class="flex flex-col h-full w-full lg:hidden">
        <img src="{{ asset('assets/images/landing/login/login-image-mobile.webp') }}" alt=""
            class="max-[325px]:-mb-8 max-[380px]:-mb-10 max-[430px]:-mb-12 w-full">

        <div class="w-full flex flex-col bg-white rounded-t-[2rem] h-full pt-8 px-4 shadow-xl">
            <h1 class="text-3xl font-semibold mb-1">Masuk</h1>
            <p class="text-xs mb-4">Gunakan <span class="italic">username</span> dan <span class="italic">password</span> yang
                telah diberikan oleh <span class="italic">admin</span> Berbinar+.</p>
            <form method="POST" action="{{ route('auth.berbinar-plus.user-login') }}">
                @csrf
                <input type="text" name="username" id="username"
                    class="mb-3 rounded-xl border border-gray-300 focus:border-gray-500 focus:ring-2 focus:ring-gray-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                    placeholder="Username" required>
                <input type="password" name="password" id="password"
                    class="mb-4 rounded-xl border border-gray-300 focus:border-gray-500 focus:ring-2 focus:ring-gray-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                    placeholder="Password" required>
                <button type="submit"
                    class="flex flex-row justify-center mb-6 text-center rounded-xl text-white bg-gradient-to-r from-[#3986A3] to-[#15323D] border-0 py-2 px-8 focus:outline-none hover:bg-primary focus:ring-2 focus:ring-offset-2 focus:ring-primary text-lg">
                    Masuk
                </button>
            </form>
        </div>
    </div>
    {{-- /Login Mobile --}}

    {{-- Login Desktop --}}
    <div class="hidden lg:flex flex-row w-full overflow-hidden">
        <img src="{{ asset('assets/images/landing/login/login-image.webp') }}" alt=""
            class="h-full max-h-[100vh] z-50">
        <div class="w-full flex flex-col justify-center items-center">
            <div class="w-[60%] flex flex-col">
                <!-- BLUR SETENGAH LINGKARAN PEMBATAS KIRI -->
                <div class="relative z-0 hidden h-0 lg:block">
                    <div class="absolute -translate-y-[60%] z-0 -left-64 bg-[#A2D7F0]"
                        style="width: 300px; height: 300px; border-top-left-radius: 420px; border-bottom-left-radius: 420px; border-top-right-radius: 420px; filter: blur(60px); opacity: 0.9; top: -100px">
                    </div>
                </div>
                <div class="flex flex-col z-50">
                    <h1 class="text-4xl font-semibold mb-4">Masuk</h1>
                    <p class="text-base mb-6">Gunakan <span class="italic">username</span> dan <span
                            class="italic">password</span> yang telah diberikan oleh <span class="italic">admin</span>
                        Berbinar+.</p>
                    <form method="POST" action="{{ route('auth.berbinar-plus.user-login') }}">
                        @csrf
                        <input type="text" name="username" id="username"
                            class="w-[90%] mb-6 rounded-xl border border-gray-300 focus:border-gray-500 focus:ring-2 focus:ring-gray-200 text-sm outline-none text-gray-700 px-4 py-2 placeholder-shown:italic placeholder-shown:font-semibold placeholder:text-gray-900 leading-8 transition-colors duration-200 ease-in-out"
                            placeholder="Username" required>
                        <input type="password" name="password" id="password"
                            class="w-[90%] mb-8 rounded-xl border border-gray-300 focus:border-gray-500 focus:ring-2 focus:ring-gray-200 text-sm outline-none text-gray-700 px-4 py-2 placeholder-shown:italic placeholder-shown:font-semibold placeholder:text-gray-900 leading-8 transition-colors duration-200 ease-in-out"
                            placeholder="Password" required>
                        <button type="submit"
                            class="w-[90%] justify-center mb-6 text-center rounded-xl text-white bg-gradient-to-r from-[#3986A3] to-[#15323D] border-0 px-5 py-3 focus:outline-none hover:bg-primary focus:ring-2 focus:ring-offset-2 focus:ring-primary text-xl">
                            Masuk
                        </button>
                    </form>
                </div>
                <!-- BLUR SETENGAH LINGKARAN PEMBATAS KANAN -->
                <div class="relative hidden h-0 lg:block">
                    <div class="absolute -translate-y-[60%] z-0 -right-64 bg-[#A2D7F0]"
                        style="width: 300px; height: 300px; border-top-left-radius: 420px; border-bottom-left-radius: 420px; border-top-right-radius: 420px; filter: blur(60px); opacity: 0.9; top: 100px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
