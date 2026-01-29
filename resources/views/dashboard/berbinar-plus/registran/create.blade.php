@extends('dashboard.layouts.app', [
    'title' => 'Tambah Data Berbinar Plus User',
])

@section('content')
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="py-4 md:pb-7 md:pt-12">
                <div class="mb-2 flex items-center gap-2">
                    <a href="{{ route('dashboard.pendaftar.index') }}">
                        <img src="{{ asset('assets/images/dashboard/svg-icon/dashboard-back.webp') }}" alt="Back Btn" />
                    </a>
                    <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">Tambah
                        Data Pendaftar</p>
                </div>
                <p class="w-full text-disabled">Formulir untuk menambahkan peserta baru ke program Berbinar+ secara manual,
                    lengkap dengan informasi pribadi, pilihan kelas, dan paket layanan yang dipilih.</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="rounded-lg bg-white px-4 py-4 shadow-md md:px-8 md:py-7 xl:px-10 mb-7">
                {{-- <form id="berbinarForm" action="{{ route("dashboard.pendaftar.store") }}" method="POST" enctype="multipart/form-data"> --}}
                <form id="berbinarForm" action="{{ route('dashboard.pendaftar.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="kategori" value="berbinar-for-u" />

                    <h1 class="mb-6 text-center text-3xl font-bold">
                        Kelas Berbinar+
                    </h1>
                    <div class="flex flex-col">
                        <div class="mb-10 grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label class="text-lg">Nama Depan</label>
                                <input type="text" id="first_name" name="first_name" placeholder="Nama Depan"
                                    class="peer w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm" required />
                            </div>
                            <div>
                                <label class="text-lg">Nama Belakang</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Nama Belakang"
                                    class="peer w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm" required />
                            </div>
                            <div>
                                <label class="text-lg">Jenis Kelamin</label>
                                <select id="gender" name="gender"
                                    class="peer w-full rounded-lg border border-gray-300 bg-white px-4 py-2 shadow-sm"
                                    required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-lg">Usia</label>
                                <input type="number" id="age" name="age" placeholder="Usia Kamu Sekarang"
                                    class="peer w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm" required />
                            </div>
                            <div>
                                <label class="text-lg">Nomor WhatsApp</label>
                                <input type="text" id="wa_number" name="phone_number" placeholder="08112345XXXX"
                                    class="peer w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm" required />
                            </div>
                            <div>
                                <label class="text-lg">Email</label>
                                <input type="email" id="email" name="email" placeholder="sobatbinar@gmail.com"
                                    class="peer w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm" required />
                            </div>
                            <div class="relative" style="background-color: white">
                                <label class="text-lg">Pendidikan Terakhir</label>
                                <button type="button" id="educationToggle"
                                    class="flex w-full items-center justify-between rounded-lg border border-gray-300 bg-white px-4 py-2 shadow-sm focus:outline-none">
                                    <span id="educationSelected" class="text-gray-500">Apa Pendidikan Terakhirmu?</span>
                                    <img src="{{ asset('assets/images/landing/produk/emo/chevron.webp') }}" alt=""
                                        class="mr-1 w-[.9rem] transform transition-transform" id="educationIcon" />
                                </button>
                                <div class="absolute z-10 mt-2 hidden w-full rounded-md border border-gray-300 bg-white"
                                    id="educationDropdown">
                                    <div class="grid grid-cols-2 gap-4 p-2" style="background-color: white">
                                        <div>
                                            <label class="mb-2 flex cursor-pointer items-center">
                                                <input class="form-check-input mr-2" type="radio" name="last_education"
                                                    value="SD" required />
                                                SD
                                            </label>
                                            <label class="mb-2 flex cursor-pointer items-center">
                                                <input class="form-check-input mr-2" type="radio" name="last_education"
                                                    value="SMP" required />
                                                SMP
                                            </label>
                                            <label class="mb-2 flex cursor-pointer items-center">
                                                <input class="form-check-input mr-2" type="radio" name="last_education"
                                                    value="SMA" required />
                                                SMA
                                            </label>
                                        </div>
                                        <div>
                                            <label class="mb-2 flex cursor-pointer items-center">
                                                <input class="form-check-input mr-2" type="radio" name="last_education"
                                                    value="Ahli Madya" required />
                                                Ahli Madya
                                            </label>
                                            <label class="mb-2 flex cursor-pointer items-center">
                                                <input class="form-check-input mr-2" type="radio" name="last_education"
                                                    value="Sarjana" required />
                                                Sarjana
                                            </label>
                                            <label class="mb-2 flex cursor-pointer items-center">
                                                <input class="form-check-input mr-2" type="radio" name="last_education"
                                                    value="Other" required />
                                                Lainnya
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h1 class="mb-6 text-center text-3xl font-bold">Pilih Kelas</h1>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label class="text-lg">Kelas Berbinar+</label>
                                <select id="kelas" name="course_id"
                                    class="peer w-full rounded-lg border border-gray-300 bg-white px-4 py-2 shadow-sm"
                                    required>
                                    <option value="" disabled {{ old('class_id') ? '' : 'selected' }}>Pilih Kelas
                                        Berbinar+</option>
                                    @foreach ($classes as $k)
                                        <option value="{{ $k->id }}"
                                            {{ old('class_id') == $k->id ? 'selected' : '' }}>{{ $k->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-lg">Paket Layanan</label>
                                <select id="paket" name="service_package"
                                    class="peer w-full rounded-lg border border-gray-300 bg-white px-4 py-2 shadow-sm"
                                    required>
                                    <option value="" disabled selected>Pilih Paket Layanan</option>
                                    <option value="Insight" data-harga="15000">Insight</option>
                                    <option value="A+ Online Weekday" data-harga="36000-120000">A+ Online Weekday
                                    </option>
                                    <option value="A+ Online Weekend" data-harga="44000-140000">A+ Online Weekend
                                    </option>
                                    <option value="A+ Offline Weekday" data-harga="44000-140000">A+ Offline Weekday
                                    </option>
                                    <option value="A+ Offline Weekend" data-harga="44000-180000">A+ Offline Weekend
                                    </option>
                                    <option value="Complete" data-harga="100000-280000">Complete</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-lg">Harga Paket</label>
                                <input type="text" id="harga_paket" name="price_package"
                                    class="peer w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm"
                                    placeholder="Harga Paket" readonly />
                            </div>
                            <div>
                                <label class="text-lg">Bukti Pembayaran</label>
                                <div class="relative flex w-full items-center overflow-x-auto">
                                    <input type="file" id="bukti_transfer" name="payment_proof_url"
                                        class="absolute inset-0 h-full w-full cursor-pointer opacity-0 py-2"
                                        accept="image/*" required />
                                    <div
                                        class="pointer-events-none mt-1 block flex h-10 w-full items-center rounded-md border border-gray-100 bg-gray-100 pl-2 shadow-sm overflow-x-auto">
                                        <button type="button"
                                            class="pointer-events-none flex cursor-pointer items-center justify-between gap-2 rounded-md border border-[#B3B3B3] px-2 py-[2px]">
                                            <img src="{{ asset('assets/images/landing/produk/emo/upload-line-icon.webp') }}"
                                                alt="" class="h-4 w-4" />
                                            Upload File
                                        </button>
                                        <span id="fileName"
                                            class="ml-3 truncate text-base text-gray-600 max-w-[250px]"></span>
                                    </div>
                                </div>
                                <small class="text-gray-500 block mt-1">
                                    <span class="text-red-500">Ukuran file maksimal 1 MB.</span>
                                </small>
                            </div>
                            <div>
                                <label class="text-lg">Darimana SobatBinar mengetahui layanan produk BERBINAR+</label>
                                <select
                                    class="form-input mt-1 block h-10 w-full rounded-md border border-gray-100 bg-gray-100 pl-2 shadow-sm py-2"
                                    id="sumber" name="referral_source" required>
                                    <option value="" disabled selected class="text-gray-500">Dari mana nihh</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Telegram">Telegram</option>
                                    <option value="TikTok">TikTok</option>
                                    <option value="LinkedIn">LinkedIn</option>
                                    <option value="Teman">Teman</option>
                                    <option value="Other">Other</option>
                                </select>
                                <input type="text"
                                    class="form-input mt-1 block hidden h-10 w-full rounded-md border border-gray-100 bg-gray-100 pl-2 shadow-sm py-2"
                                    id="otherReasonText" name="otherReasonText" placeholder="Please specify" />
                            </div>
                        </div>

                        <div class="mt-8 flex gap-4 pt-5">
                            <a href="#" id="cancelButton"
                                class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg"
                                style="width: 50%; border: 2px solid #3986a3; color: #3986a3">Batal</a>
                            <button type="button" id="submitButton"
                                class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg"
                                style="width: 50%; background: #3986a3; color: #fff">Simpan</button>
                        </div>

                        <!-- Modal Konfirmasi Batal -->
                        <div id="confirmModal"
                            class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
                            <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg"
                                style=" background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px; background-clip: padding-box, border-box;">
                                <!-- Warning Icon -->
                                <img src="{{ asset('assets/images/dashboard/warning.webp') }}" alt="Warning Icon"
                                    class="mx-auto h-[83px] w-[83px]" />

                                <!-- Title -->
                                <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">Konfirmasi Batal</h2>

                                <!-- Message -->
                                <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">Apakah Anda yakin ingin membatalkan pengisian data?</p>

                                <!-- Actions -->
                                <div class="mt-3 lg:mt-6 flex justify-center gap-3">
                                    <button type="button" id="cancelSubmit"
                                        class="rounded-lg border border-stone-300 px-4 lg:px-6 py-2 text-sm lg:text-base text-stone-700">Tidak</button>
                                    <button type="button" id="confirmAction"
                                        class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-4 lg:px-6 py-2 font-medium text-white text-sm lg:text-base">Ya</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // --- Custom Alert Functions ---
        function showCustomAlert(message, title = "Peringatan", icon = "{{ asset('assets/images/landing/favicion/warning.webp') }}") {
            const alertHTML = `
                <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
                    <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg"
                        style="background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px; background-clip: padding-box, border-box;">
                        <img src="${icon}" alt="icon" class="mx-auto h-[83px] w-[83px]" />
                        <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">${title}</h2>
                        <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">${message}</p>
                        <div class="mt-3 lg:mt-6 flex justify-center">
                            <button onclick="this.closest('.fixed').remove()" class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-8 lg:px-10 py-2 font-medium text-white">OK</button>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', alertHTML);
        }

        function showCustomAlertError(message, title = "Error", icon = "{{ asset('assets/images/landing/favicion/error.webp') }}") {
            const alertHTML = `
                <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
                    <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg"
                        style="background: linear-gradient(to right, #BD7979, #BD7979) top/100% 6px no-repeat, white; border-radius: 20px; background-clip: padding-box, border-box;">
                        <img src="${icon}" alt="icon" class="mx-auto h-[83px] w-[83px]" />
                        <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">${title}</h2>
                        <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">${message}</p>
                        <div class="mt-3 lg:mt-6 flex justify-center">
                            <button onclick="this.closest('.fixed').remove()" class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-8 lg:px-10 py-2 font-medium text-white">OK</button>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', alertHTML);
        }

        document.addEventListener('DOMContentLoaded', function() {
            // === DROPDOWN EDUCATION ONLY ===
            const educationToggle = document.getElementById('educationToggle');
            const educationDropdown = document.getElementById('educationDropdown');
            const educationIcon = document.getElementById('educationIcon');
            const educationRadios = document.querySelectorAll('input[name="last_education"]');
            const educationSelected = document.getElementById('educationSelected');

            educationToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                educationDropdown.classList.toggle('hidden');
                educationIcon.classList.toggle('rotate-180');
            });

            educationRadios.forEach((radio) => {
                radio.addEventListener('change', function() {
                    educationSelected.textContent = this.value;

                    educationSelected.classList.remove('text-gray-500');
                    educationSelected.classList.add('text-black');

                    educationDropdown.classList.add('hidden');
                    educationIcon.classList.remove('rotate-180');
                });
            });

            // File upload display
            document.getElementById('bukti_transfer').addEventListener('change', function(e) {
                const fileNameSpan = document.getElementById('fileName');
                fileNameSpan.textContent = this.files && this.files.length > 0 ? this.files[0].name : '';
            });

            // Sumber informasi "Other"
            document.getElementById('sumber').addEventListener('change', function() {
                const otherReasonText = document.getElementById('otherReasonText');
                if (this.value === 'Other') {
                    otherReasonText.classList.remove('hidden');
                    otherReasonText.required = true;
                } else {
                    otherReasonText.classList.add('hidden');
                    otherReasonText.required = false;
                    otherReasonText.value = '';
                }
            });

            // Modal Konfirmasi Batal
            const cancelButton = document.getElementById('cancelButton');
            const confirmModal = document.getElementById('confirmModal');
            const cancelSubmit = document.getElementById('cancelSubmit');
            const confirmAction = document.getElementById('confirmAction');
            let modalMode = 'cancel'; // 'cancel' atau 'submit'

            cancelButton.addEventListener('click', function(e) {
                e.preventDefault();
                modalMode = 'cancel';
                const h2 = confirmModal.querySelector('h2');
                const p = confirmModal.querySelector('p');
                h2.textContent = 'Konfirmasi Batal';
                p.textContent = 'Apakah Anda yakin ingin membatalkan pengisian data?';
                confirmModal.classList.remove('hidden');
            });

            cancelSubmit.addEventListener('click', function() {
                confirmModal.classList.add('hidden');
            });

            confirmAction.addEventListener('click', function() {
                if (modalMode === 'cancel') {
                    // Redirect ke halaman index
                    window.location.href = "{{ route('dashboard.pendaftar.index') }}";
                } else if (modalMode === 'submit') {
                    // Submit form
                    document.getElementById('berbinarForm').submit();
                }
            });

            // Fungsi untuk modal konfirmasi sebelum submit
            window.showConfirmModal = function() {
                modalMode = 'submit';
                const h2 = confirmModal.querySelector('h2');
                const p = confirmModal.querySelector('p');
                h2.textContent = 'Konfirmasi!';
                p.textContent = 'Tolong pastikan bahwa informasi yang Anda masukkan telah tepat.';
                confirmModal.classList.remove('hidden');
            };

            // Custom Alert untuk validasi
            const submitButton = document.getElementById('submitButton');
            const form = document.getElementById('berbinarForm');

            submitButton.addEventListener('click', function(e) {
                e.preventDefault();
                if (validateForm()) {
                    // Tampilkan modal konfirmasi sebelum submit
                    showConfirmModal();
                }
            });

            function getFieldLabel(fieldName) {
                const field = document.querySelector(`[name="${fieldName}"]`);
                if (field) {
                    const container = field.closest('div');
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

            function validateForm() {
                const requiredFields = [
                    'first_name', 'last_name', 'gender', 'age', 'phone_number', 'email',
                    'last_education', 'course_id', 'service_package', 'price_package', 'bukti_transfer',
                    'referral_source'
                ];
                // Jika pendidikan Other, wajib other_education
                const lastEducation = document.querySelector('input[name="last_education"]:checked');

                // Sumber info Other
                const knowingSource = document.getElementById('sumber').value;
                if (knowingSource === 'Other') {
                    requiredFields.push('otherReasonText');
                }
                for (let fieldName of requiredFields) {
                    let field;
                    if (fieldName === 'gender') {
                        field = document.getElementById('gender');
                    } else if (fieldName === 'last_education') {
                        field = document.querySelector('input[name="last_education"]:checked');
                    } else if (fieldName === 'bukti_transfer') {
                        field = document.getElementById('bukti_transfer');
                        if (!field || !field.files || field.files.length === 0) {
                            showCustomAlertError(
                                '"Bukti Pembayaran" belum diisi.',
                                'Validasi Error',
                                "{{ asset('assets/images/landing/favicion/error.webp') }}"
                            );
                            return false;
                        }
                        // Validasi ukuran file (max 1 MB)
                        if (field.files[0].size > 1048576) {
                            showCustomAlertError(
                                'Ukuran file bukti pembayaran tidak boleh lebih dari 1 MB.',
                                'Validasi Error',
                                "{{ asset('assets/images/landing/favicion/error.webp') }}"
                            );
                            return false;
                        }
                        continue;
                    } else {
                        field = document.querySelector(`[name="${fieldName}"]`);
                    }
                    if (!field || (field.value !== undefined && field.value.trim() === '')) {
                        showCustomAlertError(
                            '"' + getFieldLabel(fieldName) + '" belum diisi.',
                            'Validasi Error',
                            "{{ asset('assets/images/landing/favicion/error.webp') }}"
                        );
                        return false;
                    }
                    if (fieldName === 'email' && !isValidEmail(field.value)) {
                        showCustomAlertError(
                            'Format Email tidak valid.',
                            'Validasi Error',
                            "{{ asset('assets/images/landing/favicion/error.webp') }}"
                        );
                        return false;
                    }
                    if (fieldName === 'phone_number' && !isValidPhoneNumber(field.value)) {
                        showCustomAlertError(
                            'Format Nomor Whatsapp tidak valid.',
                            'Validasi Error',
                            "{{ asset('assets/images/landing/favicion/error.webp') }}"
                        );
                        return false;
                    }
                }
                return true;
            }

            // Paket layanan dan harga otomatis
            const paketSelect = document.getElementById('paket');
            const hargaInput = document.getElementById('harga_paket');
            paketSelect.addEventListener('change', function() {
                const selected = this.options[this.selectedIndex];
                let harga = selected.getAttribute('data-harga') || '';
                if (harga) {
                    if (harga.includes('-')) {
                        // Range harga
                        const [min, max] = harga.split('-');
                        harga = 'Rp' + min.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' - Rp' + max.replace(
                            /\B(?=(\d{3})+(?!\d))/g, '.');
                    } else {
                        harga = 'Rp' + harga.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                    }
                }
                hargaInput.value = harga;
            });
        });
    </script>
    @if ($errors->any())
        <script>
            function showCustomAlertError(message, title = "Error", icon = "{{ asset('assets/images/landing/favicion/error.webp') }}") {
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

            document.addEventListener('DOMContentLoaded', function() {
                @foreach ($errors->all() as $error)
                    showCustomAlertError('{{ $error }}', 'Error', "{{ asset('assets/images/landing/favicion/error.webp') }}");
                @endforeach
            });
        </script>
    @endif
@endsection
