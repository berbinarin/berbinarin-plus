@extends('landing.layouts.test-questions', [
    'title' => 'Pretest Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('content')
    <div class="mt-20 lg:mt-10">
        <!-- Breadcrumb -->
        <nav class="text-gray-500 max-sm:text-sm text-lg" aria-label="Breadcrumb">
            <a href="{{ route('homepage.index') }}" class="hover:text-gray-900 transition-colors">BERBINAR+</a>
            <span>/</span>
            <a href="#" class="hover:text-gray-900 transition-colors">Graphic Design</a>
            <span>/</span>
            <a href="#" class="hover:text-gray-900 transition-colors">Pre Test</a>
            <span>/</span>
            <a href="#" class="text-black">Pre Test - Graphic Design</a>
        </nav>

        <!-- Judul -->
        <div class="mt-4 mb-6 lg:mt-6 flex flex-row">
            <h1 class="text-xl lg:text-3xl font-semibold">Pre Test - Graphic Design</h1>
        </div>

        <!-- Pertanyaan -->
        <h3 class="text-xl font-semibold mb-6">Pertanyaan 1</h3>

        <!-- Wrapper -->
        <div class="w-full">
            <!-- Card pertanyaan -->
            <div class="bg-white rounded-[18px] ring-1 ring-[#2986A3] flex flex-col lg:flex-row-reverse justify-between items-center gap-8 px-4 py-6 lg:px-12 lg:py-8">
                <div class="flex justify-center items-center">
                    <img src="{{ asset('assets/images/landing/favicion/question-placeholder.webp') }}" alt="Desain Komposisi" class="w-auto lg:w-60 lg:h-60 object-cover rounded-[10px]">
                </div>

                <div class="flex-1">
                    <p class="text-base lg:text-xl font-medium mb-7">Apa nama komposisi design tersebut?</p>

                    <form class="flex flex-col gap-3">
                        <label class="flex items-start gap-3 lg:gap-5 text-base lg:text-xl">
                            <input type="radio" name="answer" value="Negative Space" class="min-w-5 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                            Negative Space
                        </label>
                        <label class="flex items-start gap-3 lg:gap-5 text-base lg:text-xl">
                            <input type="radio" name="answer" value="Hierarchy" class="min-w-5 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                            Hierarchy
                        </label>
                        <label class="flex items-start gap-3 lg:gap-5 text-base lg:text-xl">
                            <input type="radio" name="answer" value="Pattern" class="min-w-5 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                            Pattern
                        </label>
                        <label class="flex items-start gap-3 lg:gap-5 text-base lg:text-xl">
                            <input type="radio" name="answer" value="White Space" class="min-w-5 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                            White Space
                        </label>
                    </form>
                </div>

            </div>

            <!-- Tombol navigasi -->
            <div class="flex w-full justify-between items-center gap-4 mt-8 text-center font-medium text-base lg:text-xl mx-auto">
                <a href="#" class="max-sm:w-1/2 py-2 px-[18px] bg-white ring-1 ring-[#3986A3] rounded-lg">Sebelumnya</a>
                <a href="{{ route('pretest.question.2') }}" class="max-sm:w-1/2 py-2 px-[18px] bg-[#3986A3] rounded-lg text-white">Berikutnya</a>
            </div>
        </div>


    </div>
@endsection
