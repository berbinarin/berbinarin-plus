@extends('landing.layouts.certificates',[
'title' => 'Sertifikat Berbinar+',
'active' => 'Berbinar+',
'page' => 'Berbinar+',
])

@section('content')

    <div class="mt-20 lg:mt-10">
        <div class="w-full flex flex-col">
            <h3 class="text-gray-500 text-sm">BERBINAR+    /    Graphic Design    /     Sertifikat   /    <span class="text-black">Download Sertifikat</span></h3>
            <div class="mt-4 lg:mt-6 flex flex-row">
                <img src="{{ asset("assets/images/landing/favicion/back-arrow.png") }}" alt="Back" class="w-8 lg:w-10">
                <h1 class="ml-2 text-xl lg:text-3xl font-semibold">Download Sertifikat</h1>
            </div>
            <div class="bg-white w-full mt-5 lg:mt-10 rounded-2xl p-5 lg:p-8">
                <h2 class="mb-4 font-medium lg:text-xl">Selamat, Tiarasyifa Arsanda!</h2>

                <p class="mb-4 lg:mb-6 font-medium lg:text-lg">Kamu telah berhasil menyelesaikan kelas Graphic Design dengan baik. Teruslah belajar dan kembangkan kemampuanmu. Saatnya merayakan pencapaianmu dengan mengunduh sertifikat resmi dari BERBINAR+</p>


                <button class="bg-primary text-white py-2 px-4 lg:py-1 rounded-lg text-lg lg:text-xl flex flex-row gap-2"><i class="bx bx-download text-white text-xl lg:text-2xl align-text-bottom"></i><p class="">Sertifikat</p></button>
            </div>
        </div>
    </div>
@endsection
