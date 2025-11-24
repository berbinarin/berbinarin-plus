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
        <div class="text-center">
            <h1 class="text-6xl font-bold text-primary mb-4">
                Coming Soon
            </h1>
            <h1 class="text-6xl font-bold text-primary mb-4">
                Berbinar E-Learning Platform
            </h1>
        </div>
        <div class="flex gap-[5em]">
            <a href="{{ route('auth.berbinar-plus.login') }}">
                <button
                    class="next-button w-full mt-4 md:w-auto bg-gradient-to-r from-[#3986A3] to-[#15323D] text-white py-2 px-20 xl:px-36 rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary text-[18px]">Login</button>
            </a>
            <a href="{{ route('auth.berbinar-plus.regis') }}">
                <button
                    class="next-button w-full mt-4 md:w-auto bg-gradient-to-r from-[#3986A3] to-[#15323D] text-white py-2 px-20 xl:px-36 rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary text-[18px]">
                    Daftar
                </button>
            </a>
        </div>
    </div>
@endsection

@section('script')
@endsection
