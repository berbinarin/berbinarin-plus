@extends('landing.layouts.test-questions', [
    'title' => 'Pretest Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('content')
    <div class="mt-20 lg:mt-10">
        <!-- Breadcrumb -->
        <nav class="text-gray-500 max-sm:text-sm text-lg" aria-label="Breadcrumb">
            <a href="{{ route('homepage.index') }}" class="hover:text-gray-900 transition-colors">BERBINAR+</a>
            <span>/</span>
            <a href="#" class="hover:text-gray-900 transition-colors">Graphic Design</a>
            <span>/</span>
            <a href="#" class="hover:text-gray-900 transition-colors">Pre Test</a>
            <span>/</span>
            <a href="#" class="text-black">Pre Test - Graphic Design</a>
        </nav>

        <!-- Judul -->
        <div class="mt-4 mb-6 lg:mt-6 flex flex-row">
            <h1 class="text-xl lg:text-3xl font-semibold">Pre Test - Graphic Design</h1>
        </div>

        <!-- Pertanyaan -->
        <h3 class="text-xl font-semibold mb-6">Pertanyaan 2</h3>

        <!-- Wrapper -->
        <div class="w-full">
            <!-- Card pertanyaan -->
            <div class="bg-white rounded-[18px] ring-1 ring-[#2986A3] flex flex-col lg:flex-row-reverse justify-between items-center gap-8 px-4 py-6 lg:px-12 lg:py-8">
                <!-- <div class="flex justify-center items-center">
                    <img src="" alt="Desain Komposisi" class="w-auto lg:w-60 lg:h-60 object-cover rounded-[10px]">
                </div> -->

                <div class="flex-1">
                    <p class="text-base lg:text-xl font-medium mb-7">Seorang desainer membuat poster dengan warna merah mencolok, judul besar di atas, dan ruang kosong di sekitar teks agar lebih jelas. Prinsip desain apa yang digunakan?</p>

                    <form class="flex flex-col gap-3">
                        <label class="flex items-start gap-3 lg:gap-5 text-base lg:text-xl">
                            <input type="radio" name="answer" value="Negative Space" class="min-w-5 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                            Kontras, Hierarki, Negative Space
                        </label>
                        <label class="flex items-start gap-3 lg:gap-5 text-base lg:text-xl">
                            <input type="radio" name="answer" value="Hierarchy" class="min-w-5 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                            Repetisi, Balance, Pattern
                        </label>
                        <label class="flex items-start gap-3 lg:gap-5 text-base lg:text-xl">
                            <input type="radio" name="answer" value="Pattern" class="min-w-5 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                            Alignment, Gerakan Visual, Proximity
                        </label>
                        <label class="flex items-start gap-3 lg:gap-5 text-base lg:text-xl">
                            <input type="radio" name="answer" value="White Space" class="min-w-5 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                            Simetri, Tekstur, Repetition
                        </label>
                    </form>
                </div>

            </div>

            <!-- Tombol navigasi -->
            <div class="flex w-full justify-between items-center gap-4 mt-8 text-center font-medium text-base lg:text-xl mx-auto">
                <a href="{{ route('pretest.question') }}" class="max-sm:w-1/2 py-2 px-[18px] bg-white ring-1 ring-[#3986A3] rounded-lg">Sebelumnya</a>
                <button type="button" id="showModal" class="max-sm:w-1/2 py-2 px-[18px] bg-[#3986A3] rounded-lg text-white">Selesai</button>
            </div>
        </div>

    </div>


<!-- Modal Selesai Pretest -->
<div id="confirmModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
    <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg" style="background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px;background-clip: padding-box, border-box;">
        <!-- Warning Icon -->
        <img src="{{ asset('assets/images/dashboard/warning.webp') }}" alt="Warning Icon" class="mx-auto h-[83px] w-[83px]" />

        <!-- Title -->
        <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">Konfirmasi!</h2>

        <!-- Message -->
        <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">Yakin ingin menyelesaikan? Jawaban tidak bisa diubah setelah ini.</p>

        <!-- Actions -->
        <div class="mt-3 lg:mt-6 flex justify-center gap-3">
            <button type="button" id="cancelModal" class="w-1/3 rounded-lg border border-primary px-3 lg:px-6 py-2 text-stone-700">Kembali</button>
            <a href="{{ route('pretest.index-finished') }}" class="w-1/3 rounded-lg bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-3 lg:px-6 py-2 font-medium text-white">Ok</a>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const showModals = document.querySelectorAll('[id="showModal"]');
    const confirmModal = document.getElementById('confirmModal');
    const cancelModal = document.getElementById('cancelModal');

    if (showModals.length) {
        showModals.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                if (confirmModal) confirmModal.classList.remove('hidden');
            });
        });
    }

    if (cancelModal) {
        cancelModal.addEventListener('click', function () {
            if (confirmModal) confirmModal.classList.add('hidden');
        });
    }
});
</script>
@endsection
