@extends('dashboard.layouts.app', [
    'title' => 'Detail Berbinar Plus Class',
])

@section('content')
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="py-4 md:pb-7 md:pt-12">
                <div class="mb-2 flex items-center gap-2">
                    <a href="{{ route('dashboard.kelas.index') }}">
                        <img src="{{ asset('assets/images/dashboard/svg-icon/dashboard-back.webp') }}" alt="Back Btn" />
                    </a>
                    <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">
                        Detail Daftar Kelas
                    </p>
                </div>
                <p class="w-full text-disabled">
                    Halaman ini menampilkan informasi detail mengenai data Kelas yang terdapat pada Berbinar+. Admin dapat
                    melihat Informasi lengkap seputar nama, kategori, instruktur, dan thumbnail kelas.
                </p>
            </div>
            <div class="rounded-lg bg-white px-4 py-4 shadow-md md:px-8 md:py-7 xl:px-10 mb-7">

                <div class="mb-6">
                    <h1 class="mb-2 text-2xl text-primary-alt font-bold">Nama Kelas</h1>
                    <p class="font-semibold text-lg">{{ $class->name }}</p>
                </div>

                <div class="mb-6">
                    <h1 class="mb-2 text-2xl text-primary-alt font-bold">Kategori</h1>
                    <p class="font-semibold text-lg">{{ $class->category }}</p>
                </div>

                <div class="mb-6">
                    <h1 class="mb-2 text-2xl text-primary-alt font-bold">Nama</h1>
                    <p class="font-semibold text-lg mb-1">{{ $class->instructor_name }}</p>
                </div>

                <div class="mb-6">
                    <h1 class="mb-2 text-2xl text-primary-alt font-bold">Jabatan</h1>
                    <p class="font-semibold text-lg mb-1">{{ $class->instructor_title }}</p>
                </div>

                <div class="mb-6">
                    <h1 class="mb-2 text-2xl text-primary-alt font-bold">Thumbnail</h1>
                    @if ($class->thumbnail)
                        <img src="{{ asset('uploads/thumbnails/' . $class->thumbnail) }}" alt="Thumbnail"
                            class="h-40 rounded border" />
                    @else
                        <p class="text-gray-400">Tidak ada thumbnail</p>
                    @endif
                </div>

                <div class="mb-6">
                    <h1 class="mb-2 text-2xl text-primary-alt font-bold">Deskripsi Kelas</h1>
                    <p class="font-semibold text-lg mb-1">{{ $class->description }}</p>
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
