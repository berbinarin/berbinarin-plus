@extends('dashboard.layouts.app', [
    'title' => 'Bebrinar Plus',
    'active' => 'Success',
    'page' => 'Success',
])

@section('content')
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="py-4 md:pb-7 md:pt-12">
                <div class="mb-2 flex items-center gap-2">
                    <a href="{{ route('dashboard.admin.class.index') }}">
                        <img src="{{ asset('assets/images/dashboard/svg/dashboard-back.png') }}" alt="Back Btn" />
                    </a>
                    <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">Tambah
                        Daftar Class</p>
                </div>
                <p class="w-full text-disabled lg:text-lg">Formulir untuk menambahkan kelas baru, beserta thumbnail, deskripsi, dan
                    silabus dinamis.</p>
            </div>
            <div class="rounded-3xl bg-white px-4 py-4 shadow-lg shadow-gray-400 md:px-8 md:py-7 xl:px-10">
                {{-- PENTING: Tambahkan enctype untuk upload file --}}
                <form action="{{ route('dashboard.admin.class.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h1 class="mb-6 text-center text-3xl font-bold">Berbinar+ <span class="italic">Class</span></h1>
                    <div class="flex flex-col gap-6">

                        {{-- Nama Class --}}
                        <div>
                            <label for="name" class="text-lg">Nama <span class="italic">Class</span></label>
                            <div class="relative w-full mt-2">
                                <input type="text" id="name" name="name" placeholder="Contoh: Product Management"
                                    class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-4 shadow-sm" required />
                            </div>
                        </div>

                        {{-- Deskripsi Class --}}
                        <div>
                            <label for="description" class="text-lg">Deskripsi <span class="italic">Class</span></label>
                            <div class="relative w-full mt-2">
                                <textarea id="description" name="description" placeholder="Deskripsi singkat mengenai kelas ini" rows="4"
                                    class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-4 shadow-sm resize-none" required></textarea>
                            </div>
                        </div>

                        {{-- (BARU) Thumbnail Class --}}
                        <div>
                            <label for="thumbnail" class="text-lg">Thumbnail <span class="italic">Class</span></label>
                            <div class="relative w-full mt-2">
                                <input type="file" id="thumbnail" name="thumbnail"
                                    class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-3 shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                    required />
                            </div>
                        </div>

                        {{-- (BARU) Silabus Dinamis --}}
                        <div>
                            <label class="text-lg">Silabus <span class="italic">Class</span></label>
                            <div id="syllabus-container" class="mt-2 flex flex-col gap-4">
                                {{-- Konten silabus akan ditambahkan oleh JavaScript di sini --}}
                            </div>
                            <button type="button" id="add-syllabus-item"
                                class="mt-4 rounded-lg bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
                                Tambah Bab (+)
                            </button>
                        </div>

                        <div class="mt-8 flex gap-4 pt-5">
                            <button type="submit" id="submitButton"
                                class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg"
                                style="width: 50%; background: #3986a3; color: #fff">Simpan</button>
                            <button type="button" id="cancelButton"
                                class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg"
                                style="width: 50%; border: 2px solid #3986a3; color: #3986a3">Batal</button>
                        </div>

                        <div id="confirmModal"
                            class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
                            <div class="w-full max-w-md rounded-lg bg-white p-6 text-center">
                                <div class="mb-4 flex justify-center">
                                    <img src="{{ asset('assets/images/dashboard/svg/warning.svg') }}" alt="Warning Icon"
                                        class="h-12 w-12" />
                                </div>
                                <p class="mb-6 text-lg">Apakah Anda yakin ingin membatalkan perubahan?</p>
                                <div class="flex w-full justify-center gap-4">
                                    <a href="{{ route('dashboard.admin.class.index') }}" id="confirmCancel"
                                        class="rounded-lg bg-[#3986A3] w-1/2 px-6 py-2 text-white text-center focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">OK</a>
                                    <button type="button" id="cancelSubmit"
                                        class="rounded-lg border border-[#3986A3] w-1/2 px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Cancel</button>
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
    {{-- Script untuk modal (tetap sama) --}}
    <script>
        const cancelButton = document.getElementById('cancelButton');
        const confirmModal = document.getElementById('confirmModal');
        const cancelSubmit = document.getElementById('cancelSubmit');
        const confirmCancel = document.getElementById('confirmCancel');

        cancelButton.onclick = function(e) {
            e.preventDefault();
            confirmModal.classList.remove('hidden');
        };

        cancelSubmit.onclick = function(e) {
            e.preventDefault();
            confirmModal.classList.add('hidden');
        };
    </script>

    {{-- (BARU) Script untuk Silabus Dinamis --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('syllabus-container');
            const addButton = document.getElementById('add-syllabus-item');
            let syllabusIndex = 0;

            // Fungsi untuk menambahkan item silabus baru
            function addSyllabusItem() {
                const newItem = document.createElement('div');
                newItem.classList.add('syllabus-item', 'p-4', 'border', 'border-gray-200', 'rounded-lg',
                    'relative');
                newItem.innerHTML = `
                    <div class="flex flex-col gap-2">
                        <div>
                            <label for="syllabus_${syllabusIndex}_title" class="text-sm font-medium text-gray-700">Judul Bab</label>
                            <input type="text" name="syllabus[${syllabusIndex}][title]" id="syllabus_${syllabusIndex}_title" placeholder="Contoh: Pengantar Sumber Daya Manusia" class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 mt-1" required>
                        </div>
                        <div>
                            <label for="syllabus_${syllabusIndex}_details" class="text-sm font-medium text-gray-700">Detail Sub Bab</label>
                            <textarea name="syllabus[${syllabusIndex}][details]" id="syllabus_${syllabusIndex}_details" placeholder="Jelaskan detail dari bab ini" rows="3" class="w-full rounded-lg border-2 border-gray-300 px-3 py-2 mt-1 resize-none" required></textarea>
                        </div>
                    </div>
                    <button type="button" class="remove-syllabus-item absolute top-2 right-2 text-red-500 hover:text-red-700 font-bold">X</button>
                `;
                container.appendChild(newItem);
                syllabusIndex++;
            }

            // Tambahkan satu item silabus saat halaman dimuat
            addSyllabusItem();

            // Event listener untuk tombol "Tambah Bab"
            addButton.addEventListener('click', addSyllabusItem);

            // Event listener untuk tombol "Hapus" (menggunakan event delegation)
            container.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-syllabus-item')) {
                    // Pastikan tidak menghapus item terakhir
                    if (container.childElementCount > 1) {
                        const itemToRemove = e.target.parentElement;
                        container.removeChild(itemToRemove);
                    } else {
                        alert('Minimal harus ada satu bab dalam silabus.');
                    }
                }
            });
        });
    </script>
@endsection
