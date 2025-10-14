@extends('landing.layouts.pretest-questions', [
    'title' => 'Pretest Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('content')
    <div class="px-8 py-6">
        <!-- Breadcrumb -->
        <nav class="text-[15px] flex items-start gap-2 mb-4" aria-label="Breadcrumb">
            <a href="#" class="text-[#7f7f7f]">BERBINAR+</a>
            <span>/</span>
            <a href="#" class="text-[#7f7f7f]">Graphic Design</a>
            <span>/</span>
            <a href="#" class="text-[#7f7f7f]">Post Test</a>
            <span>/</span>
            <a href="#" class="text-black font-semibold">Post Test - Graphic Design</a>
        </nav>

        <!-- Judul -->
        <h1 class="text-[34px] font-bold mb-8">Post Test - Graphic Design</h1>

        <!-- Pertanyaan -->
        <h3 class="text-[22px] font-bold mb-[26px]">Pertanyaan 1</h3>

        <!-- Wrapper -->
        <div class="w-full">
            <!-- Card pertanyaan -->
            <div class="bg-white rounded-[18px] ring-1 ring-[#2986A3] flex justify-between items-center gap-8 px-12 py-8">
                <div class="flex-1">
                    <p class="text-xl font-medium mb-7">Apa yang hendak diucapkan Youtuber tersebut?</p>

                    <form class="flex flex-col gap-3">
                        <label class="flex items-start gap-5 text-xl">
                            <input type="radio" name="answer" value="Negative Space"
                                class="w-7 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                            "Nice meme Ekha kun 😘"
                        </label>
                        <label class="flex items-center gap-5 text-xl">
                            <input type="radio" name="answer" value="Hierarchy"
                                class="w-7 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                            *mengecup mic
                        </label>
                        <label class="flex items-center gap-5 text-xl">
                            <input type="radio" name="answer" value="Pattern"
                                class="w-7 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                            "BAKAAAA!!!!"
                        </label>
                        <label class="flex items-center gap-5 text-xl">
                            <input type="radio" name="answer" value="White Space"
                                class="w-7 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                            "Brankas aja kamu, Shiro"
                        </label>
                    </form>
                </div>

                <div class="flex justify-center items-center">
                    <img src="{{ asset('assets/images/landing/pretest/Bakaa.jpeg') }}" alt="Desain Komposisi"
                        class="w-60 h-60 object-cover rounded-[10px]">
                </div>
            </div>

            <!-- Tombol navigasi -->
            <div class="flex justify-between items-center gap-4 mt-8 font-medium text-xl max-w-5xl mx-auto">
                <button class="py-2 px-[18px] bg-white ring-1 ring-[#3986A3] rounded-lg">Sebelumnya</button>
                <button class="py-2 px-[18px] bg-[#3986A3] rounded-lg text-white">Berikutnya</button>
            </div>
        </div>


    </div>
@endsection
