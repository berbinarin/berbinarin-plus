@extends('dashboard.layouts.app', [
    'title' => 'Edit Data Berbinar Plus User',
])

@section('content')
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="py-4 md:pb-7 md:pt-12">
                <div class="mb-2 flex items-center gap-2">
                    <a href="{{ route('dashboard.pendaftar.index') }}">
                        <img src="{{ asset('assets/images/dashboard/svg-icon/dashboard-back.png') }}" alt="Back Btn" />
                    </a>
                    <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">Ubah Data Pendaftar</p>
                </div>
                <p class="w-full text-disabled">Formulir untuk mengubah peserta program Berbinar+ secara manual, lengkap dengan informasi pribadi, pilihan kelas, dan paket layanan yang dipilih.</p>
            </div>
            <div class="rounded-lg bg-white px-4 py-4 shadow-md md:px-8 md:py-7 xl:px-10 mb-7">
                <form id="berbinarForm" action="{{ route('dashboard.pendaftar.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="kategori" value="berbinar-for-u" />

                    <h1 class="mb-6 text-center text-3xl font-bold">Kelas Berbinar+</h1>
                    <div class="flex flex-col">
                        <div class="mb-10 grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label class="text-lg">Nama Depan</label>
                                <input type="text" id="first_name" name="first_name" placeholder="Nama Depan" class="peer w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm" required value="{{ old('first_name', $user->first_name) }}" />
                            </div>
                            <div>
                                <label class="text-lg">Nama Belakang</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Nama Belakang" class="peer w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm" required value="{{ old('last_name', $user->last_name) }}" />
                            </div>
                            <div>
                                <label class="text-lg">Jenis Kelamin</label>
                                <select id="gender" name="gender" class="peer w-full rounded-lg border border-gray-300 bg-white px-4 py-2 shadow-sm" required>
                                    <option value="" disabled {{ !$user->gender ? 'selected' : '' }}>Pilih Jenis
                                        Kelamin</option>
                                    <option value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                    </option>
                                    <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label class="text-lg">Usia</label>
                                <input type="number" id="age" name="age" placeholder="Usia Kamu Sekarang" class="peer w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm" required value="{{ old('age', $user->age) }}" />
                            </div>
                            <div>
                                <label class="text-lg">Nomor WhatsApp</label>
                                <input type="text" id="wa_number" name="phone_number" placeholder="08112345XXXX" class="peer w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm" required value="{{ old('phone_number', $user->phone_number) }}" />
                            </div>
                            <div>
                                <label class="text-lg">Email</label>
                                <input type="email" id="email" name="email" placeholder="sobatbinar@gmail.com" class="peer w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm" required value="{{ old('email', $user->email) }}" />
                            </div>
                            <div>
                                <label class="text-lg">Username</label>
                                <input type="text" id="username" name="username" placeholder="Username" class="peer w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm" required value="{{ old('username', $user->username) }}" />
                            </div>
                            <div class="relative" style="background-color: white">
                                <label class="text-lg">Pendidikan Terakhir</label>
                                <button type="button" id="educationToggle" class="flex w-full items-center justify-between rounded-lg border border-gray-300 bg-white px-4 py-2 shadow-sm focus:outline-none">
                                    <span id="educationSelected" class="{{ in_array($user->last_education, ['SD', 'SMP', 'SMA', 'Ahli Madya', 'Sarjana']) ? 'text-black' : 'text-gray-500' }}">
                                        {{ in_array($user->last_education, ['SD', 'SMP', 'SMA', 'Ahli Madya', 'Sarjana']) ? $user->last_education : ($user->last_education ? 'Other' : 'Apa Pendidikan Terakhirmu?') }}
                                    </span>
                                    <img src="{{ asset('assets/images/landing/produk/emo/chevron.png') }}" alt="" class="mr-1 w-[.9rem] transform transition-transform" id="educationIcon" />
                                </button>
                                <div class="absolute z-10 mt-2 hidden w-full rounded-md border border-gray-300 bg-white"
                                    id="educationDropdown">
                                    <div class="grid grid-cols-2 gap-4 p-2" style="background-color: white">
                                        <div>
                                            @foreach (['SD', 'SMP', 'SMA'] as $edu)
                                                <label class="mb-2 flex cursor-pointer items-center">
                                                    <input class="form-check-input mr-2" type="radio" name="last_education" value="{{ $edu }}" required
                                                        {{ $user->last_education == $edu ? 'checked' : '' }} />
                                                    {{ $edu }}
                                                </label>
                                            @endforeach
                                        </div>
                                        <div>
                                            @foreach (['Ahli Madya', 'Sarjana'] as $edu)
                                                <label class="mb-2 flex cursor-pointer items-center">
                                                    <input class="form-check-input mr-2" type="radio" name="last_education" value="{{ $edu }}" required
                                                        {{ $user->last_education == $edu ? 'checked' : '' }} />
                                                    {{ $edu }}
                                                </label>
                                            @endforeach
                                            <label class="mb-2 flex cursor-pointer items-center">
                                                <input class="form-check-input mr-2" type="radio" name="last_education" value="Other" id="otherRadio" required
                                                    {{ !in_array($user->last_education, ['SD', 'SMP', 'SMA', 'Ahli Madya', 'Sarjana']) && $user->last_education ? 'checked' : '' }} />
                                                Lainnya
                                            </label>
                                            <input type="text" class="form-input mt-1 block w-full rounded-md border border-gray-300 shadow-sm py-2" id="otherInput" name="other_education" placeholder="Isi pendidikan lain..."
                                                {{ !in_array($user->last_education, ['SD', 'SMP', 'SMA', 'Ahli Madya', 'Sarjana']) && $user->last_education ? '' : 'disabled' }}
                                                value="{{ !in_array($user->last_education, ['SD', 'SMP', 'SMA', 'Ahli Madya', 'Sarjana']) ? $user->last_education : '' }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h1 class="mb-6 text-center text-3xl font-bold">Pilih Kelas</h1>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label class="text-lg">Kelas Berbinar+</label>
                                <select id="kelas" name="class_id" class="peer w-full rounded-lg border border-gray-300 bg-white px-4 py-2 shadow-sm" required>
                                    <option value="" disabled
                                        {{ !optional($user->enrollments->first())->course_id ? 'selected' : '' }}>Pilih
                                        Kelas Berbinar+</option>
                                    @foreach ($classes as $k)
                                        <option value="{{ $k->id }}"
                                            {{ optional($user->enrollments->first())->course_id == $k->id ? 'selected' : '' }}>
                                            {{ $k->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-lg">Paket Layanan</label>
                                <select id="paket" name="service_package" class="peer w-full rounded-lg border border-gray-300 bg-white px-4 py-2 shadow-sm" required>
                                    <option value="" disabled>Pilih Paket Layanan</option>
                                    <option value="Insight" data-harga="15000"
                                        {{ optional($user->enrollments->first())->service_package == 'Insight' ? 'selected' : '' }}>
                                        Insight
                                    </option>
                                    <option value="A+ Online Weekday" data-harga="36000-120000"
                                        {{ optional($user->enrollments->first())->service_package == 'A+ Online Weekday' ? 'selected' : '' }}>
                                        A+ Online Weekday
                                    </option>
                                    <option value="A+ Online Weekend" data-harga="44000-140000"
                                        {{ optional($user->enrollments->first())->service_package == 'A+ Online Weekend' ? 'selected' : '' }}>
                                        A+ Online Weekend
                                    </option>
                                    <option value="A+ Offline Weekday" data-harga="44000-140000"
                                        {{ optional($user->enrollments->first())->service_package == 'A+ Offline Weekday' ? 'selected' : '' }}>
                                        A+ Offline Weekday
                                    </option>
                                    <option value="A+ Offline Weekend" data-harga="44000-180000"
                                        {{ optional($user->enrollments->first())->service_package == 'A+ Offline Weekend' ? 'selected' : '' }}>
                                        A+ Offline Weekend
                                    </option>
                                    <option value="Complete" data-harga="100000-280000"
                                        {{ optional($user->enrollments->first())->service_package == 'Complete' ? 'selected' : '' }}>
                                        Complete
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label class="text-lg">Harga Paket</label>
                                <input type="text" id="harga_paket" name="price_package" class="peer w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm" placeholder="Harga Paket" readonly value="{{ old('price_package', optional($user->enrollments->first())->price_package) }}" />
                            </div>
                            <div>
                                <label class="text-lg">Bukti Pembayaran</label>
                                <div class="relative flex w-full items-center overflow-x-auto">
                                    <input type="file" id="bukti_transfer" name="payment_proof_url" class="absolute inset-0 h-full w-full cursor-pointer opacity-0 py-2" accept="image/*" />
                                    <div class="pointer-events-none mt-1 block flex h-10 w-full items-center rounded-md border border-gray-100 bg-gray-100 pl-2 shadow-sm overflow-x-auto">
                                        <button type="button" class="pointer-events-none flex cursor-pointer items-center justify-between gap-2 rounded-md border border-[#B3B3B3] px-2 py-[2px]">
                                            <img src="{{ asset('assets/images/landing/produk/emo/upload-line-icon.png') }}" alt="" class="h-4 w-4" />
                                            Upload File
                                        </button>
                                        <span id="fileName" class="ml-3 truncate text-base text-gray-600 max-w-[250px]">
                                            @if (optional($user->enrollments->first())->payment_proof_url)
                                                {{ basename(optional($user->enrollments->first())->payment_proof_url) }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <small class="text-gray-500 block mt-1">
                                    <span class="text-red-500">Ukuran file maksimal 1 MB.</span>
                                </small>
                                <div id="buktiPreview" class="mt-2">
                                    @if (optional($user->enrollments->first())->payment_proof_url)
                                        <img src="{{ asset('storage/' . optional($user->enrollments->first())->payment_proof_url) }}" alt="Preview Bukti" class="max-h-40 rounded border border-gray-300" />
                                    @endif
                                </div>
                            </div>
                            <div>
                                <label class="text-lg">Darimana SobatBinar mengetahui layanan produk BERBINAR+</label>
                                <select class="form-input mt-1 block h-10 w-full rounded-md border border-gray-100 bg-gray-100 pl-2 shadow-sm py-2" id="sumber" name="referral_source" required>
                                    <option value="" disabled class="text-gray-500">Dari mana nihh</option>
                                    @php $knowing = $user->referral_source; @endphp
                                    <option value="Instagram" {{ $knowing == 'Instagram' ? 'selected' : '' }}>Instagram
                                    </option>
                                    <option value="Telegram" {{ $knowing == 'Telegram' ? 'selected' : '' }}>Telegram
                                    </option>
                                    <option value="TikTok" {{ $knowing == 'TikTok' ? 'selected' : '' }}>TikTok</option>
                                    <option value="LinkedIn" {{ $knowing == 'LinkedIn' ? 'selected' : '' }}>LinkedIn
                                    </option>
                                    <option value="Teman" {{ $knowing == 'Teman' ? 'selected' : '' }}>Teman</option>
                                    <option value="Other"
                                        {{ !in_array($knowing, ['Instagram', 'Telegram', 'TikTok', 'LinkedIn', 'Teman']) && $knowing ? 'selected' : '' }}>
                                        Other
                                    </option>
                                </select>
                                <input type="text" class="form-input mt-1 block {{ !in_array($knowing, ['Instagram', 'Telegram', 'TikTok', 'LinkedIn', 'Teman']) && $knowing ? '' : 'hidden' }} h-10 w-full rounded-md border border-gray-100 bg-gray-100 pl-2 shadow-sm py-2" id="otherReasonText" name="otherReasonText" placeholder="Please specify" value="{{ !in_array($knowing, ['Instagram', 'Telegram', 'TikTok', 'LinkedIn', 'Teman']) ? $knowing : '' }}" />
                            </div>
                        </div>

                        <div class="mt-8 flex gap-4 pt-5">
                            <a href="#" id="cancelButton" class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg" style="width: 50%; border: 2px solid #3986a3; color: #3986a3">Batal</a>
                            <button type="button" id="submitButton" class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg" style="width: 50%; background: #3986a3; color: #fff">Simpan</button>
                        </div>

                        <!-- Modal Konfirmasi Batal -->
                        <div id="confirmModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
                            <div class="relative w-[560px] rounded-[20px] bg-white p-6 text-center font-plusJakartaSans shadow-lg" style=" background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px; background-clip: padding-box, border-box;">
                                <!-- Warning Icon -->
                                <img src="{{ asset('assets/images/dashboard/warning.png') }}" alt="Warning Icon" class="mx-auto h-[83px] w-[83px]" />

                                <!-- Title -->
                                <h2 class="mt-4 text-2xl font-bold text-stone-900">Konfirmasi Batal</h2>

                                <!-- Message -->
                                <p class="mt-2 text-base font-medium text-black">Apakah Anda yakin ingin membatalkan
                                    pengisian data?</p>

                                <!-- Actions -->
                                <div class="mt-6 flex justify-center gap-3">
                                    <button type="button" id="cancelSubmit" class="rounded-lg border border-stone-300 px-6 py-2 text-stone-700">Tidak</button>
                                    <a href="{{ route('dashboard.pendaftar.index') }}" class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-6 py-2 font-medium text-white">Ya</a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // === DROPDOWN EDUCATION ONLY ===
            const educationToggle = document.getElementById('educationToggle');
            const educationDropdown = document.getElementById('educationDropdown');
            const educationIcon = document.getElementById('educationIcon');
            const educationRadios = document.querySelectorAll('input[name="last_education"]');
            const educationSelected = document.getElementById('educationSelected');
            const otherRadio = document.getElementById('otherRadio');
            const otherInput = document.getElementById('otherInput');

            educationToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                educationDropdown.classList.toggle('hidden');
                educationIcon.classList.toggle('rotate-180');
            });

            educationRadios.forEach((radio) => {
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
                        // Set value radio ke isi input jika diubah
                        otherInput.addEventListener('input', function() {
                            radio.value = this.value;
                        });
                    } else {
                        otherInput.disabled = true;
                        otherInput.required = false;
                        otherInput.value = '';
                    }
                });
            });

            otherRadio.addEventListener('change', function() {
                otherInput.disabled = !this.checked;
            });

            otherInput.disabled = true;

            // File upload display & preview
            document.getElementById('bukti_transfer').addEventListener('change', function(e) {
                const fileNameSpan = document.getElementById('fileName');
                const previewDiv = document.getElementById('buktiPreview');
                const file = this.files && this.files.length > 0 ? this.files[0] : null;
                fileNameSpan.textContent = file ? file.name : '';

                // Preview
                previewDiv.innerHTML = '';
                if (file) {
                    const ext = file.name.split('.').pop().toLowerCase();
                    if (['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'].includes(ext)) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'max-h-40 rounded border border-gray-300';
                            previewDiv.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    } else if (ext === 'pdf') {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const embed = document.createElement('embed');
                            embed.src = e.target.result;
                            embed.type = 'application/pdf';
                            embed.className = 'w-full max-h-40 border border-gray-300 rounded';
                            previewDiv.appendChild(embed);
                        };
                        reader.readAsDataURL(file);
                    } else {
                        previewDiv.textContent = 'Preview tidak tersedia untuk file ini.';
                    }
                }
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

            cancelButton.addEventListener('click', function(e) {
                e.preventDefault();
                confirmModal.classList.remove('hidden');
            });

            cancelSubmit.addEventListener('click', function() {
                confirmModal.classList.add('hidden');
            });

            // SweetAlert untuk validasi
            const submitButton = document.getElementById('submitButton');
            const form = document.getElementById('berbinarForm');

            submitButton.addEventListener('click', function(e) {
                e.preventDefault();
                let errorMessage = validateForm();
                if (errorMessage) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: errorMessage,
                        showConfirmButton: false,
                        showCloseButton: true,
                        timer: 4000,
                    });
                    return;
                }
                form.submit();
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
                    'last_education', 'class_id', 'service_package', 'price_package', 'referral_source'
                ];
                // Jika pendidikan Other, wajib other_education
                const lastEducation = document.querySelector('input[name="last_education"]:checked');
                if (lastEducation && lastEducation.value === 'Other') {
                    requiredFields.push('other_education');
                }
                // Sumber info Other
                const knowingSource = document.getElementById('sumber').value;
                if (knowingSource === 'Other') {
                    requiredFields.push('otherReasonText');
                }

                // Cek bukti_transfer hanya jika tidak ada file lama
                const buktiTransferInput = document.getElementById('bukti_transfer');
                const hasOldBukti = @json(optional(optional($user->enrollments->first())->payment_proof_url) ? true : false);
                if (!hasOldBukti) {
                    if (!buktiTransferInput || !buktiTransferInput.files || buktiTransferInput.files.length === 0) {
                        return '"Bukti Pembayaran" belum diisi.';
                    }
                }
                // ...lanjut validasi field lain...
                for (let fieldName of requiredFields) {
                    let field;
                    if (fieldName === 'gender') {
                        field = document.getElementById('gender');
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
                    if (fieldName === 'phone_number' && !isValidPhoneNumber(field.value)) {
                        return 'Format Nomor Whatsapp tidak valid.';
                    }
                }
                return null;
            }
        });
    </script>
@endsection
