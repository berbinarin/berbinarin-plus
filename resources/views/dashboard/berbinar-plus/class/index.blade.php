@extends('dashboard.layouts.app', [
    'title' => 'Dashboard User Berbinar+',
    'active' => 'Success',
    'page' => 'Success',
])

@section('content')
    <section class="flex w-full">
        <div class="flex flex-col w-full bg-gray-100">
            <div class="w-full">
                <div class="py-4 md:pt-12 md:pb-7">
                    <div>
                        <p tabindex="0"
                            class="focus:outline-none text-base sm:text-lg md:text-2xl lg:text-4xl font-bold leading-normal mb-2 text-gray-800">
                            Daftar Kelas
                        </p>
                        <p class="w-full text-disabled">
                            Halaman ini berisi daftar kelas yang tersedia dalam program Berbinar+ berisi jadwal,
                            fasilitator, kapasitas, dan status kelas.
                            Admin dapat menambah, mengubah, atau menghapus kelas serta melihat jumlah peserta yang terdaftar
                            di setiap kelas secara langsung.
                        </p>
                        <a href="{{ route('dashboard.kelas.create') }}"
                            class="mt-8 inline-flex items-start justify-start rounded-lg bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                            <p class="text-dark font-medium leading-none">Tambah Data</p>
                        </a>
                    </div>
                </div>
                <div class="flex w-full space-x-4">
                    <div class="rounded-lg bg-white w-full shadow-md px-4 py-4 md:px-8 md:py-7 xl:px-10 mb-7">
                        <div class="mb-4 mt-4 overflow-x-hidden">
                            <table id="example" class="display min-w-full pt-5 leading-normal">
                                <thead>
                                    <tr class="mt-4">
                                        <th
                                            class="sticky-col sticky-col-1 bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            No</th>
                                        <th
                                            class="sticky-col sticky-col-2 bg-white px-6 py-3 text-start text-base font-bold leading-4 tracking-wider text-black">
                                            Nama Kelas</th>
                                        <th
                                            class="bg-white px-6 py-3 text-center  text-base font-bold leading-4 tracking-wider text-black">
                                            Jumlah Pedaftar</th>
                                        <th
                                            class="bg-white px-6 py-3 text-center  text-base font-bold leading-4 tracking-wider text-black">
                                            Detail Materi</th>
                                        <th
                                            class="bg-white px-6 py-3 text-center  text-base font-bold leading-4 tracking-wider text-black">
                                            Detail Soal</th>
                                        <th
                                            class="bg-white px-6 right-0 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes as $index => $class)
                                        <tr class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-50 even:bg-white">
                                            <td class="whitespace-no-wrap text-center sticky-col sticky-col-1 px-6 py-4">
                                                {{ $index + 1 }}
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                                {{ $class->name }}
                                            </td>
                                            <td class="whitespace-no-wrap text-center px-6 py-4">
                                                {{-- Jika ada relasi enrollments, tampilkan jumlahnya --}}
                                                {{ $class->enrollments_count ?? 0 }}
                                            </td>
                                            <td class="text-center">
                                                <a href="#"
                                                    class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                                    style="background-color: #82C7FF">
                                                    <i class="bx bx-list-ul text-white"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="#"
                                                    class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                                    style="background-color: #07444D">
                                                    <i class="bx bx-check text-white"></i>
                                                </a>
                                            </td>
                                            <td class="whitespace-no-wrap flex items-center justify-center gap-2 px-6 py-4">
                                                <a href="{{ route('dashboard.kelas.show', $class->id) }}"
                                                    class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                                    style="background-color: #3b82f6">
                                                    <i class="bx bxs-show text-white"></i>
                                                </a>
                                                <a href="{{ route('dashboard.kelas.edit', $class->id) }}"
                                                    class="inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                                    style="background-color: #e9b306">
                                                    <i class="bx bxs-edit-alt text-white"></i>
                                                </a>
                                                <button type="button" onclick="openDeleteModal({{ $class->id }})"
                                                    class="inline-flex items-start justify-start rounded p-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                                    style="background-color: #ef4444">
                                                    <i class="bx bxs-trash-alt text-white"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
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
            <h2 class="mt-4 text-2xl font-bold text-stone-900">Konfirmasi Hapus</h2>

            <!-- Message -->
            <p class="mt-2 text-base font-medium text-black">Apakah Anda yakin ingin menghapus kelas ini? Semua data terkait
                juga akan dihapus.</p>

            <!-- Actions -->
            <div class="mt-6 flex justify-center gap-3">
                <button type="button" id="cancelDelete"
                    class="rounded-lg border border-stone-300 px-6 py-2 text-stone-700">Tidak</button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-6 py-2 font-medium text-white">
                        Ya
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let deleteModal = document.getElementById('deleteModal');
        let deleteForm = document.getElementById('deleteForm');
        let cancelDelete = document.getElementById('cancelDelete');

        function openDeleteModal(classId) {
            deleteForm.action = `/dashboard/kelas/${classId}`;
            deleteModal.classList.remove('hidden');
        }

        if (cancelDelete) {
            cancelDelete.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });
        }
    </script>
@endsection
