@extends('landing.layouts.certificates', [
    'title' => 'Sertifikat Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('content')
    <div class="mt-20 lg:mt-10">
        <div class="w-full flex flex-col">
            <nav class="text-gray-500 max-sm:text-sm text-lg" aria-label="Breadcrumb">
                <a href="{{ route('landing.home.index') }}" class="hover:text-gray-900 transition-colors">BERBINAR+</a>
                <span>/</span>
                <a href="{{ route('landing.home.preview', ['class_id' => $class->id ?? 1]) }}"
                    class="hover:text-gray-900 transition-colors">{{ $class->name ?? '-' }}</a>
                <span>/</span>
                <a href="{{ route('landing.home.certificates', ['class_id' => $class->id ?? 1]) }}"
                    class="hover:text-gray-900 transition-colors">Sertifikat</a>
                <span>/</span>
                <span class="text-black">Download Sertifikat</span>
            </nav>

            <h1 class="mt-4 lg:mt-6 text-xl lg:text-3xl font-semibold">Unduh Sertifikat</h1>

            <div class="bg-white w-full mt-5 lg:mt-10 rounded-2xl p-5 lg:p-8">
                <h2 class="mb-4 font-medium lg:text-xl">Selamat, {{ $userName }}!</h2>

                <p class="mb-4 lg:mb-6 font-medium lg:text-lg">Kamu telah berhasil menyelesaikan kelas
                    {{ $class->name ?? '-' }} dengan
                    baik. Teruslah belajar dan kembangkan kemampuanmu. Saatnya merayakan pencapaianmu dengan mengunduh
                    sertifikat resmi dari BERBINAR+</p>

                @php
                    // Cek apakah data sertifikat tersedia
                    $hasCertificate = false;
                    if (isset($class) && isset($class->id) && auth('berbinar')->check()) {
                        $userId = auth('berbinar')->id();
                        $certificate = \App\Models\Certificates::where('course_id', $class->id)
                            ->where('user_id', $userId)
                            ->first();
                        $hasCertificate =
                            $certificate &&
                            $certificate->certificate_file &&
                            file_exists(public_path('storage/' . $certificate->certificate_file));
                    }
                @endphp

                @if ($hasCertificate)
                    <button type="button" id="showModalRateClass"
                        class="bg-primary text-white py-2 px-4 lg:py-1 rounded-lg text-lg lg:text-xl flex flex-row gap-2"><i
                            class="bx bx-download text-white text-xl lg:text-2xl align-text-bottom"></i>
                        <p class="">Sertifikat</p>
                    </button>
                @endif
            </div>
        </div>
    </div>

    {{-- Catatan: Ini ada dua versi untuk modal sertifikat tergantung materinya sudah dikerjakan semua atau belum --}}

    <!-- Modal Sertifikat Diproses -->
    <div id="confirmModalCertificateOpen" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
        <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg"
            style="background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px;background-clip: padding-box, border-box;">
            <!-- Error Icon -->
            <img src="{{ asset('assets/images/dashboard/warning.webp') }}" alt="Error Icon"
                class="mx-auto h-[83px] w-[83px]" />

            <!-- Title -->
            <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">Sertifikat dalam proses verifikasi!</h2>

            <!-- Message -->
            <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">Kamu sudah menyelesaikan semua materi dan
                post-test, tunggu sebentar hingga hasilmu dinilai sebelum sertifikat tersedia.</p>

            <!-- Actions -->
            <div class="mt-3 lg:mt-6 flex justify-center gap-3">
                <button type="button" id="cancelModalCertificateOpen"
                    class="w-1/3 rounded-lg bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-3 lg:px-6 py-2 font-medium text-white">Ok</button>
            </div>
        </div>
    </div>

    <!-- Modal Sertifikat Dikunci -->
    <div id="confirmModalCertificateLocked" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
        <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg"
            style="background: linear-gradient(to right, #BD7979, #BD7979) top/100% 6px no-repeat, white; border-radius: 20px;background-clip: padding-box, border-box;">
            <!-- Error Icon -->
            <img src="{{ asset('assets/images/dashboard/error.webp') }}" alt="Error Icon"
                class="mx-auto h-[83px] w-[83px]" />

            <!-- Title -->
            <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">Oops, sertifikatmu belum bisa diunduh!
            </h2>

            <!-- Message -->
            <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">Pastikan semua materi dan post-test sudah
                selesai dulu ya.</p>

            <!-- Actions -->
            <div class="mt-3 lg:mt-6 flex justify-center gap-3">
                <button type="button" id="cancelModalCertificateLocked"
                    class="w-1/3 rounded-lg bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-3 lg:px-6 py-2 font-medium text-white">Ok</button>
            </div>
        </div>
    </div>

    @if ($hasCertificate)
        <!-- Modal Sertifikat Rating -->
        <div id="confirmModalRateClass" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
            <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg"
                style="background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px;background-clip: padding-box, border-box;">
                <div
                    class="rating_list z-0 relative flex lg:w-[90%] flex-row mb-1 lg:mb-12 justify-self-center justify-between md:gap-4">
                    @for ($i = 1; $i <= 5; $i++)
                        <div class="rating_item flex flex-col items-center">
                            <input class="hidden peer" id="rating-{{ $i }}-1" type="radio"
                                value="{{ $i }}" name="rating" @if (isset($class->rating) && (int) $class->rating === $i) checked @endif>
                            <label for="rating-{{ $i }}-1"
                                class="cursor-pointer transition-all duration-300 ease-in-out peer-checked:bg-gradient-to-b hover:scale-105 peer-checked:scale-110
                                    @if ($i == 1) from-[#FF004F] to-[#F7B23B]
                                    @elseif ($i == 2) from-[#FF543E] to-[#F7B23B]
                                    @elseif ($i == 3) from-[#FFE500] to-[#F7B23B]
                                    @elseif ($i == 4) from-[#4CAF50] to-[#F7B23B]
                                    @else from-[#75BADB] to-[#F7B23B] @endif
                                    rounded-full group hover:bg-gradient-to-b relative w-16 h-16 flex items-center justify-center">
                                <span class="block w-full h-full relative">
                                    <img src="{{ asset('assets/images/landing/feedback/' . (6 - $i) . '-' . ['pissed', 'bummed', 'neutral', 'happy', 'wahoo'][$i - 1] . '.webp') }}"
                                        alt=""
                                        class="absolute inset-0 w-full h-full object-contain transition duration-200 scale-150" />
                                    <div
                                        class="text block pt-12 inset-8 max-sm:pb-[4px] w-full shadow-yellow-400/50 h-full justify-center items-end max-sm:items-center">
                                        <p
                                            class="bg-white max-sm:px-0 px-2 max-sm:w-[80%] justify-self-center text-center max-sm:text-[7px] text-xs md:text-[10px] xl:text-[12px] rounded-3xl max-sm:py-[1px] py-1 shadow-md shadow-yellow-400/50 font-bold text-[#F7B23B]">
                                            @if ($i == 1)
                                                Tidak Suka
                                            @elseif ($i == 2)
                                                Agak Bosan
                                            @elseif ($i == 3)
                                                Biasa Saja
                                            @elseif ($i == 4)
                                                Cukup Senang
                                            @else
                                                Sangat Senang
                                            @endif
                                        </p>
                                    </div>
                                </span>
                            </label>
                        </div>
                    @endfor
                </div>
                <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">Beri Penilaian untuk Kelas Ini</h2>
                <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">Pendapatmu sangat berarti untuk membantu
                    kami meningkatkan kualitas pembelajaran.</p>
                <div class="mt-3 lg:mt-6 flex justify-center gap-3">
                    <button type="button" id="cancelModalRateClass"
                        class="w-1/3 rounded-lg bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-3 lg:px-6 py-2 font-medium text-white"
                        data-certificate-url="{{ isset($class) ? route('landing.home.certificates.download', ['class_id' => $class->id]) : '#' }}">Ok</button>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Jika tidak ada sertifikat, langsung tampilkan modal proses dan tutup halaman setelah 2 detik
            var hasCertificate = @json($hasCertificate);
            if (!hasCertificate) {
                var modal = document.getElementById('confirmModalCertificateOpen');
                if (modal) {
                    modal.classList.remove('hidden');
                    setTimeout(function() {
                        window.close();
                    }, 2000);
                }
            }
        });
        document.addEventListener("DOMContentLoaded", function() {
            // Download certificate when OK is clicked in rating modal
            var hasCertificate = @json($hasCertificate);
            if (hasCertificate) {
                const okBtn = document.getElementById('cancelModalRateClass');
                const confirmModalCertificateOpen = document.getElementById('confirmModalCertificateOpen');
                if (okBtn) {
                    okBtn.addEventListener('click', function() {
                        const certUrl = okBtn.getAttribute('data-certificate-url');
                        if (certUrl && certUrl !== '#') {
                            // Use AJAX to check if certificate is available
                            fetch(certUrl, {
                                    method: 'GET',
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest',
                                        'Accept': 'application/json',
                                    },
                                })
                                .then(async response => {
                                    if (response.ok) {
                                        const data = await response.json();
                                        if (data.success && data.download_url) {
                                            window.open(data.download_url, '_blank');
                                        } else {
                                            if (confirmModalCertificateOpen)
                                                confirmModalCertificateOpen.classList.remove(
                                                    'hidden');
                                        }
                                    } else {
                                        // If not found, show modal
                                        if (confirmModalCertificateOpen) confirmModalCertificateOpen
                                            .classList.remove('hidden');
                                    }
                                })
                                .catch(() => {
                                    if (confirmModalCertificateOpen) confirmModalCertificateOpen
                                        .classList
                                        .remove('hidden');
                                });
                        }
                    });
                }
            }
        });
        document.addEventListener("DOMContentLoaded", function() {
            const showModalsCertificateOpen = document.querySelectorAll('[id="showModalCertificateOpen"]');
            const confirmModalCertificateOpen = document.getElementById('confirmModalCertificateOpen');
            const cancelModalCertificateOpen = document.getElementById('cancelModalCertificateOpen');

            if (showModalsCertificateOpen.length) {
                showModalsCertificateOpen.forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        if (confirmModalCertificateOpen) confirmModalCertificateOpen.classList
                            .remove('hidden');
                    });
                });
            }

            if (cancelModalCertificateOpen) {
                cancelModalCertificateOpen.addEventListener('click', function() {
                    if (confirmModalCertificateOpen) confirmModalCertificateOpen.classList.add('hidden');
                });
            }

            // AJAX rating
            const ratingModal = document.getElementById('confirmModalRateClass');
            if (ratingModal) {
                const ratingInputs = ratingModal.querySelectorAll('input[name="rating"]');
                let selectedRating = null;
                ratingInputs.forEach(input => {
                    input.addEventListener('change', function() {
                        selectedRating = this.value;
                        fetch("{{ route('landing.home.certificates.updateRating') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute('content'),
                                    'Accept': 'application/json',
                                },
                                body: JSON.stringify({
                                    class_id: {{ $class->id ?? 'null' }},
                                    rating: selectedRating
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                // Jika sukses, tidak perlu menutup modal otomatis. User bisa menutup dengan tombol OK.
                            });
                    });
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const showModalsCertificateLocked = document.querySelectorAll('[id="showModalCertificateLocked"]');
            const confirmModalCertificateLocked = document.getElementById('confirmModalCertificateLocked');
            const cancelModalCertificateLocked = document.getElementById('cancelModalCertificateLocked');

            if (showModalsCertificateLocked.length) {
                showModalsCertificateLocked.forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        if (confirmModalCertificateLocked) confirmModalCertificateLocked.classList
                            .remove('hidden');
                    });
                });
            }

            if (cancelModalCertificateLocked) {
                cancelModalCertificateLocked.addEventListener('click', function() {
                    if (confirmModalCertificateLocked) confirmModalCertificateLocked.classList.add(
                        'hidden');
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const showModalsRateClass = document.querySelectorAll('[id="showModalRateClass"]');
            const confirmModalRateClass = document.getElementById('confirmModalRateClass');
            const cancelModalRateClass = document.getElementById('cancelModalRateClass');

            if (showModalsRateClass.length) {
                showModalsRateClass.forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        if (confirmModalRateClass) confirmModalRateClass.classList.remove('hidden');
                    });
                });
            }

            if (cancelModalRateClass) {
                cancelModalRateClass.addEventListener('click', function() {
                    if (confirmModalRateClass) confirmModalRateClass.classList.add('hidden');
                });
            }
        });
    </script>
@endsection
