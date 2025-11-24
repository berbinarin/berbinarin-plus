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
                <h1 class="text-4xl xl:text-5xl font-bold text-center mb-12 mt-1">Gabung <span
                        class="bg-gradient-to-r from-[#3986A3] to-[#15323D] bg-clip-text text-transparent">Berbinar
                        Class</span></h1>
                <div class="bg-white rounded-3xl p-5 md:px-12 xl:px-16 justify-self-center md:w-[90%] w-full md:shadow-lg">

                    <!-- Tombol Kembali -->
                    <a href="{{ route('home.index') }}">
                        <div class="flex cursor-pointer items-center space-x-2 lg:order-1 mt-2">
                            <img src="{{ asset('assets/images/landing/svg/left-arrow.webp') }}" alt="Left Arrow"
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
                            <div class="mb-4 relative bg-white">
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
                                            <input class="form-check-input mr-2" type="radio" name="gender"
                                                value="Laki-laki" required>
                                            Laki-laki
                                        </label>
                                        <label class="flex items-center">
                                            <input class="form-check-input mr-2" type="radio" name="gender"
                                                value="Perempuan" required>
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="age">Usia</label>
                                <input type="number"
                                    class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm"
                                    id="age" name="age" placeholder="Usia Kamu Sekarang Yaa" required>
                            </div>
                            <div class="mb-4">
                                <label for="wa_number">Nomor Whatsapp Aktif</label>
                                <input type="text"
                                    class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm"
                                    id="wa_number" name="phone_number" placeholder="08112345XXXX" required>
                            </div>
                            <div class="mb-4">
                                <label for="email">Email</label>
                                <input type="email"
                                    class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm"
                                    id="email" name="email" placeholder="sobatbinar@gmail.com" required>
                            </div>
                            <div class="mb-4 relative bg-white">
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
                                    <div class="p-2 grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="flex items-center mb-2">
                                                <input class="form-check-input mr-2" type="radio" name="last_education"
                                                    value="SD" required>
                                                SD
                                            </label>
                                            <label class="flex items-center mb-2">
                                                <input class="form-check-input mr-2" type="radio" name="last_education"
                                                    value="SMP" required>
                                                SMP
                                            </label>
                                            <label class="flex items-center mb-2">
                                                <input class="form-check-input mr-2" type="radio" name="last_education"
                                                    value="SMA" required>
                                                SMA
                                            </label>
                                        </div>
                                        <div>
                                            <label class="flex items-center mb-2">
                                                <input class="form-check-input mr-2" type="radio" name="last_education"
                                                    value="Ahli Madya" required>
                                                Ahli Madya
                                            </label>
                                            <label class="flex items-center mb-2">
                                                <input class="form-check-input mr-2" type="radio" name="last_education"
                                                    value="Sarjana" required>
                                                Sarjana
                                            </label>
                                            <label class="flex items-center mb-2">
                                                <input class="form-check-input mr-2" type="radio" name="last_education"
                                                    value="Other" id="otherRadio" required>
                                                Other
                                            </label>
                                            <input type="text"
                                                class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm"
                                                id="otherInput" name="other_education"
                                                placeholder="Isi pendidikan lain..." disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-1">Sudah Membaca Booklet dan Menyetujui segala ketentuan yang ada pada Booklet
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
                                                            <img src="{{ asset('assets/images/landing/favicion/vector-close.webp') }}"
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
                                                    class="h-10 lg:w-1/4 appearance-none form-checkbox rounded-md bg-gradient-to-r from-[#3986A3] to-[#225062] checked:bg-gradient-to-r checked:from-[#3986A3] checked:to-[#225062] px-16 py-1 lg:px-20 lg:py-1.5 font-medium text-white max-sm:text-[15px] cursor-pointer"
                                                    id="agreeCheckbox" onchange="agreeModal()">
                                                <label for="agreeCheckbox"
                                                    class="absolute -translate-x-1 ml-2 cursor-pointer text-start text-white">Saya
                                                    Setuju</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="nextButton" class="flex justify-center w-full pt-6 mb-4">
                                <button id="nextButton" type="button"
                                    class="next-button w-full mt-4 md:w-auto bg-gradient-to-r from-[#3986A3] to-[#15323D] text-white py-2 px-20 xl:px-40 rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary">Selanjutnya</button>
                            </div>
                        </div>
                        <div id="registrationForm2" class="hidden">
                            <h1
                                class="text-4xl font-bold text-center mb-8 mt-1 bg-gradient-to-r from-[#F7B23B] to-[#916823] bg-clip-text text-transparent">
                                Pilih Kelas</h1>
                            <div class="mb-4">
                                <label for="kelas">Kelas BERBINAR+</label>
                                <select
                                    class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm"
                                    id="kelas" name="course_id" required>
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    @foreach ($ClassBerbinarPlus as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
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
                            <div class="mb-4 rounded-lg bg-white">
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
                            <div class="mb-4">
                                <label for="sumber">Darimana SobatBinar mengetahui layanan produk BERBINAR+</label>
                                <select
                                    class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm"
                                    id="sumber" name="referral_source" onchange="checkOption(this);" required>
                                    <option value="" disabled selected class="text-gray-500">Dari mana nihh</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Telegram">Telegram</option>
                                    <option value="TikTok">TikTok</option>
                                    <option value="LinkedIn">LinkedIn</option>
                                    <option value="Teman">Teman</option>
                                    <option value="Other">Other</option>
                                </select>
                                <input type="text"
                                    class="form-input mt-1 block w-full h-10 pl-2 bg-gray-100 border border-gray-100 rounded-md shadow-sm hidden"
                                    id="otherReferralInput" placeholder="Please specify">
                            </div>
                            <div class="flex justify-center items-center">
                                <div id="openModalConfirm" class="flex justify-center w-full pt-6 mb-4">
                                    <button id="openModalConfirm" type="button"
                                        class="next-button w-full mt-4 md:w-auto bg-gradient-to-r from-[#3986A3] to-[#15323D] text-white py-2 px-20 xl:px-40 rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary">Daftar</button>
                                </div>
                            </div>
                            <div id="myModalConfirm"
                                class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-gray-900 bg-opacity-50 hidden sm:p-4">
                                <div class="bg-white p-6 w-4/5 md:w-1/3 rounded-lg text-center">
                                    <img src="{{ asset('assets/images/landing/produk/emo/confirm.webp') }}" alt=""
                                        class="mx-auto">
                                    <p>Apakah data yang Anda masukkan sudah benar?</p>
                                    <p>Tolong pastikan bahwa informasi yang Anda masukkan telah tepat.</p>
                                    <div class="flex justify-between gap-4 mt-4">
                                        <button id="okButton" type="submit"
                                            class="bg-primary text-white px-4 py-2 rounded-lg font-semibold hover:bg-primary transition duration-300 mr-2 w-1/2">OK</button>
                                        <button id="closeModalConfirm" type="button"
                                            class="bg-white text-primary px-4 py-2 rounded-lg border-2 font-semibold border-primary hover:bg-white transition duration-300 ml-2 w-1/2">Cancel</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <script>
        function formatRupiah(angka) {
            if (!angka) return '';
            if (angka.includes('-')) {
                let [min, max] = angka.split('-').map(s => s.trim());
                return 'Rp ' + Number(min).toLocaleString('id-ID') + ' - ' + Number(max).toLocaleString('id-ID');
            }
            return 'Rp ' + Number(angka).toLocaleString('id-ID');
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Dropdown Jenis Kelamin
            const genderToggle = document.getElementById('genderToggle');
            const genderDropdown = document.getElementById('genderDropdown');
            const genderIcon = document.getElementById('genderIcon');
            const genderRadios = document.querySelectorAll('input[name="gender"]');
            const genderSelected = document.getElementById('genderSelected');

            genderToggle.addEventListener('click', function() {
                genderDropdown.classList.toggle('hidden');
                genderIcon.classList.toggle('rotate-180');
            });
            genderRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    genderSelected.textContent = this.value;
                    genderSelected.classList.remove('text-gray-500');
                    genderSelected.classList.add('text-black');
                    genderDropdown.classList.add('hidden');
                    genderIcon.classList.remove('rotate-180');
                });
            });

            // Dropdown Pendidikan Terakhir
            const educationToggle = document.getElementById('educationToggle');
            const educationDropdown = document.getElementById('educationDropdown');
            const educationIcon = document.getElementById('educationIcon');
            const educationRadios = document.querySelectorAll('input[name="last_education"]');
            const educationSelected = document.getElementById('educationSelected');
            const otherRadio = document.getElementById('otherRadio');
            const otherInput = document.getElementById('otherInput');

            educationToggle.addEventListener('click', function() {
                educationDropdown.classList.toggle('hidden');
                educationIcon.classList.toggle('rotate-180');
            });
            educationRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    educationSelected.textContent = this.value === 'Other' ? 'Other' : this.value;
                    educationSelected.classList.remove('text-gray-500');
                    educationSelected.classList.add('text-black');
                    educationDropdown.classList.add('hidden');
                    educationIcon.classList.remove('rotate-180');
                    if (this.value === 'Other') {
                        otherInput.disabled = false;
                        otherInput.required = true;
                        otherInput.focus();
                    } else {
                        otherInput.disabled = true;
                        otherInput.required = false;
                        otherInput.value = '';
                    }
                });
            });

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

            // Modal Booklet
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

            // Swiper Booklet
            new Swiper('.swiper-container-booklet', {
                slidesPerView: 1,
                spaceBetween: 70,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            // Modal Confirm
            document.getElementById('openModalConfirm').addEventListener('click', function(event) {
                event.preventDefault();
                let errorMessage = validateStep2();
                if (errorMessage) {
                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: "error",
                        title: errorMessage,
                        showConfirmButton: false,
                        showCloseButton: true,
                        timer: 4000
                    });
                    return;
                }
                document.getElementById('myModalConfirm').style.display = "flex";
            });
            document.getElementById('closeModalConfirm').addEventListener('click', function() {
                document.getElementById('myModalConfirm').style.display = "none";
            });
            window.onclick = function(event) {
                const modal = document.getElementById('myModalConfirm');
                if (event.target == modal) modal.style.display = "none";
            };

            // Next Button
            document.getElementById('nextButton').addEventListener('click', function(event) {
                event.preventDefault();
                let errorMessage = validateStep1();
                if (errorMessage) {
                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: "error",
                        title: errorMessage,
                        showConfirmButton: false,
                        showCloseButton: true,
                        timer: 4000
                    });
                    return;
                }
                document.getElementById('registrationForm1').classList.add('hidden');
                document.getElementById('registrationForm2').classList.remove('hidden');
            });

            // Paket layanan dan harga otomatis
            const paketSelect = document.getElementById('paket-layanan');
            const hargaInput = document.getElementById('harga_paket');
            if (paketSelect && hargaInput) {
                paketSelect.addEventListener('change', function() {
                    const selected = this.options[this.selectedIndex];
                    let harga = selected.getAttribute('data-harga') || '';
                    hargaInput.value = formatRupiah(harga);
                });
            }
        });

        function isValidEmail(email) {
            return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email);
        }

        function isValidPhoneNumber(number) {
            return /^(\+62|62|0)8[1-9][0-9]{6,11}$/.test(number);
        }

        function getFieldLabel(fieldName) {
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

        function validateStep1() {
            const requiredFields = [
                'first_name', 'last_name', 'gender', 'age', 'phone_number', 'email', 'last_education'
            ];
            const lastEducation = document.querySelector('input[name="last_education"]:checked');
            if (lastEducation && lastEducation.value === 'Other') {
                requiredFields.push('other_education');
            }
            if (!document.getElementById('bookletCheckbox').checked) {
                return 'Anda harus menyetujui Booklet terlebih dahulu.';
            }
            for (let fieldName of requiredFields) {
                let field;
                if (fieldName === 'gender') {
                    field = document.querySelector('input[name="gender"]:checked');
                } else if (fieldName === 'last_education') {
                    field = document.querySelector('input[name="last_education"]:checked');
                } else {
                    field = document.querySelector(`[name="${fieldName}"]`);
                }
                if (!field || (field.value !== undefined && field.value.trim() === '')) {
                    return '"' + getFieldLabel(fieldName) + '" belum diisi.';
                }
                if (fieldName === 'email' && !isValidEmail(field.value)) {
                    return 'Format Email tidak valid.';
                }
                if (fieldName === 'wa_number' && !isValidPhoneNumber(field.value)) {
                    return 'Format Nomor Whatsapp tidak valid.';
                }
            }
            return null;
        }

        function validateStep2() {
            const requiredFields = [
                'course_id', 'service_package', 'payment_proof_url', 'referral_source'
            ];
            const knowingSource = document.getElementById('sumber').value;

            for (let fieldName of requiredFields) {
                let field;
                if (fieldName === 'payment_proof_url') {
                    field = document.getElementById('bukti_transfer');
                    if (!field || !field.files || field.files.length === 0) {
                        return '"' + getFieldLabel(fieldName) + '" belum diisi.';
                    }
                    continue;
                }
                field = document.querySelector(`[name="${fieldName}"]`);
                if (!field || field.value.trim() === '' || field.value === null) {
                    return '"' + getFieldLabel(fieldName) + '" belum diisi.';
                }
            }
            return null;
        }
    </script>

    @if ($errors->any())
        <script>
            @if ($errors->has('email'))
                Swal.fire({
                    icon: 'error',
                    title: 'Email sudah terdaftar!',
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    showCloseButton: true,
                    timer: 4000
                });
            @endif
            @if ($errors->has('payment_proof_url'))
                Swal.fire({
                    icon: 'error',
                    title: 'Ukuran file terlalu besar!',
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    showCloseButton: true,
                    timer: 4000
                });
            @endif
        </script>
    @endif
@endpush
