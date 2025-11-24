@extends('dashboard.layouts.app', [
    'title' => 'Tambah Data Berbinar Plus Class',
])

@section('content')
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="py-4 md:pb-7 md:pt-12">
                <div class="mb-2 flex items-center gap-2">
                    <a href="{{ route('dashboard.kelas.index') }}">
                        <img src="{{ asset('assets/images/dashboard/svg-icon/dashboard-back.webp') }}" alt="Back Btn" />
                    </a>
                    <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">Tambah
                        Daftar Kelas</p>
                </div>
                <p class="w-full text-disabled">Formulir untuk menambahkan kelas baru ke dalam program Berbinar+ secara
                    rinci, beserta detail nama kelas, jadwal pelaksanaan, fasilitator, dan kapasitas maksimal peserta.</p>
            </div>
            <div class="rounded-lg bg-white px-4 py-4 shadow-md md:px-8 md:py-7 xl:px-10 mb-7">
                <form action="{{ route('dashboard.kelas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h1 class="mb-6 text-center text-3xl font-bold">Kelas Berbinar+</h1>
                    <div class="flex flex-col gap-3">
                        <div>
                            <label class="text-lg">Kategori</label>
                            <select name="category"
                                class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-2 shadow-sm" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="Development">Development</option>
                                <option value="Design">Design</option>
                                <option value="Management">Management</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-lg">Nama Kelas</label>
                            <input type="text" name="name" placeholder="UI/UX Designer"
                                class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-2 shadow-sm mb-1" required />
                        </div>
                        <div>
                            <label class="text-lg">Nama Instruktur</label>
                            <input type="text" name="instructor_name" placeholder="Elon Musk"
                                class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-2 shadow-sm mb-1" required />
                        </div>
                        <div>
                            <label class="text-lg">Jabatan Instruktur</label>
                            <input type="text" name="instructor_title" placeholder="UI/UX Lead at Astra International"
                                class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-2 shadow-sm mb-1" required />
                        </div>
                        <div>
                            <label class="text-lg">Thumbnail</label>
                            <div class="mb-2">
                                <img id="thumbnailPreview" src="" alt="Thumbnail" class="h-24 rounded hidden">
                            </div>
                            <input type="file" name="thumbnail" id="thumbnailInput"
                                class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-2 shadow-sm mb-1" required
                                accept="image/*" />
                            <small class="text-gray-500 block">
                                <span class="text-red-500">Ukuran gambar maksimal 1 MB, dimensi 300x300 px.</span>
                            </small>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-row-reverse gap-4 pt-5">
                        <button type="submit" class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg"
                            style="background: #3986a3; color: #fff">Simpan</button>
                        <a href="#" id="cancelButton"
                            class="flex h-12 flex-1 items-center justify-center rounded-xl text-lg"
                            style="border: 2px solid #3986a3; color: #3986a3">Batal</a>
                    </div>

                    <!-- Modal Konfirmasi Batal -->
                    <div id="confirmModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
                        <div class="relative w-[360px] md:w-[560px] rounded-[20px] bg-white p-6 text-center font-plusJakartaSans shadow-lg"
                            style="
            background:
                linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat,
                white;
            border-radius: 20px;
            background-clip: padding-box, border-box;
        ">
                            <!-- Warning Icon -->
                            <img src="{{ asset('assets/images/dashboard/warning.webp') }}" alt="Warning Icon"
                                class="mx-auto h-[83px] w-[83px]" />

                            <!-- Title -->
                            <h2 class="mt-4 text-2xl font-bold text-stone-900">Konfirmasi Batal</h2>

                            <!-- Message -->
                            <p class="mt-2 text-base font-medium text-black">Apakah Anda yakin ingin membatalkan pengisian
                                data?
                            </p>

                            <!-- Actions -->
                            <div class="mt-6 flex justify-center gap-3">
                                <button type="button" id="cancelSubmit"
                                    class="rounded-lg border border-stone-300 px-6 py-2 text-stone-700">Tidak</button>
                                <a href="{{ route('dashboard.kelas.index') }}"
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
            document.addEventListener('DOMContentLoaded', function() {
                @foreach ($errors->all() as $error)
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: '{{ $error }}',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true
                    });
                @endforeach
            });
        </script>
    @endif
@endsection
