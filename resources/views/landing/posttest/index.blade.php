@extends('landing.layouts.test',[
'title' => 'Post Test Berbinar+',
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
            <a href=""><span class="text-black">Post Test - Graphic Design</span></a>
        </nav>

        <h1 class="mt-4 lg:mt-6 text-xl lg:text-3xl font-semibold">Post Test - Graphic Design</h1>

        <div class="bg-white w-full mt-5 lg:mt-10 rounded-2xl p-5 lg:p-8">
            <h2 class="mb-6 font-medium text-lg lg:text-xl">20 Soal Terlampir</h2>

            <button type="button" id="showModal" class="bg-primary text-white py-1 px-4 lg:py-1 rounded-lg text-lg lg:text-xl gap-2">Mulai Post Test</button>
        </div>
    </div>
</div>

<!-- Modal Mulai Posttest -->
<div id="confirmModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
    <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg" style="background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px;background-clip: padding-box, border-box;">
        <!-- Warning Icon -->
        <img src="{{ asset('assets/images/dashboard/warning.webp') }}" alt="Warning Icon" class="mx-auto h-[83px] w-[83px]" />

        <!-- Title -->
        <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">Mulai Post Test!</h2>

        <!-- Message -->
        <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">Siap mulai? Pre test ini akan mengukur pemahaman awalmu sebelum lanjut ke materi.</p>

        <!-- Actions -->
        <div class="mt-3 lg:mt-6 flex justify-center gap-3">
            <button type="button" id="cancelModal" class="w-1/3 rounded-lg border border-primary px-3 lg:px-6 py-2 text-stone-700">Kembali</button>
            <a href="{{ route('posttest.question') }}" class="w-1/3 rounded-lg bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-3 lg:px-6 py-2 font-medium text-white">Ok</a>
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
