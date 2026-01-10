@extends('landing.layouts.homepage', [
    'title' => 'Profile Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('content')
    <div class="lg:px-6">
        <!-- BLUR SETENGAH LINGKARAN PEMBATAS KIRI -->
        <div class="fixed h-0 block -z-10 pointer-events-none">
            <div class="fixed translate-y-[90%] lg:-translate-y-[10%] -translate-x-[50%] bg-[#A2D7F0] -z-10 pointer-events-none"
                style="width: 300px; height: 300px; border-top-left-radius: 420px; border-bottom-left-radius: 420px; border-top-right-radius: 420px; filter: blur(60px); opacity: 0.9; top: -100px">
            </div>
        </div>

        <div class="flex flex-row gap-6 mb-6 align-bottom max-sm:text-sm text-lg z-40">
            <a href="{{ route('landing.home.index') }}" class="flex flex-col justify-center z-40"><img
                    src="{{ asset('assets/images/landing/favicion/back-chevron.webp') }}" alt="Back" class=""></a>

            <nav class="text-gray-500 max-sm:text-sm text-lg z-40" aria-label="Breadcrumb">
                <a href="{{ route('landing.home.index') }}" class="hover:text-gray-900 transition-colors">BERBINAR+</a>
                <span>/</span>
                <a href="" class="text-primary font-medium transition-colors">Profile</a>
            </nav>
        </div>

        <div class="tab-content flex-col w-full">
            <div class="z-40">

                <div class="w-full pb-6 flex flex-row lg:hidden items-center gap-8">
                    <div class="rounded-3xl bg-[#C2E2F3] text-[#005D8E] text-center py-2 px-6 text-lg font-semibold">Profile
                        Saya</div>
                    <form method="POST" action="{{ route('auth.logout') }}" class="flex flex-row gap-1">
                        @csrf
                        <button type="submit" class="flex flex-row gap-1 items-center">
                            <i class="bx bx-log-out text-red-600 text-lg font-medium"></i>
                            <p class="text-red-600 text-lg font-medium">Keluar</p>
                        </button>
                    </form>
                </div>

                <div class="bg-white z-40 rounded-2xl shadow flex lg:flex-row mb-1">

                    <div class="w-[15%] p-8 lg:py-6 lg:flex flex-col items-center gap-4 hidden">
                        <div class="rounded-3xl bg-[#C2E2F3] text-[#005D8E] text-center py-2 px-6 text-lg font-semibold">
                            Profile Saya</div>
                        <form method="POST" action="{{ route('auth.logout') }}" class="flex flex-row gap-1">
                            @csrf
                            <button type="submit" class="flex flex-row gap-1 items-center">
                                <i class="bx bx-log-out text-red-600 text-lg font-medium"></i>
                                <p class="text-red-600 text-lg font-medium">Keluar</p>
                            </button>
                        </form>
                    </div>

                    <div class="border border-gray-200 hidden lg:block"></div>

                    <div class="w-[85%] p-8 lg:py-6">
                        <button
                            class="text-xl lg:text-2xl font-semibold mb-6 pr-4 border-b-2 border-[#75BADB] text-[#75BADB] z-40">Data
                            Diri</button>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-5">
                            <div class="flex flex-col gap-1">
                                <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Nama Lengkap</h2>
                                <div class="lg:text-lg font-medium">{{ $user->first_name }} {{ $user->last_name }}</div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Telepon/HP</h2>
                                <div class="lg:text-lg font-medium">{{ $user->phone_number }}</div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Alamat Email</h2>
                                <div class="lg:text-lg font-medium">{{ $user->email }}</div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Jenis Kelamin</h2>
                                <div class="lg:text-lg font-medium">{{ $user->gender }}</div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Pendidikan Terakhir</h2>
                                <div class="lg:text-lg font-medium">{{ $user->last_education }}</div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Usia</h2>
                                <div class="lg:text-lg font-medium">{{ $user->age }}</div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Username</h2>
                                <div class="lg:text-lg font-medium">{{ $user->username }}</div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Password</h2>
                                <div class="lg:text-lg font-medium">{{ $user->plain_password ?? '-' }}</div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-sm lg:text-base text-gray-500 font-semibold">Kelas</h2>
                                <div class="lg:text-lg font-medium">
                                    @if ($user->enrollments && $user->enrollments->count())
                                        @php
                                            $activeEnrollments = $user->enrollments->whereIn('status_kelas', [
                                                'enrolled',
                                                'completed',
                                                'expired',
                                            ]);
                                        @endphp
                                        @if ($activeEnrollments->count())
                                            @foreach ($activeEnrollments as $enrollment)
                                                {{ $enrollment->course->name ?? '-' }}<br>
                                            @endforeach
                                        @else
                                            -
                                        @endif
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- BLUR SETENGAH LINGKARAN PEMBATAS KANAN -->
        <div class="fixed h-0 block -z-10 pointer-events-none">
            <div class="fixed translate-y-[100%] translate-x-[50%] right-0 bg-[#A2D7F0] -z-10 pointer-events-none"
                style="width: 300px; height: 300px; border-top-left-radius: 420px; border-bottom-left-radius: 420px; border-top-right-radius: 420px; filter: blur(60px); opacity: 0.9; top: 100px">
            </div>
        </div>

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
                <a href="{{ route('auth.berbinar-plus.regis') }}"
                    class="w-1/3 rounded-lg bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-3 lg:px-6 py-2 font-medium text-white">Ok</a>
            </div>
        </div>
    </div>
@endsection
