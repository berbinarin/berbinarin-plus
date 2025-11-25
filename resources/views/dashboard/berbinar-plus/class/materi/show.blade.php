@extends('dashboard.layouts.app', [
    'title' => 'Detail Berbinar Plus Class',
])

@section('content')
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="py-4 md:pb-7 md:pt-12">
                <div class="mb-2 flex items-center gap-2">
                    <a href="{{ route('dashboard.kelas.materi.index') }}">
                        <img src="{{ asset('assets/images/dashboard/svg-icon/dashboard-back.png') }}" alt="Back Btn" />
                    </a>
                    <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">
                        Detail Data Materi
                    </p>
                </div>
                <p class="w-full text-disabled">
                    Halaman ini menampilkan informasi detail mengenai data materi yang terdapat pada BERBINAR+. Admin dapat melihat Informasi lengkap seputar judul, link materi dan deskripsi Kelas.
                </p>
            </div>
            <div class="rounded-lg bg-white px-4 py-4 shadow-md md:px-8 md:py-7 xl:px-10 mb-7">

                <div class="mb-6">
                    <h1 class="mb-2 text-2xl text-primary-alt font-bold">Judul Materi</h1>
                    <p class="font-semibold text-lg">Produksi Visual</p>
                </div>

                <div class="mb-6">
                    <h1 class="mb-2 text-2xl text-primary-alt font-bold">Link Video</h1>
                    <a href="https://www.youtube.com" target="_blank" class="font-semibold text-lg text-blue-500 underline">www.youtube.com</a>
                </div>

                <div class="mb-6">
                    <h1 class="mb-2 text-2xl text-primary-alt font-bold">Deskripsi</h1>
                    <p class="font-semibold text-lg mb-1">Placeholder Deskripsi</p>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const submitButton = document.getElementById('submitButton');
            const confirmModal = document.getElementById('confirmModal');
            const confirmSubmit = document.getElementById('confirmSubmit');
            const cancelSubmit = document.getElementById('cancelSubmit');
            const form = document.querySelector('form');

            submitButton.addEventListener('click', function(e) {
                e.preventDefault();
                confirmModal.classList.remove('hidden');
            });
            cancelSubmit.addEventListener('click', function() {
                confirmModal.classList.add('hidden');
            });

            confirmSubmit.addEventListener('click', function() {
                form.submit();
            });

        });


        const input = document.getElementById('title');
        const labelNama = document.getElementById('label-nama');

        function toggleLabelNama() {
            if (input.value.trim() !== '') {
                labelNama.classList.add('hidden');
            } else {
                labelNama.classList.remove('hidden');
            }
        }

        input.addEventListener('input', toggleLabelNama);
        window.addEventListener('load', toggleLabelNama);


        const textarea = document.getElementById('description');
        const labelDeskripsi = document.getElementById('label-deskripsi');

        function toggleLabelDeskripsi() {
            if (textarea.value.trim() !== '') {
                labelDeskripsi.classList.add('hidden');
            } else {
                labelDeskripsi.classList.remove('hidden');
            }
        }

        textarea.addEventListener('input', toggleLabelDeskripsi);
        window.addEventListener('load', toggleLabelDeskripsi);
    </script>
@endsection
