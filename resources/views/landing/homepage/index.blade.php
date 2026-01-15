@extends('landing.layouts.homepage', [
    'title' => 'Homepage Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('style')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .swiper-pagination-bullet {
            background: lightgray;
            opacity: 1;
            border-radius: 50%;
            transition: background 0.3s, transform 0.3s;
        }

        .swiper-pagination-bullet-active {
            background: #3986A3 !important;
            transform: scale(1);
        }

        @media (max-width: 1023px) {
            .slider-courses .swiper-slide .course-title {
                display: inline-block;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 123px;
                vertical-align: middle;
            }
        }

        @media (min-width: 1024px) {
            .slider-courses .swiper-slide .course-title {
                display: inline-block;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 9.2rem;
                vertical-align: middle;
            }
        }
    </style>
@endsection

@section('content')

    <div class="lg:px-6">
        {{-- Banner --}}
        <div class="overflow-hidden relative">
            <img src="{{ asset('assets/images/landing/favicion/plastic.webp') }}" alt=""
                class="absolute z-0 max-sm:inset-y-0 max-sm:inset-x-0 w-full h-full object-cover">
            <div class="bg-[#106681] w-full rounded-lg lg:rounded-xl lg:px-6 lg:py-4 z-40">
                <div class="flex flex-row justify-between z-40">
                    <div class="text-white p-5 flex lg:flex-col justify-center z-40">
                        <h1 class="font-semibold text-lg lg:hidden flex flex-col justify-center z-40">Berbinar+</h1>
                        <h1 class="font-semibold text-start lg:text-3xl max-sm:hidden mb-4 z-40">Hai,
                            {{ Auth::user()->first_name ?? 'Pengguna' }} {{ Auth::user()->last_name }}</h1>

                        <p class="text-xl max-sm:hidden z-40">Terus semangat 🚀✨, setiap langkah kecil mendekatkanmu ke
                            tujuan besar!</p>
                        <p class="text-xl max-sm:hidden z-40">Progres belajarmu: <span
                                class="font-semibold">{{ $overallProgress }}%</span> menuju pencapaian utama</p>
                    </div>
                    <div class="flex flex-row-reverse">
                        <img src="{{ asset('assets/images/landing/favicion/banner-picture.webp') }}" alt=""
                            class="w-2/3 lg:w-full rounded-3xl z-40">
                    </div>
                </div>
            </div>
        </div>

        {{-- Kelas Saya --}}
        <div class="mt-3 mb-4">
            <div class="flex flex-row justify-between items-center mb-2">
                <h2 class="text-lg lg:text-2xl font-medium">Kelas Saya</h2>
            </div>

            <!-- Swiper slider -->
            <div class="relative">
                @if ($enrolledClasses->isEmpty())
                    <p class="text-gray-500 text-center py-8">Anda belum memiliki kelas yang aktif.</p>
                @else
                    <div class="swiper slider-courses">
                        <div class="swiper-wrapper py-2 mb-4">
                            @foreach ($enrolledClasses as $enrolled)
                                <div class="swiper-slide">
                                    <div
                                        class="bg-white rounded-lg flex flex-col lg:flex-row p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                                        <img src="{{ $enrolled['course']->thumbnail ? asset('uploads/thumbnails/' . $enrolled['course']->thumbnail) : asset('assets/images/landing/favicion/checker.webp') }}"
                                            alt="{{ $enrolled['course']->name }}"
                                            class="rounded-lg w-auto max-h-20 lg:max-w-[184px] lg:max-h-[108px]">
                                        <div>
                                            <div class="flex flex-col-reverse lg:flex-row gap-1 lg:gap-5 mb-1">
                                                <p class="font-medium text-xs lg:text-base course-title italic"
                                                    title="{{ $enrolled['course']->name }}">{{ $enrolled['course']->name }}
                                                </p>
                                                <p
                                                    class="rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem] {{ $enrolled['status'] === 'Success' ? 'bg-green-500' : 'bg-yellow-500' }}">
                                                    {{ $enrolled['status'] }}</p>
                                            </div>
                                            <p class="text-xs lg:text-base font-medium">
                                                {{ $enrolled['progress_percentage'] }}%
                                            </p>
                                            <div class="flex flex-row gap-1 items-center mb-2">
                                                <div class="w-36 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                                    <div class="bg-primary h-2.5 rounded-full"
                                                        style="width: {{ $enrolled['progress_percentage'] }}%"></div>
                                                </div>
                                                <p
                                                    class="text-xs lg:text-base {{ $enrolled['status'] === 'Success' ? 'text-primary' : 'text-gray-500' }} align-top">
                                                    {{ $enrolled['completed_sections'] }}/{{ $enrolled['total_sections'] }}
                                                </p>
                                            </div>
                                            @if ($enrolled['status'] === 'Success')
                                                <a href="{{ route('landing.home.certificates') }}"
                                                    class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Unduh
                                                    Sertifikat<i
                                                        class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                                            @else
                                                <a href="{{ route('landing.home.preview', ['class_id' => $enrolled['course']->id]) }}"
                                                    class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Mulai<i
                                                        class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination" style="bottom: -0px;"></div>
                    </div>
                @endif
            </div>
        </div>
        {{-- /Kelas Saya --}}

        {{-- Rekomendasi Kelas Lainnya --}}
        <div class="mb-4">
            <div class="flex flex-row justify-between items-center mb-2">
                <h2 class="text-lg lg:text-2xl font-medium">Rekomendasi Kelas Lainnya</h2>
            </div>

            <div class="relative">
                @if ($recommendations->isEmpty())
                    <p class="text-gray-500 text-center py-8">Tidak ada rekomendasi kelas saat ini.</p>
                @else
                    <div class="swiper slider-recommendation">
                        <div class="swiper-wrapper py-2 mb-4">
                            @foreach ($recommendations as $recommendation)
                                <div class="swiper-slide cursor-pointer">
                                    <div id="showModal"
                                        class="bg-white rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                                        <img src="{{ $recommendation->thumbnail ? asset('uploads/thumbnails/' . $recommendation->thumbnail) : asset('assets/images/landing/favicion/checker.webp') }}"
                                            alt="{{ $recommendation->name }}"
                                            class="rounded-lg w-auto max-h-20 lg:max-h-[126px]">
                                        <div>
                                            <div class="flex flex-col gap-0 mb-1">
                                                <div class="text-orange-500 text-xs lg:text-base font-medium italic">
                                                    {{ $recommendation->category ?? 'General' }}</div>
                                                <p class="font-medium h-[32px] lg:h-[56px] text-sm/4 lg:text-lg italic"
                                                    title="{{ $recommendation->name }}">{{ $recommendation->name }}</p>
                                            </div>
                                            <div class="flex flex-col mb-2">
                                                <p class="text-xs lg:text-base text-gray-500 align-top">By
                                                    {{ $recommendation->instructor_name ?? 'Instructor' }}</p>
                                                <p class="text-xs lg:text-base text-gray-500 align-top">
                                                    {{ $recommendation->instructor_title ?? 'Professional' }}</p>
                                            </div>
                                            <div class="flex flex-row justify-between">
                                                <p class="text-xs lg:text-base text-gray-500">
                                                    {{ $recommendation->sections->count() ?? 0 }} Lesson</p>
                                                <div class="flex flex-row gap-1">
                                                    <i class="bx bxs-star text-yellow-500 align-top"></i>
                                                    <p class="text-gray-500 text-xs lg:text-base">
                                                        {{ $recommendation->rating ?? '0.0' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination" style="bottom: -0px;"></div>
                    </div>
                @endif
            </div>
        </div>
        {{-- /Rekomendasi Kelas Lainnya --}}

    </div>


    <!-- Modal Buka Course Lain -->
    <div id="confirmModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
        <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg"
            style="background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px;background-clip: padding-box, border-box;">
            <!-- Warning Icon -->
            <img src="{{ asset('assets/images/dashboard/warning.webp') }}" alt="Warning Icon"
                class="mx-auto h-[83px] w-[83px]" />

            <!-- Title -->
            <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">Kamu belum daftar kelas ini!</h2>

            <!-- Message -->
            <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">Kamu akan diarahkan ke halaman pendaftaran
                berbinar+</p>

            <!-- Actions -->
            <div class="mt-3 lg:mt-6 flex justify-center gap-3">
                <button type="button" id="cancelModal"
                    class="w-1/3 rounded-lg border border-primary px-3 lg:px-6 py-2 text-stone-700">Kembali</button>
                <a href="{{ route('auth.berbinar-plus.register-class') }}"
                    class="w-1/3 rounded-lg bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-3 lg:px-6 py-2 font-medium text-white">Ok</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.slider-courses', {
                loop: false,
                spaceBetween: 10,
                slidesPerView: 2,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next-home',
                    prevEl: '.swiper-button-prev-home',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 2,
                        spaceBetween: 16
                    },
                    1210: {
                        slidesPerView: 2.5,
                        spaceBetween: 16
                    },
                    1440: {
                        slidesPerView: 3,
                        spaceBetween: 16
                    },
                },
            });

            const swiperRec = new Swiper('.slider-recommendation', {
                loop: false,
                spaceBetween: 10,
                slidesPerView: 2,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next-home',
                    prevEl: '.swiper-button-prev-home',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 16
                    },
                },
            });

        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const showModals = document.querySelectorAll('[id="showModal"]');
            const confirmModal = document.getElementById('confirmModal');
            const cancelModal = document.getElementById('cancelModal');

            if (showModals.length) {
                showModals.forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        if (confirmModal) confirmModal.classList.remove('hidden');
                    });
                });
            }

            if (cancelModal) {
                cancelModal.addEventListener('click', function() {
                    if (confirmModal) confirmModal.classList.add('hidden');
                });
            }
        });
    </script>
@endsection
