@extends('landing.layouts.app', [
    'title' => 'Daftar Kelas Baru Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('style')
    <style>
        .bg-white {
            background-color: white;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #3986A3 !important;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="flex pt-8">
            <div class="w-full mt-14 md:mt-28 justify-center items-center">
                <div class="bg-white rounded-3xl p-5 md:px-12 xl:px-16 justify-self-center md:w-[90%] w-full md:shadow-xl">
                    <h1 class="text-3xl lg:text-4xl font-bold text-center mb-8 lg:mt-4 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text text-transparent">Terima Kasih</h1>
                    <img class="justify-self-center lg:mb-4" src="{{ asset('assets/images/landing/login/success_thanks.webp') }}" alt="">
                    <h1 class="max-sm:text-lg text-2xl font-semibold text-center mb-8 mt-1 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text text-transparent">Akun anda berhasil terdaftar pada kelas BERBINAR+.<br>Nantikan informasi selanjutnya yang akan diumumkan melalui WhatsApp/Email</h1>
                    <div class="flex justify-center items-center mb-4">
                        <a href="{{ route('landing.index') }}" class="w-full lg:w-1/3 md:text-xl bg-gradient-to-r from-[#3986A3] to-[#15323D] text-white py-2 px-4 rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary text-center">Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
