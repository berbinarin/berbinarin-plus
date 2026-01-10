@extends('landing.layouts.test-questions', [
    'title' => 'Pretest Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('content')
    <div class="mt-20 lg:mt-10">
        <!-- Breadcrumb -->
        <nav class="text-gray-500 max-sm:text-sm text-lg" aria-label="Breadcrumb">
            <a href="{{ route('landing.home.index') }}" class="hover:text-gray-900 transition-colors">BERBINAR+</a>
            <span>/</span>
            <a href="{{ route('landing.pretest.index', ['class_id' => $class->id ?? 1]) }}"
                class="hover:text-gray-900 transition-colors">{{ $class->name ?? 'Kelas' }}</a>
            <span>/</span>
            <a href="{{ route('landing.pretest.index', ['class_id' => $class->id ?? 1]) }}"
                class="hover:text-gray-900 transition-colors">Pre Test</a>
            <span>/</span>
            <span class="text-black">Pertanyaan {{ $number ?? 1 }}</span>
        </nav>

        <!-- Judul -->
        <div class="mt-4 mb-6 lg:mt-6 flex flex-row">
            <h1 class="text-xl lg:text-3xl font-semibold">Pre Test - {{ $class->name ?? '-' }}</h1>
        </div>

        <!-- Pertanyaan -->
        <h3 class="text-xl font-semibold mb-6">Pertanyaan {{ $number ?? 1 }} dari {{ $total ?? 1 }}</h3>

        <!-- Wrapper -->
        <div class="w-full">
            <!-- Card pertanyaan -->
            <div
                class="bg-white rounded-[18px] ring-1 ring-[#2986A3] flex flex-col lg:flex-row-reverse justify-between items-center gap-8 px-4 py-6 lg:px-12 lg:py-8">

                <div class="flex-1">
                    <p class="text-base lg:text-xl font-medium mb-7">
                        {{ $question->question_text ?? 'Tidak ada pertanyaan.' }}</p>
                    @if ($question)
                        <form class="flex flex-col gap-3" method="POST" action="#">
                            @csrf
                            @if ($question->type === 'short_answer')
                                <input type="text" name="answer"
                                    class="min-w-5 h-10 text-[#2986A3] focus:ring-[#2986A3] border rounded-lg px-3"
                                    placeholder="Jawaban singkat...">
                            @elseif($question->type === 'multiple_choice' && is_array($question->options))
                                @foreach ($question->options as $key => $option)
                                    <label class="flex items-start gap-3 lg:gap-5 text-base lg:text-xl">
                                        <input type="radio" name="answer" value="{{ $key }}"
                                            class="min-w-5 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                                        {{ is_array($option) && isset($option['jawaban']) ? $option['jawaban'] : $key }}
                                    </label>
                                @endforeach
                            @endif
                        </form>
                    @endif
                </div>
            </div>

            <!-- Tombol navigasi -->
            <div
                class="flex w-full justify-between items-center gap-4 mt-8 text-center font-medium text-base lg:text-xl mx-auto">
                @if (($number ?? 1) > 1)
                    <a href="{{ route('landing.pretest.question', ['class_id' => $class->id ?? 1, 'number' => ($number ?? 1) - 1]) }}"
                        class="max-sm:w-1/2 py-2 px-[18px] bg-white ring-1 ring-[#3986A3] rounded-lg">Sebelumnya</a>
                @else
                    <span></span>
                @endif
                @if (($number ?? 1) < ($total ?? 1))
                    <a href="{{ route('landing.pretest.question', ['class_id' => $class->id ?? 1, 'number' => ($number ?? 1) + 1]) }}"
                        class="max-sm:w-1/2 py-2 px-[18px] bg-[#3986A3] rounded-lg text-white">Berikutnya</a>
                @else
                    <a href="{{ route('landing.pretest.index-finished', ['class_id' => $class->id ?? 1]) }}"
                        class="max-sm:w-1/2 py-2 px-[18px] bg-[#3986A3] rounded-lg text-white">Selesai</a>
                @endif
            </div>
        </div>


    </div>
@endsection
