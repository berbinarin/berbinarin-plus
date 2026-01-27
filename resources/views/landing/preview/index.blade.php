@extends('landing.layouts.homepage', [
    'title' => 'Preview Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('content')
    <div class="lg:px-6">

        <!-- BLUR SETENGAH LINGKARAN PEMBATAS KIRI -->
        <div class="relative z-0 h-0 block lg:hidden">
            <div class="fixed -translate-y-[10%] -translate-x-[50%] z-0 bg-[#A2D7F0]"
                style="width: 300px; height: 300px; border-top-left-radius: 420px; border-bottom-left-radius: 420px; border-top-right-radius: 420px; filter: blur(60px); opacity: 0.9; top: -100px">
            </div>
        </div>

        <div class="flex flex-row gap-6 mb-6 align-bottom max-sm:text-sm text-lg z-40">
            <a href="{{ route('landing.home.index') }}" class="flex flex-col justify-center z-40"><img
                    src="{{ asset('assets/images/landing/favicion/back-chevron.webp') }}" alt="Back" class=""></a>

            <nav class="text-gray-500 max-sm:text-sm text-lg z-40" aria-label="Breadcrumb">
                <a href="{{ route('landing.home.index') }}" class="hover:text-gray-900 transition-colors">BERBINAR+</a>
                <span>/</span>
                <span class="text-primary font-medium transition-colors">{{ $class->name ?? '-' }}</span>
            </nav>
        </div>

        <div class="mb-5 lg:mb-10 z-40">
            <div class="overflow-hidden relative z-40">
                <img src="{{ asset('assets/images/landing/favicion/plastic.webp') }}" alt=""
                    class="absolute z-0 max-sm:inset-y-0 max-sm:inset-x-0 w-full h-full object-cover">
                <div class="bg-[#106681] w-full rounded-xl lg:rounded-xl lg:px-4 lg:py-2 z-40">
                    <div class="flex flex-col justify-between z-40">
                        <div class="text-white p-5 flex flex-col gap-2 lg:gap-4 justify-center z-40">
                            <h1 class="font-bold text-xl lg:text-3xl flex flex-col justify-center z-40">
                                {{ $class->name ?? '-' }}
                            </h1>

                            <p class="text-xs/4 lg:text-xl z-40">{{ $class->description ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Pre Test Section --}}
        <div class="relative flex flex-row justify-start gap-4 lg:gap-0 mb-5 lg:mb-10 z-40">
            <div class="flex-col justify-center gap-3 hidden lg:flex">
                <h1 class="text-xl font-medium italic hidden lg:block">Pre Test</h1>
                <div class="flex flex-col lg:flex-row justify-center items-center">
                    <div class="min-w-3 min-h-3 bg-primary rounded-full z-10"></div>
                    <div class="w-64 h-0.5 bg-gradient-to-r from-[#C8F0FF] to-[#32758E]"></div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row justify-center items-center lg:hidden">
                <div class="min-w-3 min-h-3 bg-primary rounded-full z-10"></div>
                <div class="w-0.5 h-full bg-gradient-to-b from-[#C8F0FF] to-[#32758E]">
                </div>
            </div>

            <div class="flex flex-col gap-3 w-full">
                <h1 class="text-xl font-medium italic lg:hidden">Pre Test</h1>
                <div class="w-full bg-gradient-to-r from-[#FFFFFF] to-[#32758E80] p-5 rounded-2xl">
                    <h1 class="text-2xl font-medium italic mb-3">Pre Test</h1>
                    <div class="flex flex-row gap-3">
                        <img src="{{ asset('assets/images/landing/favicion/file.webp') }}" alt="" class="w-14 h-14">
                        <div>
                            <h1 class="text-gray-700 italic">Pre Test</h1>
                            <a href="{{ route('landing.pretest.index', ['class_id' => $class->id ?? 1]) }}"
                                class="text-lg text-primary font-medium italic">Pre Test -
                                {{ $class->name ?? '-' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative flex flex-row justify-start gap-4 lg:gap-0 mb-5 lg:mb-10 z-40">
            <div class="flex-col justify-center gap-3 hidden lg:flex">
                <h1 class="text-xl font-medium hidden lg:block">Course Menu</h1>
                <div class="flex flex-col lg:flex-row justify-center items-center">
                    <div class="min-w-3 min-h-3 bg-primary rounded-full z-10"></div>
                    <div class="w-64 h-0.5 bg-gradient-to-r from-[#C8F0FF] to-[#32758E]"></div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row justify-center items-center lg:hidden">
                <div class="min-w-3 min-h-3 bg-primary rounded-full z-10"></div>
                <div class="w-0.5 h-full bg-gradient-to-b from-[#C8F0FF] to-[#32758E]"></div>
            </div>

            <div class="flex flex-col gap-3 w-full">
                <h1 class="text-xl font-medium lg:hidden">Course Menu</h1>
                <div class="w-full bg-gradient-to-r from-[#FFFFFF] to-[#32758E80] p-5 rounded-2xl">
                    <h1 class="text-2xl font-medium italic mb-3">Course Menu</h1>
                    @if ($class->sections && $class->sections->count())
                        @foreach ($class->sections as $i => $section)
                            <div class="flex flex-row gap-3 mb-3">
                                <img src="{{ asset('assets/images/landing/favicion/video.webp') }}" alt=""
                                    class="w-14 h-14">
                                <div>
                                    <h1 class="text-gray-700">Video</h1>
                                    <a href="{{ route('landing.home.materials', ['class_id' => $class->id, 'section_id' => $section->id]) }}"
                                        class="text-lg text-primary font-medium">{{ $i + 1 }}.
                                        {{ $section->title ?? '-' }}</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-gray-500 italic">Belum ada materi.</div>
                    @endif
                </div>
            </div>

        </div>


        <!-- Post Test Section -->
        <div class="relative flex flex-row justify-start gap-4 lg:gap-0 mb-5 lg:mb-10 z-40">
            <div class="flex-col justify-center gap-3 hidden lg:flex">
                <h1 class="text-xl font-medium italic hidden lg:block">Post Test</h1>
                <div class="flex flex-col lg:flex-row justify-center items-center">
                    <div class="min-w-3 min-h-3 bg-primary rounded-full z-10"></div>
                    <div class="w-64 h-0.5 bg-gradient-to-r from-[#C8F0FF] to-[#32758E]">
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row justify-center items-center lg:hidden">
                <div class="min-w-3 min-h-3 bg-primary rounded-full z-10"></div>
                <div class="w-0.5 h-full bg-gradient-to-b from-[#C8F0FF] to-[#32758E]">
                </div>
            </div>

            <div class="flex flex-col gap-3 w-full">
                <h1 class="text-xl font-medium italic lg:hidden">Post Test</h1>
                <div class="w-full bg-gradient-to-r from-[#FFFFFF] to-[#32758E80] p-5 rounded-2xl">
                    <h1 class="text-2xl font-medium italic mb-3">Post Test</h1>
                    <div class="flex flex-row gap-3">
                        <img src="{{ asset('assets/images/landing/favicion/file.webp') }}" alt=""
                            class="w-14 h-14">
                        <div>
                            <h1 class="text-gray-700 italic">Post Test</h1>
                            <a href="{{ route('landing.posttest.index', ['class_id' => $class->id ?? 1]) }}"
                                class="text-lg text-primary font-medium italic">Post Test -
                                {{ $class->name ?? '-' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Certificate Section -->
        {{-- <div class="relative flex flex-row justify-start gap-4 lg:gap-0 mb-5 lg:mb-10 z-40">
            <div class="flex-col justify-center gap-3 hidden lg:flex">
                <h1 class="text-xl font-medium italic hidden lg:block">Sertifikat</h1>
                <div class="flex flex-col lg:flex-row justify-center items-center">
                    <div class="min-w-3 min-h-3 bg-primary rounded-full z-10"></div>
                    <div class="w-64 h-0.5 bg-gradient-to-r from-[#C8F0FF] to-[#32758E]"></div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row justify-center items-center lg:hidden">
                <div class="min-w-3 min-h-3 bg-primary rounded-full z-10"></div>
                <div class="w-0.5 h-full bg-gradient-to-b from-[#C8F0FF] to-[#32758E]"></div>
            </div>

            <div class="flex flex-col gap-3 w-full">
                <h1 class="text-xl font-medium italic lg:hidden">Sertifikat</h1>
                <div class="w-full bg-gradient-to-r from-[#FFFFFF] to-[#32758E80] p-5 rounded-2xl">
                    <h1 class="text-2xl font-medium italic mb-3">Sertifikat</h1>
                    <div class="flex flex-row gap-3">
                        <img src="{{ asset('assets/images/landing/favicion/file.webp') }}" alt=""
                            class="w-14 h-14">
                        <div>
                            <h1 class="text-gray-700 italic">Sertifikat</h1>
                            <a href="{{ route('landing.home.certificates', ['class_id' => $class->id ?? null]) }}"
                                class="text-lg text-primary font-medium italic">Sertifikat - {{ $class->name ?? '-' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


        <!-- BLUR SETENGAH LINGKARAN PEMBATAS KANAN -->
        <div class="relative h-0 block lg:hidden">
            <div class="fixed translate-y-[100%] translate-x-[50%] right-0 z-0 bg-[#A2D7F0]"
                style="width: 300px; height: 300px; border-top-left-radius: 420px; border-bottom-left-radius: 420px; border-top-right-radius: 420px; filter: blur(60px); opacity: 0.9; top: 100px">
            </div>
        </div>

    </div>
@endsection
