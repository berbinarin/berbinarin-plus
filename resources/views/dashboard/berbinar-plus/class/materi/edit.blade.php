@extends('dashboard.layouts.app', [
    'title' => 'Ubah Data Berbinar Plus Class',
])

@section('content')
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="py-4 md:pb-7 md:pt-12">
                <div class="mb-2 flex items-center gap-2">
                    <a href="{{ route('dashboard.kelas.materi.index', ['class' => $classId]) }}">
                        <img src="{{ asset('assets/images/dashboard/svg-icon/dashboard-back.webp') }}" alt="Back Btn" />
                    </a>
                    <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">Ubah Data
                        Materi</p>
                </div>
                <p class="w-full text-disabled">Formulir untuk mengubah data materi Berbinar+.</p>
            </div>
            <div class="rounded-lg bg-white px-4 py-4 shadow-md md:px-8 md:py-7 xl:px-10 mb-7">
                <form action="{{ route('dashboard.kelas.materi.update', $material->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h1 class="mb-6 text-center text-3xl font-bold">Ubah Materi Berbinar+</h1>
                    <div class="flex flex-col gap-3">
                        <div>
                            <label class="text-lg">Judul Materi</label>
                            <input type="text" name="title" placeholder="Masukkan nama materi"
                                class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-2 shadow-sm mb-1"
                                value="{{ old('title', $material->title) }}" required />
                        </div>
                        <div>
                            <label class="text-lg">Link Video</label>
                            <input type="text" name="video_url" placeholder="Masukkan link video"
                                class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-2 shadow-sm mb-1"
                                value="{{ old('video_url', $material->video_url) }}" />
                        </div>
                        <div>
                            <label class="text-lg">Deskripsi Materi</label>
                            <input type="text" name="description" placeholder="Berikan Deskripsi Mengenai Materi"
                                class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-2 shadow-sm mb-1"
                                value="{{ old('description', $material->description) }}" />
                        </div>
                        <div>
                            <label class="text-lg">Urutan Materi</label>
                            <input type="number" name="order_key" placeholder="1" min="1"
                                class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-2 shadow-sm mb-1"
                                value="{{ old('order_key', $material->order_key) }}" required />
                        </div>
                    </div>

                    <div class="mt-8 flex flex-row-reverse border-t border-gray-600 gap-4 pt-9">
                        <button type="submit" class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg"
                            style="background: #3986a3; color: #fff">Simpan</button>
                        <button type="button" id="cancelButton"
                            class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg"
                            style="border: 2px solid #3986a3; color: #3986a3">Batal</button>
                    </div>

                    <!-- Modal Konfirmasi Batal -->
                    <div id="confirmModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
                        <div class="relative w-[360px] md:w-[560px] rounded-[20px] bg-white p-6 text-center font-plusJakartaSans shadow-lg"
                            style=" background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px; background-clip: padding-box, border-box;">
                            <!-- Warning Icon -->
                            <img src="{{ asset('assets/images/dashboard/warning.webp') }}" alt="Warning Icon"
                                class="mx-auto h-[83px] w-[83px]" />

                            <!-- Title -->
                            <h2 class="mt-4 text-2xl font-bold text-stone-900">Konfirmasi Batal</h2>

                            <!-- Message -->
                            <p class="mt-2 text-base font-medium text-black">Apakah Anda yakin ingin membatalkan pengisian
                                data?</p>

                            <!-- Actions -->
                            <div class="mt-6 flex justify-center gap-3">
                                <button type="button" id="cancelSubmit"
                                    class="rounded-lg border border-stone-300 px-6 py-2 text-stone-700">Tidak</button>
                                <a href="{{ route('dashboard.kelas.materi.index', ['class' => $classId]) }}"
                                    class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-6 py-2 font-medium text-white">Ya</a>
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
        document.addEventListener("DOMContentLoaded", function() {
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

            // Thumbnail preview
            const thumbnailInput = document.getElementById('thumbnailInput');
            const thumbnailPreview = document.getElementById('thumbnailPreview');
            thumbnailInput.addEventListener('change', function(e) {
                const [file] = thumbnailInput.files;
                if (file) {
                    thumbnailPreview.src = URL.createObjectURL(file);
                    thumbnailPreview.classList.remove('hidden');
                }
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
