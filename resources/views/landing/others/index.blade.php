@extends('landing.layouts.homepage',[
'title' => 'Others Berbinar+',
'active' => 'Berbinar+',
'page' => 'Berbinar+',
])

@section('style')
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
        .tab-button.active {
            background-color: #3986A3;
            color: white;
        }
    }

    @media (min-width: 1024px) {
        .tab-button.active {
            border-bottom: solid 3px #75BADB;
            color: #75BADB;
        }
    }

    @media (max-width: 320px) {
        .course-title {
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 123px;
            vertical-align: middle;
        }
    }

    @media (min-width: 321px) {
        .course-title {
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 165px;
            vertical-align: middle;
        }
    }

    @media (min-width: 376) {
        .course-title {
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 185px;
            vertical-align: middle;
        }
    }

    @media (min-width: 1024px) {
        .tab-content .course-title {
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 225px;
            vertical-align: middle;
        }
    }
</style>
@endsection

@section('content')
<div class="lg:px-6">
    <!-- BLUR SETENGAH LINGKARAN PEMBATAS KIRI -->
    <div class="fixed h-0 block -z-10 pointer-events-none">
        <div class="fixed -translate-y-[10%] -translate-x-[50%] bg-[#A2D7F0] -z-10 pointer-events-none" style="width: 300px; height: 300px; border-top-left-radius: 420px; border-bottom-left-radius: 420px; border-top-right-radius: 420px; filter: blur(60px); opacity: 0.9; top: -100px"></div>
    </div>

    {{-- Ini buat banner atas --}}
    <div class="overflow-hidden relative mb-3">
        <img src="{{ asset("assets/images/landing/favicion/plastic.png") }}" alt="" class="absolute z-0 max-sm:inset-y-0 max-sm:inset-x-0 w-full h-full object-cover">
        <div class="bg-[#106681] w-full rounded-lg lg:rounded-xl lg:px-6 lg:py-4 z-40">
            <div class="flex flex-row justify-between z-40">
                <div class="text-white p-5 flex lg:flex-col justify-center z-40">
                    <h1 class="font-semibold text-start lg:text-3xl max-sm:hidden mb-4 z-40">Hai, Tiarasyifa Arsanda</h1>
                    <h1 class="font-semibold text-lg lg:hidden flex flex-col justify-center z-40">Berbinar+</h1>

                    <p class="text-xl max-sm:hidden z-40">Terus semangat 🚀✨, setiap langkah kecil mendekatkanmu ke tujuan besar!</p>
                    <p class="text-xl max-sm:hidden z-40">Progres belajarmu: <span class="font-semibold">30%</span> menuju pencapaian utama</p>
                </div>
                <div class="flex flex-row-reverse">
                    <img src="{{ asset("assets/images/landing/favicion/banner-picture.png") }}" alt="" class="w-2/3 lg:w-full rounded-3xl z-40">
                </div>
            </div>
        </div>
    </div>
    {{-- /Ini buat banner atas --}}


    {{-- Ini buat Menu --}}
    <nav class="flex flex-row gap-2 lg:gap-4 mb-4">
        <button data-tab="kelas-lainnya" class="tab-button px-3 lg:px-1 py-1 max-sm:bg-white lg:border-none lg:rounded-none text-sm lg:text-base text-primary lg:text-black font-semibold border-2 border-primary rounded-3xl active z-40">Kelas Lainnya</button>
        <button data-tab="kelas-saya" class="tab-button px-3 lg:px-1 py-1 max-sm:bg-white lg:border-none lg:rounded-none text-sm lg:text-base text-primary lg:text-black font-semibold border-2 border-primary rounded-3xl z-40">Kelas Saya</button>
        <button data-tab="profil" class="tab-button px-3 lg:px-1 py-1 max-sm:bg-white lg:border-none lg:rounded-none text-sm lg:text-base text-primary lg:text-black font-semibold border-2 border-primary rounded-3xl z-40">Profil</button>
    </nav>
    {{-- /Ini buat Menu --}}

    {{-- Ini buat nampilin konten tiap menu --}}

    {{-- Ini buat nampilin konten menu Kelas Lainnya --}}
    <div id="kelas-lainnya" class="tab-content">

        {{-- Ini versi mobilenya Kelas Lainnya --}}

        <div class="flex flex-col gap-3 lg:hidden">

            <div class="bg-white z-40 w-auto rounded-lg flex flex-row lg:flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/class-thumbnail/ptpm.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">

                </div>
                <div class="w-1/2">
                    <div class="flex flex-col gap-0 mb-0.5">
                        <div class="text-orange-500 text-xs lg:text-base font-medium italic">Management</div>
                        <p class="font-medium text-sm/4 lg:text-lg italic course-title" title="Psychological Testing Product Management">Psychological Testing Product Management</p>
                    </div>
                    <div class="flex flex-col mb-0.5">
                        <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                        <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional">UI/UX Lead at Astra Internasional</p>
                    </div>
                    <div class="flex flex-row justify-between">
                        <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                        <div class="flex flex-row gap-1">
                            <i class="bx bxs-star text-yellow-500 align-top"></i>
                            <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white z-40 w-auto rounded-lg flex flex-row lg:flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/class-thumbnail/cpm.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">

                </div>
                <div class="w-1/2">
                    <div class="flex flex-col gap-0 mb-0.5">
                        <div class="text-orange-500 text-xs lg:text-base font-medium italic">Management</div>
                        <p class="font-medium text-sm/4 lg:text-lg italic course-title" title="Class Product Management">Class Product Management</p>
                    </div>
                    <div class="flex flex-col mb-0.5">
                        <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                        <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional">UI/UX Lead at Astra Internasional</p>
                    </div>
                    <div class="flex flex-row justify-between">
                        <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                        <div class="flex flex-row gap-1">
                            <i class="bx bxs-star text-yellow-500 align-top"></i>
                            <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white z-40 w-auto rounded-lg flex flex-row lg:flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/class-thumbnail/uiux.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">

                </div>
                <div class="w-1/2">
                    <div class="flex flex-col gap-0 mb-0.5">
                        <div class="text-purple-500 text-xs lg:text-base font-medium italic">Design</div>
                        <p class="font-medium text-sm/4 lg:text-lg italic course-title" title="UI/UX Designer">UI/UX Designer</p>
                    </div>
                    <div class="flex flex-col mb-0.5">
                        <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                        <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional">UI/UX Lead at Astra Internasional</p>
                    </div>
                    <div class="flex flex-row justify-between">
                        <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                        <div class="flex flex-row gap-1">
                            <i class="bx bxs-star text-yellow-500 align-top"></i>
                            <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white z-40 w-auto rounded-lg flex flex-row lg:flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/class-thumbnail/fullstack.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">

                </div>
                <div class="w-1/2">
                    <div class="flex flex-col gap-0 mb-0.5">
                        <div class="text-blue-500 text-xs lg:text-base font-medium italic">Development</div>
                        <p class="font-medium text-sm/4 lg:text-lg italic course-title" title="Full Stack Developer">Full Stack Developer</p>
                    </div>
                    <div class="flex flex-col mb-0.5">
                        <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                        <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional">UI/UX Lead at Astra Internasional</p>
                    </div>
                    <div class="flex flex-row justify-between">
                        <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                        <div class="flex flex-row gap-1">
                            <i class="bx bxs-star text-yellow-500 align-top"></i>
                            <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white z-40 w-auto rounded-lg flex flex-row lg:flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/class-thumbnail/fe.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">

                </div>
                <div class="w-1/2">
                    <div class="flex flex-col gap-0 mb-0.5">
                        <div class="text-blue-500 text-xs lg:text-base font-medium italic">Development</div>
                        <p class="font-medium text-sm/4 lg:text-lg italic course-title" title="Front End Developer">Front End Developer</p>
                    </div>
                    <div class="flex flex-col mb-0.5">
                        <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                        <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional">UI/UX Lead at Astra Internasional</p>
                    </div>
                    <div class="flex flex-row justify-between">
                        <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                        <div class="flex flex-row gap-1">
                            <i class="bx bxs-star text-yellow-500 align-top"></i>
                            <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white z-40 w-auto rounded-lg flex flex-row lg:flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/favicion/checker.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">

                </div>
                <div class="w-1/2">
                    <div class="flex flex-col gap-0 mb-0.5">
                        <div class="text-blue-500 text-xs lg:text-base font-medium italic">Development</div>
                        <p class="font-medium text-sm/4 lg:text-lg italic course-title" title="Lorem ipsum dolor sit amet">Lorem ipsum dolor sit amet</p>
                    </div>
                    <div class="flex flex-col mb-0.5">
                        <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                        <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional">UI/UX Lead at Astra Internasional</p>
                    </div>
                    <div class="flex flex-row justify-between">
                        <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                        <div class="flex flex-row gap-1">
                            <i class="bx bxs-star text-yellow-500 align-top"></i>
                            <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white z-40 w-auto rounded-lg flex flex-row lg:flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/favicion/checker.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">

                </div>
                <div class="w-1/2">
                    <div class="flex flex-col gap-0 mb-0.5">
                        <div class="text-blue-500 text-xs lg:text-base font-medium italic">Development</div>
                        <p class="font-medium text-sm/4 lg:text-lg italic course-title" title="Lorem Ipsum">Lorem Ipsum</p>
                    </div>
                    <div class="flex flex-col mb-0.5">
                        <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                        <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional">UI/UX Lead at Astra Internasional</p>
                    </div>
                    <div class="flex flex-row justify-between">
                        <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                        <div class="flex flex-row gap-1">
                            <i class="bx bxs-star text-yellow-500 align-top"></i>
                            <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- /Ini versi mobilenya Kelas Lainnya --}}


        {{-- Ini versi desktopnya Kelas Lainnya --}}
        <!-- Swiper slider -->
        <div class="relative hidden lg:block">
            <div class="swiper slider-recommendation">
                <div class="swiper-wrapper py-2 mb-4">

                    <div class="swiper-slide">
                        <div class="bg-white w-auto rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                            <img src="{{ asset("assets/images/landing/class-thumbnail/ptpm.png") }}" alt="" class="rounded-lg w-auto max-h-20 lg:max-h-[126px]">
                            <div>
                                <div class="flex flex-col gap-0 mb-1">
                                    <div class="text-orange-500 text-xs lg:text-base font-medium italic">Management</div>
                                    <p class="font-medium h-[32px] text-sm/4 lg:text-lg italic course-title" title="Psychological Testing Product Management">Psychological Testing Product Management</p>
                                </div>
                                <div class="flex flex-col mb-2">
                                    <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                                    <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional">UI/UX Lead at Astra Internasional</p>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                                    <div class="flex flex-row gap-1">
                                        <i class="bx bxs-star text-yellow-500 align-top"></i>
                                        <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white w-auto rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                            <img src="{{ asset("assets/images/landing/class-thumbnail/cpm.png") }}" alt="" class="rounded-lg w-auto max-h-20 lg:max-h-[126px]">
                            <div>
                                <div class="flex flex-col gap-0 mb-1">
                                    <div class="text-orange-500 text-xs lg:text-base font-medium italic">Management</div>
                                    <p class="font-medium h-[32px] text-sm/4 lg:text-lg italic course-title" title="Class Product Management">Class Product Management</p>
                                </div>
                                <div class="flex flex-col mb-2">
                                    <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                                    <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional">UI/UX Lead at Astra Internasional</p>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                                    <div class="flex flex-row gap-1">
                                        <i class="bx bxs-star text-yellow-500 align-top"></i>
                                        <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                            <img src="{{ asset("assets/images/landing/class-thumbnail/uiux.png") }}" alt="" class="rounded-lg w-auto max-h-20 lg:max-h-[126px]">
                            <div>
                                <div class="flex flex-col gap-0 mb-1">
                                    <div class="text-purple-500 text-xs lg:text-base font-medium italic">Design</div>
                                    <p class="font-medium h-[32px] text-sm/4 lg:text-lg italic course-title" title="UI/UX Designer">UI/UX Designer</p>
                                </div>
                                <div class="flex flex-col mb-2">
                                    <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                                    <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional"">UI/UX Lead at Astra Internasional</p>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                                    <div class="flex flex-row gap-1">
                                        <i class="bx bxs-star text-yellow-500 align-top"></i>
                                        <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                            <img src="{{ asset("assets/images/landing/class-thumbnail/fullstack.png") }}" alt="" class="rounded-lg w-auto max-h-20 lg:max-h-[126px]">
                            <div>
                                <div class="flex flex-col gap-0 mb-1">
                                    <div class="text-blue-500 text-xs lg:text-base font-medium italic">Development</div>
                                    <p class="font-medium h-[32px] text-sm/4 lg:text-lg italic course-title" title="Full Stack Developer">Full Stack Developer</p>
                                </div>
                                <div class="flex flex-col mb-2">
                                    <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                                    <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional"">UI/UX Lead at Astra Internasional</p>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                                    <div class="flex flex-row gap-1">
                                        <i class="bx bxs-star text-yellow-500 align-top"></i>
                                        <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                            <img src="{{ asset("assets/images/landing/class-thumbnail/fe.png") }}" alt="" class="rounded-lg w-auto max-h-20 lg:max-h-[126px]">
                            <div>
                                <div class="flex flex-col gap-0 mb-1">
                                    <div class="text-blue-500 text-xs lg:text-base font-medium italic">Development</div>
                                    <p class="font-medium h-[32px] text-sm/4 lg:text-lg italic course-title" title="Front End Developer">Front End Developer</p>
                                </div>
                                <div class="flex flex-col mb-2">
                                    <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                                    <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional"">UI/UX Lead at Astra Internasional</p>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                                    <div class="flex flex-row gap-1">
                                        <i class="bx bxs-star text-yellow-500 align-top"></i>
                                        <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                            <img src="{{ asset("assets/images/landing/favicion/checker.png") }}" alt="" class="rounded-lg w-auto max-h-20 lg:max-h-[126px]">
                            <div>
                                <div class="flex flex-col gap-0 mb-1">
                                    <div class="text-blue-500 text-xs lg:text-base font-medium italic">Development</div>
                                    <p class="font-medium text-sm/4 lg:text-lg italic course-title" title="Lorem ipsum dolor sit amet">Lorem ipsum dolor sit amet</p>
                                </div>
                                <div class="flex flex-col mb-2">
                                    <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                                    <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional"">UI/UX Lead at Astra Internasional</p>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                                    <div class="flex flex-row gap-1">
                                        <i class="bx bxs-star text-yellow-500 align-top"></i>
                                        <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 shadow-md">
                            <img src="{{ asset("assets/images/landing/favicion/checker.png") }}" alt="" class="rounded-lg w-auto max-h-20 lg:max-h-[126px]">
                            <div>
                                <div class="flex flex-col gap-0 mb-1">
                                    <div class="text-blue-500 text-xs lg:text-base font-medium italic">Development</div>
                                    <p class="font-medium text-sm/4 lg:text-lg italic course-title" title="Lorem ipsum">Lorem ipsum</p>
                                </div>
                                <div class="flex flex-col mb-2">
                                    <p class="text-xs lg:text-base text-gray-500 align-top">By Yogsly</p>
                                    <p class="text-xs lg:text-base text-gray-500 align-top course-title" title="UI/UX Lead at Astra Internasional"">UI/UX Lead at Astra Internasional</p>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <p class="text-xs lg:text-base text-gray-500">100 Lesson</p>
                                    <div class="flex flex-row gap-1">
                                        <i class="bx bxs-star text-yellow-500 align-top"></i>
                                        <p class="text-gray-500 text-xs lg:text-base">5.0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination" style="bottom: -0px;"></div>
            </div>
        </div>
        {{-- /Ini versi desktopnya Kelas Lainnya --}}

    </div>
    {{-- /Ini buat nampilin konten menu Kelas Lainnya --}}


    {{-- Ini buat nampilin konten menu Kelas Saya --}}
    <div id="kelas-saya" class="tab-content hidden">

        {{-- Ini versi mobilenya Kelas Saya --}}
        <div class="flex flex-col gap-3 lg:hidden">

            <div class="bg-white z-40 rounded-lg flex flex-row p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/class-thumbnail/graphic-designer.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">
                </div>
                <div class="w-1/2">
                    <div class="flex flex-col-reverse lg:flex-row gap-0.5 lg:gap-5 mb-0.5">
                        <p class="font-medium text-xs lg:text-base course-title italic" title="Graphic Designer">Graphic Designer</p>
                        <p class="bg-yellow-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Ongoing</p>
                    </div>
                    <p class="text-xs lg:text-base font-medium">30%</p>
                    <div class="flex flex-row gap-0.5 items-center mb-0.5">
                        <div class="w-36 bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 30%"></div>
                        </div>
                        <p class="text-xs lg:text-base text-gray-500 align-top">30/100</p>
                    </div>
                    <a href="{{ route('preview.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Mulai<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                </div>
            </div>

            <div class="bg-white z-40 rounded-lg flex flex-row p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/class-thumbnail/ptpm.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">
                </div>
                <div class="w-1/2">
                    <div class="flex flex-col-reverse lg:flex-row gap-0.5 lg:gap-5 mb-0.5">
                        <p class="font-medium text-xs lg:text-base course-title italic" title="Psychological Testing Product Management">Psychological Testing Product Management</p>
                        <p class="bg-green-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Success</p>
                    </div>
                    <p class="text-xs lg:text-base font-medium">100%</p>
                    <div class="flex flex-row gap-0.5 items-center mb-0.5">
                        <div class="w-36 bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 100%"></div>
                        </div>
                        <p class="text-xs lg:text-base text-primary align-top">100/100</p>
                    </div>
                    <a href="{{ route('preview.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Unduh Sertifikat<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                </div>
            </div>

            <div class="bg-white z-40 rounded-lg flex flex-row p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/class-thumbnail/cpm.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">
                </div>
                <div class="w-1/2">
                    <div class="flex flex-col-reverse lg:flex-row gap-0.5 lg:gap-5 mb-0.5">
                        <p class="font-medium text-xs lg:text-base course-title italic" title="Class Product Management">Class Product Management</p>
                        <p class="bg-yellow-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Ongoing</p>
                    </div>
                    <p class="text-xs lg:text-base font-medium">50%</p>
                    <div class="flex flex-row gap-0.5 items-center mb-0.5">
                        <div class="w-36 bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 50%"></div>
                        </div>
                        <p class="text-xs lg:text-base text-gray-500 align-top">50/100</p>
                    </div>
                    <a href="{{ route('preview.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Mulai<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                </div>
            </div>

            <div class="bg-white z-40 rounded-lg flex flex-row p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/class-thumbnail/uiux.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">
                </div>
                <div class="w-1/2">
                    <div class="flex flex-col-reverse lg:flex-row gap-0.5 lg:gap-5 mb-0.5">
                        <p class="font-medium text-xs lg:text-base course-title italic" title="UI/UX Designer">UI/UX Designer</p>
                        <p class="bg-yellow-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Ongoing</p>
                    </div>
                    <p class="text-xs lg:text-base font-medium">10%</p>
                    <div class="flex flex-row gap-0.5 items-center mb-0.5">
                        <div class="w-36 bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 10%"></div>
                        </div>
                        <p class="text-xs lg:text-base text-gray-500 align-top">10/100</p>
                    </div>
                    <a href="{{ route('preview.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Mulai<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                </div>
            </div>

            <div class="bg-white z-40 rounded-lg flex flex-row p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/class-thumbnail/fe.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">
                </div>
                <div class="w-1/2">
                    <div class="flex flex-col-reverse lg:flex-row gap-0.5 lg:gap-5 mb-0.5">
                        <p class="font-medium text-xs lg:text-base course-title italic" title="Front End Developer">Front End Developer</p>
                        <p class="bg-yellow-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Ongoing</p>
                    </div>
                    <p class="text-xs lg:text-base font-medium">75%</p>
                    <div class="flex flex-row gap-0.5 items-center mb-0.5">
                        <div class="w-36 bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 75%"></div>
                        </div>
                        <p class="text-xs lg:text-base text-gray-500 align-top">75/100</p>
                    </div>
                    <a href="{{ route('preview.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Mulai<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                </div>
            </div>

            <div class="bg-white z-40 rounded-lg flex flex-row p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/class-thumbnail/fullstack.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">
                </div>
                <div class="w-1/2">
                    <div class="flex flex-col-reverse lg:flex-row gap-0.5 lg:gap-5 mb-0.5">
                        <p class="font-medium text-xs lg:text-base course-title italic" title="Full Stack Developer">Full Stack Developer</p>
                        <p class="bg-yellow-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Ongoing</p>
                    </div>
                    <p class="text-xs lg:text-base font-medium">67%</p>
                    <div class="flex flex-row gap-0.5 items-center mb-0.5">
                        <div class="w-36 bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 67%"></div>
                        </div>
                        <p class="text-xs lg:text-base text-gray-500 align-top">67/100</p>
                    </div>
                    <a href="{{ route('preview.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Mulai<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                </div>
            </div>

            <div class="bg-white z-40 rounded-lg flex flex-row p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                <div class="w-1/2 flex flex-col justify-center">
                    <img src="{{ asset("assets/images/landing/class-thumbnail/ptpm.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]">
                </div>
                <div class="w-1/2">
                    <div class="flex flex-col-reverse lg:flex-row gap-0.5 lg:gap-5 mb-0.5">
                        <p class="font-medium text-xs lg:text-base course-title italic" title="Psychological Testing Product Management">Psychological Testing Product Management</p>
                        <p class="bg-yellow-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Ongoing</p>
                    </div>
                    <p class="text-xs lg:text-base font-medium">90%</p>
                    <div class="flex flex-row gap-0.5 items-center mb-0.5">
                        <div class="w-36 bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 90%"></div>
                        </div>
                        <p class="text-xs lg:text-base text-gray-500 align-top">90/100</p>
                    </div>
                    <a href="{{ route('preview.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Mulai<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                </div>
            </div>

        </div>
        {{-- /Ini versi mobilenya Kelas Saya --}}

        {{-- Ini versi desktopnya Kelas Saya --}}
        <!-- Swiper slider -->
        <div class="relative hidden lg:block">
            <div class="swiper slider-recommendation">
                <div class="swiper-wrapper py-2 mb-4">

                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                            <img src="{{ asset("assets/images/landing/class-thumbnail/graphic-designer.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]"">
                            <div>
                                <div class="flex flex-col-reverse gap-1 mb-1">
                                    <p class="font-medium text-xs lg:text-base course-title italic" title="Graphic Designer">Graphic Designer</p>
                                    <p class="bg-yellow-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Ongoing</p>
                                </div>
                                <p class="text-xs lg:text-base font-medium">30%</p>
                                <div class="flex flex-row gap-1 items-center mb-2">
                                    <div class="w-36 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                        <div class="bg-primary h-2.5 rounded-full" style="width: 30%"></div>
                                    </div>
                                    <p class="text-xs lg:text-base text-gray-500 align-top">30/100</p>
                                </div>
                                <a href="{{ route('preview.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Mulai<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                            <img src="{{ asset("assets/images/landing/class-thumbnail/secretary-and-finance.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]"">
                            <div>
                                <div class="flex flex-col-reverse gap-1 mb-1">
                                    <p class="font-medium text-xs lg:text-base course-title italic" title="Secretary and Finance">Secretary and Finance</p>
                                    <p class="bg-green-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Success</p>
                                </div>
                                <p class="text-xs lg:text-base font-medium">100%</p>
                                <div class="flex flex-row gap-1 items-center mb-2">
                                    <div class="w-36 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                        <div class="bg-primary h-2.5 rounded-full" style="width: 100%"></div>
                                    </div>
                                    <p class="text-xs lg:text-base text-primary align-top">100/100</p>
                                </div>
                                <a href="{{ route('certificates.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Unduh Sertifikat<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                            <img src="{{ asset("assets/images/landing/class-thumbnail/hr.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]"">
                            <div>
                                <div class="flex flex-col-reverse gap-1 mb-1">
                                    <p class="font-medium text-xs lg:text-base course-title italic" title="Human Resource">Human Resource</p>
                                    <p class="bg-yellow-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Ongoing</p>
                                </div>
                                <p class="text-xs lg:text-base font-medium">50%</p>
                                <div class="flex flex-row gap-1 items-center mb-2">
                                    <div class="w-36 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                        <div class="bg-primary h-2.5 rounded-full" style="width: 50%"></div>
                                    </div>
                                    <p class="text-xs lg:text-base text-gray-500 align-top">50/100</p>
                                </div>
                                <a href="{{ route('preview.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Mulai<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                            <img src="{{ asset("assets/images/landing/class-thumbnail/uiux.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]"">
                            <div>
                                <div class="flex flex-col-reverse gap-1 mb-1">
                                    <p class="font-medium text-xs lg:text-base course-title italic" title="UI/UX Designer">UI/UX Designer</p>
                                    <p class="bg-yellow-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Ongoing</p>
                                </div>
                                <p class="text-xs lg:text-base font-medium">10%</p>
                                <div class="flex flex-row gap-1 items-center mb-2">
                                    <div class="w-36 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                        <div class="bg-primary h-2.5 rounded-full" style="width: 10%"></div>
                                    </div>
                                    <p class="text-xs lg:text-base text-gray-500 align-top">10/100</p>
                                </div>
                                <a href="{{ route('preview.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Mulai<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                            <img src="{{ asset("assets/images/landing/class-thumbnail/fe.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]"">
                            <div>
                                <div class="flex flex-col-reverse gap-1 mb-1">
                                    <p class="font-medium text-xs lg:text-base course-title italic" title="Front End Developer">Front End Developer</p>
                                    <p class="bg-yellow-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Ongoing</p>
                                </div>
                                <p class="text-xs lg:text-base font-medium">75%</p>
                                <div class="flex flex-row gap-1 items-center mb-2">
                                    <div class="w-36 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                        <div class="bg-primary h-2.5 rounded-full" style="width: 75%"></div>
                                    </div>
                                    <p class="text-xs lg:text-base text-gray-500 align-top">75/100</p>
                                </div>
                                <a href="{{ route('preview.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Mulai<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                            <img src="{{ asset("assets/images/landing/class-thumbnail/fullstack.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]"">
                            <div>
                                <div class="flex flex-col-reverse gap-1 mb-1">
                                    <p class="font-medium text-xs lg:text-base course-title italic" title="Full Stack Developer">Full Stack Developer</p>
                                    <p class="bg-yellow-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Ongoing</p>
                                </div>
                                <p class="text-xs lg:text-base font-medium">67%</p>
                                <div class="flex flex-row gap-1 items-center mb-2">
                                    <div class="w-36 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                        <div class="bg-primary h-2.5 rounded-full" style="width: 67%"></div>
                                    </div>
                                    <p class="text-xs lg:text-base text-gray-500 align-top">67/100</p>
                                </div>
                                <a href="{{ route('preview.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Mulai<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg flex flex-col p-2.5 lg:px-3 lg:pb-4 gap-2 lg:gap-3 shadow-md">
                            <img src="{{ asset("assets/images/landing/class-thumbnail/ptpm.png") }}" alt="" class="rounded-lg w-full max-h-24 lg:max-h-[126px]"">
                            <div>
                                <div class="flex flex-col-reverse gap-1 mb-1">
                                    <p class="font-medium text-xs lg:text-base course-title italic" title="Psychological Testing Product Management">Psychological Testing Product Management</p>
                                    <p class="bg-yellow-500 rounded-3xl px-2 text-[10px] lg:text-sm text-center font-medium italic max-w-[70px] lg:max-h-[1.5rem]">Ongoing</p>
                                </div>
                                <p class="text-xs lg:text-base font-medium">90%</p>
                                <div class="flex flex-row gap-1 items-center mb-2">
                                    <div class="w-36 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                        <div class="bg-primary h-2.5 rounded-full" style="width: 90%"></div>
                                    </div>
                                    <p class="text-xs lg:text-base text-gray-500 align-top">90/100</p>
                                </div>
                                <a href="{{ route('preview.index') }}" class="bg-primary text-white py-1 px-2 lg:py-1 rounded-lg text-xs lg:text-base gap-2">Mulai<i class="bx bx-right-arrow-alt text-white text-sm lg:text-base align-bottom"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination" style="bottom: -0px;"></div>
            </div>
        </div>
        {{-- /Ini versi desktopnya Kelas Saya --}}

    </div>
    {{-- /Ini buat nampilin konten menu Kelas Saya --}}


    {{-- Ini buat nampilin konten menu Profil --}}
    <div id="profil" class="tab-content flex-col w-full hidden">
        <div class="z-40">

            <div class="bg-white z-40 p-8 lg:py-6 rounded-xl shadow-md">

                <button class="text-xl lg:text-2xl font-semibold mb-6 pr-4 border-b-2 border-[#75BADB] text-[#75BADB] z-40">Data Diri</button>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-5">
                    <div class="flex flex-col gap-1">
                        <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Nama Lengkap</h2>
                        <div class="lg:text-lg font-medium">Morgan Vero</div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Telepon/HP</h2>
                        <div class="lg:text-lg font-medium">081234567890</div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Alamat Email</h2>
                        <div class="lg:text-lg font-medium">berbinar@gmail.com</div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Jenis Kelamin</h2>
                        <div class="lg:text-lg font-medium">Laki-laki</div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Pendidikan Terakhir</h2>
                        <div class="lg:text-lg font-medium">SMA</div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Usia</h2>
                        <div class="lg:text-lg font-medium">18</div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    {{-- /Ini buat nampilin konten menu Kelas Saya --}}

    <!-- BLUR SETENGAH LINGKARAN PEMBATAS KANAN -->
    <div class="fixed h-0 block -z-10 pointer-events-none">
        <div class="fixed translate-y-[100%] translate-x-[50%] right-0 bg-[#A2D7F0] -z-10 pointer-events-none" style="width: 300px; height: 300px; border-top-left-radius: 420px; border-bottom-left-radius: 420px; border-top-right-radius: 420px; filter: blur(60px); opacity: 0.9; top: 100px"></div>
    </div>

</div>

@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            tabButtons.forEach(btn => btn.classList.remove('active'));

            // Add active class to clicked button
            button.classList.add('active');

            // Hide all tab contents
            tabContents.forEach(content => content.classList.add('hidden'));

            // Show selected tab content
            const tabId = button.getAttribute('data-tab');
            document.getElementById(tabId).classList.remove('hidden');
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
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
            640: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 5, spaceBetween: 16  },
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
            640: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 5, spaceBetween: 16  },
        },
    });

});
</script>
@endsection
