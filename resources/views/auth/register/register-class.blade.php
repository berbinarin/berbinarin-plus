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
        <div class="flex flex-no-wrap pt-8">
            <div class="w-full mt-14 md:mt-28 justify-center items-center">
                <h1 class="text-4xl xl:text-5xl font-bold text-center mb-12 mt-1">Daftar Kelas Baru
                    <span class="bg-gradient-to-r from-[#3986A3] to-[#15323D] bg-clip-text text-transparent">Berbinar+</span>
                </h1>
                <div class="bg-white rounded-3xl p-5 md:px-12 xl:px-16 justify-self-center md:w-[90%] w-full md:shadow-lg">
                    <!-- Tombol Kembali -->
                    <a href="{{ route('landing.home.index') }}">
                        <div class="flex items-center gap-2 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                            <span class="text-base text-primary">Kembali ke Beranda</span>
                        </div>
                    </a>

                    <!-- Form Step 2: Pilih Kelas, Paket, Bukti Pembayaran, Sumber Info -->
                    <form id="enrollClassForm" method="POST" action="{{ route('auth.berbinar-plus.enroll-class.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::guard('berbinar')->user()->id }}">

                        <div id="registrationForm2">
                            <h1
                                class="text-4xl font-bold text-center mb-8 mt-1 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text text-transparent">
                                Pilih Kelas</h1>

                            {{-- KELAS BERBINAR+ --}}
                            <div class="mb-4">
                                <label for="course_id">Kelas BERBINAR+</label>
                                <select id="course_id" name="course_id"
                                    class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                                    required>
                                    <option value="" disabled selected class="text-gray-500">Pilih Kelas
                                    </option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- PAKET LAYANAN --}}
                            <div class="mb-4">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 items-end">
                                    <div class="md:col-span-2">
                                        <label for="paket-layanan" class="block">Paket Layanan</label>
                                        <select
                                            class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm"
                                            id="paket-layanan" name="service_package" required>
                                            <option value="" disabled selected>Pilih Paket Layanan Kamu</option>
                                            @foreach ($packages as $package)
                                                <option value="{{ $package->id }}" data-harga="{{ $package->price }}">
                                                    {{ $package->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="harga_paket" class="block mb-1 md:mb-0">Harga</label>
                                        <input type="text" id="harga_paket" name="price_package"
                                            class="form-input block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm"
                                            readonly placeholder="Harga Paket">
                                    </div>
                                </div>
                            </div>

                            {{-- BUKTI PEMBAYARAN --}}
                            <div class="mb-4 rounded-lg" style="background-color: white;">
                                <label for="bukti_transfer">Bukti Pembayaran</label>
                                <div class="relative w-full flex items-center">
                                    <input type="file" id="bukti_transfer" name="payment_proof_url"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*"
                                        required />
                                    <div
                                        class="mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm pointer-events-none flex items-center">
                                        <button type="button"
                                            class="pointer-events-none border flex justify-between gap-2 py-[2px] px-2 border-[#B3B3B3] rounded-md items-center">
                                            <img src="{{ asset('assets/images/landing/produk/emo/upload-line-icon.webp') }}"
                                                alt="" class="w-4 h-4">
                                            Upload File
                                        </button>
                                        <span id="fileName" class="ml-3 text-base text-gray-600 truncate"></span>
                                    </div>
                                </div>
                            </div>

                            {{-- SUMBER INFORMASI --}}
                            <div class="mb-4">
                                <label for="sumber">Darimana SobatBinar mengetahui layanan produk BERBINAR+</label>
                                <select
                                    class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm"
                                    id="sumber" name="referral_source" required>
                                    <option value="" disabled selected class="text-gray-500">Dari mana nihh
                                    </option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Telegram">Telegram</option>
                                    <option value="TikTok">TikTok</option>
                                    <option value="LinkedIn">LinkedIn</option>
                                    <option value="Teman">Teman</option>
                                    <option value="Other">Other</option>
                                </select>
                                <input type="text"
                                    class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm hidden"
                                    id="otherReferralInput" name="otherReasonText" placeholder="Please specify">
                            </div>

                            {{-- SUBMIT BUTTON --}}
                            <div class="flex justify-center items-center">
                                <div class="flex justify-center w-full pt-6 mb-4">
                                    <button type="submit"
                                        class="next-button w-full mt-4 md:w-auto bg-gradient-to-r from-[#3986A3] to-[#15323D] text-white py-2 px-20 xl:px-40 rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <script>
        // Format Rupiah
        function formatRupiah(angka) {
            if (!angka) return '';
            if (angka.includes('-')) {
                let [min, max] = angka.split('-').map(s => s.trim());
                return 'Rp ' + Number(min).toLocaleString('id-ID') + ' - ' + Number(max).toLocaleString('id-ID');
            }
            return 'Rp ' + Number(angka).toLocaleString('id-ID');
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Paket Layanan dan Harga otomatis
            const paketSelect = document.getElementById('paket-layanan');
            const hargaInput = document.getElementById('harga_paket');
            if (paketSelect && hargaInput) {
                paketSelect.addEventListener('change', function() {
                    const selected = this.options[this.selectedIndex];
                    let harga = selected.getAttribute('data-harga') || '';
                    hargaInput.value = harga ? formatRupiah(harga) : '';
                });
            }

            // File upload display
            document.getElementById('bukti_transfer').addEventListener('change', function(e) {
                const fileNameSpan = document.getElementById('fileName');
                fileNameSpan.textContent = this.files && this.files.length > 0 ? this.files[0].name : '';
            });

            // Sumber informasi "Other"
            document.getElementById('sumber').addEventListener('change', function() {
                const otherInput = document.getElementById('otherReferralInput');
                if (this.value === 'Other') {
                    otherInput.classList.remove('hidden');
                    otherInput.required = true;
                    otherInput.value = '';
                    otherInput.focus();
                } else {
                    otherInput.classList.add('hidden');
                    otherInput.required = false;
                    otherInput.value = '';
                }
            });
        });
    </script>
@endpush
