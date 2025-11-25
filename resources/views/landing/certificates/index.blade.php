@extends('landing.layouts.certificates',[
'title' => 'Sertifikat Berbinar+',
'active' => 'Berbinar+',
'page' => 'Berbinar+',
])

@section('content')

    <div class="mt-20 lg:mt-10">
        <div class="w-full flex flex-col">
            <nav class="text-gray-500 max-sm:text-sm text-lg" aria-label="Breadcrumb">
                <a href="{{ route('homepage.index') }}" class="hover:text-gray-900 transition-colors">BERBINAR+</a>
                <span>/</span>
                <a href="" class="hover:text-gray-900 transition-colors">Graphic Design</a>
                <span>/</span>
                <a href="" class="hover:text-gray-900 transition-colors">Sertifikat</a>
                <span>/</span>
                <a href="" class="hover:text-gray-900 transition-colors"><span class="text-black">Download Sertifikat</span></a>
            </nav>

            <h1 class="mt-4 lg:mt-6 text-xl lg:text-3xl font-semibold">Unduh Sertifikat</h1>

            <div class="bg-white w-full mt-5 lg:mt-10 rounded-2xl p-5 lg:p-8">
                <h2 class="mb-4 font-medium lg:text-xl">Selamat, Tiarasyifa Arsanda!</h2>

                <p class="mb-4 lg:mb-6 font-medium lg:text-lg">Kamu telah berhasil menyelesaikan kelas Graphic Design dengan baik. Teruslah belajar dan kembangkan kemampuanmu. Saatnya merayakan pencapaianmu dengan mengunduh sertifikat resmi dari BERBINAR+</p>


                <button type="button" id="showModalCertificateLocked" class="bg-primary text-white py-2 px-4 lg:py-1 rounded-lg text-lg lg:text-xl flex flex-row gap-2"><i class="bx bx-download text-white text-xl lg:text-2xl align-text-bottom"></i><p class="">Sertifikat</p></button>
            </div>
        </div>
    </div>

{{-- Catatan: Ini ada dua versi untuk modal sertifikat tergantung materinya sudah dikerjakan semua atau belum --}}

<!-- Modal Sertifikat Diproses -->
<div id="confirmModalCertificateOpen" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
    <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg" style="background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px;background-clip: padding-box, border-box;">
        <!-- Error Icon -->
        <img src="{{ asset('assets/images/dashboard/warning.webp') }}" alt="Error Icon" class="mx-auto h-[83px] w-[83px]" />

        <!-- Title -->
        <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">Sertifikat dalam proses verifikasi!</h2>

        <!-- Message -->
        <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">Kamu sudah menyelesaikan semua materi dan post-test, tunggu sebentar hingga hasilmu dinilai sebelum sertifikat tersedia.</p>

        <!-- Actions -->
        <div class="mt-3 lg:mt-6 flex justify-center gap-3">
            <button type="button" id="cancelModalCertificateOpen" class="w-1/3 rounded-lg bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-3 lg:px-6 py-2 font-medium text-white">Ok</button>
        </div>
    </div>
</div>

<!-- Modal Sertifikat Dikunci -->
<div id="confirmModalCertificateLocked" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
    <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg" style="background: linear-gradient(to right, #BD7979, #BD7979) top/100% 6px no-repeat, white; border-radius: 20px;background-clip: padding-box, border-box;">
        <!-- Error Icon -->
        <img src="{{ asset('assets/images/dashboard/error.webp') }}" alt="Error Icon" class="mx-auto h-[83px] w-[83px]" />

        <!-- Title -->
        <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">Oops, sertifikatmu belum bisa diunduh!</h2>

        <!-- Message -->
        <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">Pastikan semua materi dan post-test sudah selesai dulu ya.</p>

        <!-- Actions -->
        <div class="mt-3 lg:mt-6 flex justify-center gap-3">
            <button type="button" id="cancelModalCertificateLocked" class="w-1/3 rounded-lg bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-3 lg:px-6 py-2 font-medium text-white">Ok</button>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const showModalsCertificateOpen = document.querySelectorAll('[id="showModalCertificateOpen"]');
    const confirmModalCertificateOpen = document.getElementById('confirmModalCertificateOpen');
    const cancelModalCertificateOpen = document.getElementById('cancelModalCertificateOpen');

    if (showModalsCertificateOpen.length) {
        showModalsCertificateOpen.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                if (confirmModalCertificateOpen) confirmModalCertificateOpen.classList.remove('hidden');
            });
        });
    }

    if (cancelModalCertificateOpen) {
        cancelModalCertificateOpen.addEventListener('click', function () {
            if (confirmModalCertificateOpen) confirmModalCertificateOpen.classList.add('hidden');
        });
    }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const showModalsCertificateLocked = document.querySelectorAll('[id="showModalCertificateLocked"]');
    const confirmModalCertificateLocked = document.getElementById('confirmModalCertificateLocked');
    const cancelModalCertificateLocked = document.getElementById('cancelModalCertificateLocked');

    if (showModalsCertificateLocked.length) {
        showModalsCertificateLocked.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                if (confirmModalCertificateLocked) confirmModalCertificateLocked.classList.remove('hidden');
            });
        });
    }

    if (cancelModalCertificateLocked) {
        cancelModalCertificateLocked.addEventListener('click', function () {
            if (confirmModalCertificateLocked) confirmModalCertificateLocked.classList.add('hidden');
        });
    }
});
</script>
@endsection
