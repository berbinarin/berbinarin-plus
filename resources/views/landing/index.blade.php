{{-- filepath: c:\laragon\www\kerja_new\berbinarin-plus\resources\views\landing\index.blade.php --}}
@extends('landing.layouts.app', [
    'title' => 'Berbinar Insightful Indonesia',
])

@section('content')
    <div class="min-h-screen bg-[#F7F9FA] flex flex-col justify-center items-center">

        @if (session('success'))
            <div class="fixed top-20 right-6 z-50">
                <div class="bg-green-500 text-white px-6 py-3 rounded shadow-lg font-semibold">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="text-center mt-16">
            <h1 class="text-3xl lg:text-4xl font-bold text-[#333333] lg:mb-4 max-sm:px-4">
                Selamat Datang di <span class="bg-gradient-to-r from-[#3986A3] to-[#15323D] bg-clip-text text-transparent">Berbinar+</span>
            </h1>
            <div class="w-full flex flex-row justify-center items-center">
                <img src="{{ asset('assets/images/landing/login/orang-belajar.webp') }}" alt="" class="lg: w-80 h-80">
            </div>
            <h2 class="text-lg lg:text-3xl font-bold bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text text-transparent mb-4">
                Saatnya Level-Up! <br class="lg:hidden"> Belajar dan Bertumbuh <br> Bersama pada Kelas Berbinar+
            </h2>
        </div>

        <div class="w-full flex flex-col lg:flex-row justify-center gap-[1rem] lg:gap-[5em] px-8">
            <a href="{{ route('auth.berbinar-plus.login') }}">
                <button class="next-button w-full mt-4 md:w-auto bg-gradient-to-r from-[#3986A3] to-[#15323D] text-white py-2 px-10 lg:px-20 xl:px-36 rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary text-[18px]">
                    Masuk
                </button>
            </a>
            <a href="{{ route('auth.berbinar-plus.regis') }}">
                <button class="next-button w-full mt-4 md:w-auto bg-gradient-to-r from-[#F7B23B] to-[#916823] text-white py-2 px-10 lg:px-20 xl:px-36 rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary text-[18px]">
                    Daftar
                </button>
            </a>
        </div>

    </div>
@endsection

@section('script')
@endsection
