@extends('landing.layouts.app', [
    'title' => 'Registrasi Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('style')
    <style>
        .bg-white {
            background-color: white;
        }

        /* Styling untuk checkbox Saya Setuju ketika disabled */
        #agreeCheckbox:disabled {
            cursor: not-allowed !important;
            background-color: gray !important;
        }

        #agreeCheckbox:disabled+label {
            cursor: not-allowed !important;
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
                <h1 class="text-4xl xl:text-5xl font-bold text-center mb-12 mt-1">Gabung
                    <span class="bg-gradient-to-r from-[#3986A3] to-[#15323D] bg-clip-text text-transparent">Berbinar+</span>
                </h1>
                <div class="bg-white rounded-3xl p-5 md:px-12 xl:px-16 justify-self-center md:w-[90%] w-full md:shadow-lg">

                    <!-- Tombol Kembali -->
                    <a href="{{ route('landing.index') }}">
                        <div class="flex cursor-pointer items-center space-x-2 lg:order-1 mt-2">
                            <img src="{{ asset('assets/images/landing/svg/left-arrow.svg') }}" alt="Left Arrow"
                                class="h-3 w-auto" />
                            <p class="text-[15px] font-semibold text-[#3986A3] xl:text-lg">Kembali</p>
                        </div>
                    </a>

                    <form id="internshipForm" method="POST" action="{{ route('auth.berbinar-plus.store') }}"
                        enctype="multipart/form-data">
                        <div id="registrationForm1" class="registration-form">
                            @csrf
                            <h1
                                class="text-4xl font-bold text-center mb-8 mt-1 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text text-transparent">
                                Biodata Diri</h1>

                            {{-- NAMA LENGKAP --}}
                            <div class="flex flex-wrap -mx-2 mb-4">
                                <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
                                    <label for="first_name">Nama Depan</label>
                                    <input type="text"
                                        class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm"
                                        id="first_name" name="first_name" placeholder="Berbinar" required>
                                </div>
                                <div class="w-full md:w-1/2 px-2">
                                    <label for="last_name">Nama Belakang</label>
                                    <input type="text"
                                        class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm"
                                        id="last_name" name="last_name" placeholder="Class" required>
                                </div>
                            </div>

                            {{-- JENIS KELAMIN --}}
                            <div class="mb-4 relative" style="background-color: white;">
                                <label for="genderToggle">Jenis Kelamin</label>
                                <button type="button"
                                    class="flex justify-between items-center w-full bg-gray-100 border border-gray-100 rounded-md shadow-sm p-2 mb-2"
                                    id="genderToggle">
                                    <span id="genderSelected" class="text-gray-500">Pilih Jenis Kelamin</span>
                                    <img src="{{ asset('assets/images/landing/produk/emo/chevron.webp') }}" alt=""
                                        class="transform transition-transform w-[.9rem] mr-1" id="genderIcon">
                                </button>
                                <div class="absolute bg-white border border-gray-300 rounded-md mt-2 w-full z-10 hidden"
                                    id="genderDropdown">
                                    <div class="p-2">
                                        <label class="flex items-center mb-2">
                                            <input class="form-check-input mr-2 gender-radio" type="radio"
                                                name="gender-radio" value="Laki-laki">
                                            Laki-laki
                                        </label>
                                        <label class="flex items-center">
                                            <input class="form-check-input mr-2 gender-radio" type="radio"
                                                name="gender-radio" value="Perempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                                <input type="hidden" name="gender" id="genderInput" required>
                            </div>

                            {{-- USIA --}}
                            <div class="mb-4">
                                <label for="age">Usia</label>
                                <input type="number"
                                    class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm"
                                    id="age" name="age" placeholder="Usia Kamu Sekarang Yaa" required>
                            </div>

                            {{-- WA --}}
                            <div class="mb-4">
                                <label for="wa_number">Nomor Whatsapp Aktif</label>
                                <input type="text"
                                    class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm"
                                    id="wa_number" name="phone_number" placeholder="08112345XXXX" required>
                            </div>

                            {{-- EMAIL --}}
                            <div class="mb-4">
                                <label for="email">Email</label>
                                <input type="email"
                                    class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm"
                                    id="email" name="email" placeholder="sobatbinar@gmail.com" required>
                            </div>

                            {{-- PENDIDIKAN TERAKHIR --}}
                            <div class="mb-4 relative" style="background-color: white;">
                                <label for="educationToggle">Pendidikan Terakhir</label>
                                <button type="button"
                                    class="flex justify-between items-center w-full bg-gray-100 border border-gray-100 shadow-sm p-2 mb-2"
                                    id="educationToggle">
                                    <span id="educationSelected" class="text-gray-500">Apa Pendidikan Terakhirmu?</span>
                                    <img src="{{ asset('assets/images/landing/produk/emo/chevron.webp') }}" alt=""
                                        class="transform transition-transform w-[.9rem] mr-1" id="educationIcon">
                                </button>
                                <div class="absolute bg-white border border-gray-300 rounded-md mt-2 w-full z-10 hidden"
                                    id="educationDropdown">
                                    <div class="p-2 grid grid-cols-3 gap-4" style="background-color: white;">
                                        <div>
                                            <label class="flex items-center mb-2">
                                                <input class="form-check-input mr-2 education-radio" type="radio"
                                                    name="education-radio" value="SD">
                                                SD
                                            </label>
                                            <label class="flex items-center mb-2">
                                                <input class="form-check-input mr-2 education-radio" type="radio"
                                                    name="education-radio" value="SMP">
                                                SMP
                                            </label>
                                        </div>
                                        <div>
                                            <label class="flex items-center mb-2">
                                                <input class="form-check-input mr-2 education-radio" type="radio"
                                                    name="education-radio" value="SMA">
                                                SMA
                                            </label>
                                            <label class="flex items-center mb-2">
                                                <input class="form-check-input mr-2 education-radio" type="radio"
                                                    name="education-radio" value="Ahli Madya">
                                                Ahli Madya
                                            </label>
                                        </div>
                                        <div>
                                            <label class="flex items-center mb-2">
                                                <input class="form-check-input mr-2 education-radio" type="radio"
                                                    name="education-radio" value="Sarjana">
                                                Sarjana
                                            </label>
                                            <label class="flex items-center mb-2">
                                                <input class="form-check-input mr-2 education-radio" type="radio"
                                                    name="education-radio" value="Other" id="otherRadio">
                                                Lainnya
                                            </label>
                                            <!-- Hidden input untuk "Other" education -->
                                            <input type="text"
                                                class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-1 lg:p-2 hidden"
                                                id="otherInput" name="other_education"
                                                placeholder="Isi pendidikan lain...">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="last_education" id="educationInput" required>
                            </div>

                            {{-- BOOKLET --}}
                            <p class="mb-1">Sudah Membaca Booklet dan Menyetujui segala ketentuan yang ada pada
                                Booklet
                            </p>
                            <div class="mb-4 flex items-center">
                                <input type="checkbox"
                                    class="form-checkbox h-5 w-5 bg-gray-100 border border-gray-500 rounded-[5px] shadow-sm"
                                    id="bookletCheckbox" onclick="showModalBooklet()">
                                <a href="#" class="ml-2 text-sm" onclick="showModalBooklet()">Setuju</a>
                            </div>
                            <div id="bookletModal" class="fixed z-50 inset-0 overflow-y-auto hidden">
                                <div
                                    class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 sm:items-top">
                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                        <div class="absolute inset-0 bg-gray-500 opacity-50"></div>
                                    </div>
                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                        aria-hidden="true">&#8203;</span>
                                    <div class="inline-block align-bottom rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full lg:max-w-[44rem] lg:rounded-3xl"
                                        role="dialog" aria-modal="true" aria-labelledby="modal-headline"
                                        style="background: #FFFFFF; background: linear-gradient(25deg,rgba(255, 255, 255, 1) 0%, rgba(198, 220, 229, 1) 18%, rgba(156, 195, 209, 1) 84%, rgba(96, 158, 181, 1) 100%);">
                                        <div class="px-2 lg:px-6 lg:p-6 lg:pb-0 lg:pt-3">
                                            <div class="sm:flex sm:items-start lg:justify-center lg:items-center">
                                                <div
                                                    class="px-2 lg:px-6 mt-3 text-center sm:mt-0 sm:ml-2 sm:mr-2 sm:text-left w-full">
                                                    <div class="px-2 lg:px-6 w-full flex flex-row justify-center">
                                                        <h3 class="text-lg text-center leading-6 lg:pb-2 text-[#333333] font-bold lg:text-2xl"
                                                            id="modal-headline">Booklet Berbinar Class</h3>
                                                        <a onclick="closeModal()"
                                                            class="absolute translate-y-1 lg:translate-y-2 bg-[#E4F3F8] rounded-full right-5 lg:right-10 cursor-pointer">
                                                            <img src="{{ asset('assets/images/landing/favicion/vector-close.svg') }}"
                                                                class="scale-50" alt="close">
                                                        </a>
                                                    </div>
                                                    <div class="mt-2 w-full lg:right-3">
                                                        <div class="swiper-container-booklet">
                                                            <div class="swiper-wrapper">
                                                                @for ($i = 1; $i <= 23; $i++)
                                                                    <div class="swiper-slide">
                                                                        <img src="{{ asset('assets/images/landing/booklet/' . $i . '.webp') }}"
                                                                            alt="Booklet {{ $i }}"
                                                                            class="w-full rounded-2xl" />
                                                                    </div>
                                                                @endfor
                                                            </div>
                                                            <div class="swiper-button-prev"></div>
                                                            <div class="swiper-button-next"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 sm:px-6 flex flex-row justify-center">
                                            <div class="flex flex-col items-center justify-center w-full">
                                                <input type="checkbox"
                                                    class="h-10 w-4/5 lg:w-2/5 appearance-none form-checkbox rounded-md bg-gradient-to-r from-[#3986A3] to-[#225062] checked:bg-gradient-to-r checked:from-[#3986A3] checked:to-[#225062] px-16 py-1 lg:px-20 lg:py-1.5 font-medium text-white max-sm:text-[15px] cursor-pointer"
                                                    id="agreeCheckbox" onchange="agreeModal()">
                                                <label id="agreeLabel" for="agreeCheckbox"
                                                    class="absolute -translate-x-1 ml-2 cursor-pointer text-start text-white">Saya
                                                    Setuju</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- NEXT BUTTON --}}
                            <div id="nextButton" class="flex justify-center w-full pt-6 mb-4">
                                <button id="nextButton" type="button"
                                    class="next-button w-full mt-4 md:w-auto bg-gradient-to-r from-[#3986A3] to-[#15323D] text-white py-2 px-20 xl:px-40 rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary">Selanjutnya</button>
                            </div>

                        </div>


                        <!-- Form kedua dimulai di sini -->
                        <div id="registrationForm2" class="hidden">
                            <h1
                                class="text-4xl font-bold text-center mb-8 mt-1 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text text-transparent">
                                Pilih Kelas</h1>

                            {{-- <div class="mb-4">
                                <label for="kelas">kelas BERBINAR+</label>
                                <select name="kelas" id="kelas" class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                                    <option value="" disabled selected class="text-gray-500">Pilih Kelas</option>
                                    <option value="" disabled selected class="text-gray-500">Kelas 1</option>
                                    <option value="" disabled selected class="text-gray-500">Kelas 2</option>
                                </select>
                            </div> --}}

                            {{-- KELAS BERBINAR+ --}}
                            <div class="mb-4">
                                <label for="course_id">Kelas BERBINAR+</label>
                                <select id="course_id" name="course_id"
                                    class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                                    required>
                                    <option value="" disabled selected class="text-gray-500">Pilih Kelas
                                    </option>
                                    @foreach ($ClassBerbinarPlus as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('course_id') == $id ? 'selected' : '' }}>{{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
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
                                            @foreach ($servicePackages as $paket)
                                                <option value="{{ $paket['value'] }}"
                                                    data-harga="{{ $paket['harga'] }}">
                                                    {{ $paket['label'] }}</option>
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

                            {{-- BACK AND SUBMIT BUTTONS --}}
                            <div class="flex justify-center items-center">
                                <div class="flex justify-center w-full pt-6 mb-4">
                                    <button type="button" id="openModalConfirm"
                                        class="next-button w-full mt-4 md:w-auto bg-gradient-to-r from-[#3986A3] to-[#15323D] text-white py-2 px-20 xl:px-40 rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary">Daftar</button>
                                </div>
                            </div>
                            <!-- Modal Konfirmasi -->
                            <div id="myModalConfirm"
                                class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
                                <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg"
                                    style="background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px;background-clip: padding-box, border-box;">
                                    <img src="{{ asset('assets/images/dashboard/warning.webp') }}" alt="Warning Icon"
                                        class="mx-auto h-[83px] w-[83px]" />
                                    <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">Konfirmasi!
                                    </h2>
                                    <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">Tolong pastikan
                                        bahwa informasi yang Anda masukkan telah tepat.</p>
                                    <div class="mt-3 lg:mt-6 flex justify-center gap-3">
                                        <button type="button" id="closeModalConfirm"
                                            class="w-1/3 rounded-lg border border-primary px-3 lg:px-6 py-2 text-stone-700">Kembali</button>
                                        <button type="button" id="okButton"
                                            class="w-1/3 rounded-lg bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-3 lg:px-6 py-2 font-medium text-white">OK</button>
                                    </div>
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
            // --- Paket Layanan dan Harga otomatis ---
            const paketSelect = document.getElementById('paket-layanan');
            const hargaInput = document.getElementById('harga_paket');
            if (paketSelect && hargaInput) {
                paketSelect.addEventListener('change', function() {
                    const selected = this.options[this.selectedIndex];
                    let harga = selected.getAttribute('data-harga') || '';
                    if (harga) {
                        if (harga.includes('-')) {
                            // Range harga
                            const [min, max] = harga.split('-');
                            harga = 'Rp ' + Number(min).toLocaleString('id-ID') + ' - Rp ' + Number(max)
                                .toLocaleString('id-ID');
                        } else {
                            harga = 'Rp ' + Number(harga).toLocaleString('id-ID');
                        }
                    }
                    hargaInput.value = harga;
                });
            }
            // --- Dropdown Jenis Kelamin ---
            const genderToggle = document.getElementById('genderToggle');
            const genderDropdown = document.getElementById('genderDropdown');
            const genderIcon = document.getElementById('genderIcon');
            const genderSelected = document.getElementById('genderSelected');
            const genderInput = document.getElementById('genderInput');
            genderToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                genderDropdown.classList.toggle('hidden');
                genderIcon.classList.toggle('rotate-180');
            });
            genderDropdown.querySelectorAll('.gender-radio').forEach(option => {
                option.addEventListener('click', function(e) {
                    e.stopPropagation();
                    genderSelected.textContent = this.value;
                    genderSelected.classList.remove('text-gray-500');
                    genderSelected.classList.add('text-black');
                    genderInput.value = this.value;
                    genderDropdown.classList.add('hidden');
                    genderIcon.classList.remove('rotate-180');
                });
            });
            document.addEventListener('click', function(e) {
                if (!genderDropdown.classList.contains('hidden')) {
                    if (!genderDropdown.contains(e.target) && e.target !== genderToggle) {
                        genderDropdown.classList.add('hidden');
                        genderIcon.classList.remove('rotate-180');
                    }
                }
            });

            // --- Dropdown Pendidikan Terakhir ---
            const educationToggle = document.getElementById('educationToggle');
            const educationDropdown = document.getElementById('educationDropdown');
            const educationIcon = document.getElementById('educationIcon');
            const educationSelected = document.getElementById('educationSelected');
            const otherRadio = document.getElementById('otherRadio');
            const otherInput = document.getElementById('otherInput');
            const educationInput = document.getElementById('educationInput');
            educationToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                educationDropdown.classList.toggle('hidden');
                educationIcon.classList.toggle('rotate-180');
            });
            educationDropdown.querySelectorAll('.education-radio').forEach(option => {
                option.addEventListener('click', function(e) {
                    e.stopPropagation();
                    educationSelected.textContent = this.value === 'Other' ? 'Lainnya' : this.value;
                    educationSelected.classList.remove('text-gray-500');
                    educationSelected.classList.add('text-black');
                    educationInput.value = this.value;
                    educationDropdown.classList.add('hidden');
                    educationIcon.classList.remove('rotate-180');
                    if (this.value === 'Other') {
                        otherInput.disabled = false;
                        otherInput.required = false;
                        otherInput.value = 'Other';
                    } else {
                        otherInput.disabled = true;
                        otherInput.required = false;
                        otherInput.value = '';
                    }
                });
            });
            document.addEventListener('click', function(e) {
                if (!educationDropdown.classList.contains('hidden')) {
                    if (!educationDropdown.contains(e.target) && e.target !== educationToggle) {
                        educationDropdown.classList.add('hidden');
                        educationIcon.classList.remove('rotate-180');
                    }
                }
            });

            // --- File upload display ---
            document.getElementById('bukti_transfer').addEventListener('change', function(e) {
                const fileNameSpan = document.getElementById('fileName');
                fileNameSpan.textContent = this.files && this.files.length > 0 ? this.files[0].name : '';
            });

            // --- Sumber informasi "Other" ---
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

            // --- Modal Booklet ---
            window.showModalBooklet = function() {
                document.getElementById('bookletModal').classList.remove('hidden');
            };
            window.closeModal = function() {
                document.getElementById('bookletModal').classList.add('hidden');
            };
            window.agreeModal = function() {
                document.getElementById('bookletModal').classList.add('hidden');
                document.getElementById('bookletCheckbox').checked = true;
            };

            const bookletSwiper = new Swiper('.swiper-container-booklet', {
                slidesPerView: 1,
                spaceBetween: 70,
                loop: false,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            const mainBookletCheckbox = document.getElementById('bookletCheckbox');
            if (mainBookletCheckbox) {
                mainBookletCheckbox.checked = false;
                mainBookletCheckbox.addEventListener('click', function(e) {
                    e.preventDefault();
                    showModalBooklet();
                });
            }

            // --- Disable "Saya Setuju" until last slide ---
            const agreeCheckbox = document.getElementById('agreeCheckbox');
            const agreeLabel = document.getElementById('agreeLabel');
            if (agreeCheckbox) {
                agreeCheckbox.checked = false;
                agreeCheckbox.disabled = true;
            }
            const enableAgreeIfLast = () => {
                if (!agreeCheckbox || !bookletSwiper) return;
                if (bookletSwiper.isEnd) {
                    agreeCheckbox.disabled = false;
                    agreeCheckbox.style.cursor = 'pointer';
                    agreeLabel.style.cursor = 'pointer';
                    agreeLabel.innerHTML = 'Saya Setuju';
                    agreeCheckbox.style.background = 'linear-gradient(to right, #3986A3, #15323D)';
                } else {
                    agreeCheckbox.disabled = true;
                    agreeCheckbox.style.cursor = 'not-allowed';
                    agreeLabel.style.cursor = 'not-allowed';
                    agreeLabel.innerHTML = 'Harap membaca sampai habis';
                    agreeCheckbox.style.background = '#8D8D8D';
                    agreeCheckbox.checked = false;
                }
            };
            bookletSwiper.on('init', enableAgreeIfLast);
            bookletSwiper.on('slideChange', enableAgreeIfLast);
            if (typeof bookletSwiper.init === 'function') bookletSwiper.init();
            enableAgreeIfLast();
            agreeCheckbox.addEventListener('click', function(e) {
                if (this.disabled) {
                    e.preventDefault();
                    showCustomAlert(
                        'Anda belum membaca booklet sampai habis',
                        'Peringatan!',
                        "{{ asset('assets/images/landing/favicion/warning.webp') }}"
                    );
                }
            });
            window.agreeModal = function() {
                const modal = document.getElementById('bookletModal');
                const main = document.getElementById('bookletCheckbox');
                const agree = document.getElementById('agreeCheckbox');
                if (agree && agree.checked) {
                    if (modal) modal.classList.add('hidden');
                    if (main) main.checked = true;
                }
            };

        });

        // --- Custom Alert Functions ---
        function showCustomAlert(message, title = "Peringatan", icon =
            "{{ asset('assets/images/landing/favicion/warning.webp') }}") {
            const alertHTML = `
                <div x-data="{ open: true }" x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40" x-cloak>
                    <div class="relative w-[560px] rounded-[20px] bg-white p-6 font-plusJakartaSans shadow-lg"
                        style="background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px; background-clip: padding-box, border-box;">
                        <img src="${icon}" alt="icon" class="mx-auto h-[83px] w-[83px]" />
                        <h2 class="mt-4 text-center font-plusJakartaSans text-2xl font-bold text-stone-900">${title}</h2>
                        <p class="mt-2 text-center text-base font-medium text-black">${message}</p>
                        <div class="mt-6 flex justify-center">
                            <button onclick="this.closest('.fixed').remove()" class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-10 py-2 font-medium text-white">OK</button>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', alertHTML);
        }

        function showCustomAlertError(message, title = "Error", icon =
            "{{ asset('assets/images/landing/favicion/error.webp') }}") {
            const alertHTML = `
                <div x-data="{ open: true }" x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40" x-cloak>
                    <div class="relative w-[560px] rounded-[20px] bg-white p-6 font-plusJakartaSans shadow-lg"
                        style="background: linear-gradient(to right, #BD7979, #BD7979) top/100% 6px no-repeat, white; border-radius: 20px; background-clip: padding-box, border-box;">
                        <img src="${icon}" alt="icon" class="mx-auto h-[83px] w-[83px]" />
                        <h2 class="mt-4 text-center font-plusJakartaSans text-2xl font-bold text-stone-900">${title}</h2>
                        <p class="mt-2 text-center text-base font-medium text-black">${message}</p>
                        <div class="mt-6 flex justify-center">
                            <button onclick="this.closest('.fixed').remove()" class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-10 py-2 font-medium text-white">OK</button>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', alertHTML);
        }

        // --- Validasi Step 1 ---
        function validateStep1() {
            const requiredFields = [
                'first_name', 'last_name', 'gender', 'age', 'phone_number', 'email', 'last_education'
            ];
            if (!document.getElementById('bookletCheckbox').checked) {
                showCustomAlert(
                    'Anda harus menyetujui Booklet terlebih dahulu.',
                    'Perhatian!',
                    "{{ asset('assets/images/dashboard/error.webp') }}"
                );
                return null;
            }
            for (let fieldName of requiredFields) {
                let field;
                if (fieldName === 'gender') {
                    field = document.getElementById('genderInput');
                } else if (fieldName === 'last_education') {
                    field = document.getElementById('educationInput');
                } else {
                    field = document.querySelector(`[name="${fieldName}"]`);
                }
                if (!field || (field.value !== undefined && field.value.trim() === '')) {
                    showCustomAlert(
                        '"' + getFieldLabel(fieldName) + '" belum diisi.',
                        'Validasi Error',
                        "{{ asset('assets/images/dashboard/error.webp') }}"
                    );
                    return null;
                }
                if (fieldName === 'email' && !isValidEmail(field.value)) {
                    showCustomAlert(
                        'Format Email tidak valid.',
                        'Validasi Error',
                        "{{ asset('assets/images/dashboard/error.webp') }}"
                    );
                    return null;
                }
                if (fieldName === 'phone_number' && !isValidPhoneNumber(field.value)) {
                    showCustomAlert(
                        'Format Nomor Whatsapp tidak valid.',
                        'Validasi Error',
                        "{{ asset('assets/images/dashboard/error.webp') }}"
                    );
                    return null;
                }
            }
            return true;
        }

        // --- Validasi Step 2 ---
        function validateStep2() {
            const requiredFields = [
                'course_id', 'service_package', 'price_package', 'payment_proof_url', 'referral_source'
            ];
            const knowingSource = document.getElementById('sumber').value;
            if (knowingSource === 'Other') {
                requiredFields.push('otherReasonText');
            }
            for (let fieldName of requiredFields) {
                let field;
                if (fieldName === 'payment_proof_url') {
                    field = document.getElementById('bukti_transfer');
                    if (!field || !field.files || field.files.length === 0) {
                        showCustomAlert(
                            '"' + getFieldLabel(fieldName) + '" belum diisi.',
                            'Validasi Error',
                            "{{ asset('assets/images/dashboard/error.webp') }}"
                        );
                        return null;
                    }
                    continue;
                }
                field = document.querySelector(`[name="${fieldName}"]`);
                if (!field || field.value.trim() === '' || field.value === null) {
                    showCustomAlert(
                        '"' + getFieldLabel(fieldName) + '" belum diisi.',
                        'Validasi Error',
                        "{{ asset('assets/images/dashboard/error.webp') }}"
                    );
                    return null;
                }
            }
            return true;
        }

        // --- Helper Functions ---
        function getFieldLabel(fieldName) {
            // Map field names to user-friendly labels
            const labelMap = {
                first_name: 'Nama Depan',
                last_name: 'Nama Belakang',
                gender: 'Jenis Kelamin',
                age: 'Usia',
                phone_number: 'Nomor Whatsapp Aktif',
                email: 'Email',
                last_education: 'Pendidikan Terakhir',
                course_id: 'Kelas BERBINAR+',
                service_package: 'Paket Layanan',
                price_package: 'Harga',
                payment_proof_url: 'Bukti Pembayaran',
                referral_source: 'Sumber Informasi',
                otherReasonText: 'Sumber Informasi Lainnya',
            };
            if (labelMap[fieldName]) {
                return labelMap[fieldName];
            }
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (field) {
                const container = field.closest('.mb-4, .flex.flex-wrap');
                if (container) {
                    const label = container.querySelector('label');
                    if (label) return label.textContent.trim();
                }
            }
            return fieldName.replace(/_/g, ' ');
        }

        function isValidEmail(email) {
            return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email);
        }

        function isValidPhoneNumber(number) {
            return /^(\+62|62|0)8[1-9][0-9]{6,11}$/.test(number);
        }

        // --- Next Button ---
        document.getElementById('nextButton').addEventListener('click', function(event) {
            event.preventDefault();
            if (validateStep1()) {
                document.getElementById('registrationForm1').classList.add('hidden');
                document.getElementById('registrationForm2').classList.remove('hidden');
            }
        });
        // --- Modal Konfirmasi ---
        document.getElementById('openModalConfirm').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('myModalConfirm').style.display = "flex";
        });
        document.getElementById('closeModalConfirm').addEventListener('click', function() {
            document.getElementById('myModalConfirm').style.display = "none";
        });
        document.getElementById('okButton').addEventListener('click', function() {
            document.getElementById('myModalConfirm').style.display = "none";
            document.getElementById('internshipForm').submit();
        });
        window.onclick = function(event) {
            const modal = document.getElementById('myModalConfirm');
            if (event.target == modal) modal.style.display = "none";
        };
    </script>
    @if (session('email_exists'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showCustomAlertError('Email sudah terdaftar, silakan gunakan email lain.', 'Email Sudah Terdaftar',
                    "{{ asset('assets/images/landing/favicion/error.webp') }}");
            });
        </script>
    @endif
@endpush
