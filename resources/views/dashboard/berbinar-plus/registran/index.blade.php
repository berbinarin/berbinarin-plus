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
                        <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-2xl lg:text-4xl font-bold leading-normal mb-2 text-gray-800">
                            Data Pendaftar
                        </p>
                        <p class="w-full text-disabled">
                            Halaman ini menampilkan data lengkap peserta yang telah mendaftar ke program Berbinar+, termasuk
                            informasi pribadi, kelas yang diikuti, dan paket layanan yang dipilih.
                        </p>
                        <a href="{{ route('dashboard.pendaftar.create') }}" class="mt-8 inline-flex items-start justify-start rounded-lg bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                            <p class="text-dark font-medium leading-none">Tambah Data</p>
                        </a>
                    </div>
                </div>
                <div class="flex w-full space-x-4">
                    <!-- Left Card -->
                    <div class="rounded-lg bg-white w-full shadow-md px-4 py-4 md:px-8 md:py-7 xl:px-10 mb-7">
                        <div class="mb-4 mt-4 overflow-x-hidden">
                            <table id="example" class="display min-w-full pt-5 leading-normal">
                                <thead>
                                    <tr class="mt-4">
                                        <th class="sticky-col sticky-col-1 bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            No
                                        </th>
                                        <th class="sticky-col sticky-col-2 bg-white px-6 py-3 text-start text-base font-bold leading-4 tracking-wider text-black">
                                            Nama Lengkap
                                        </th>
                                        <th class="bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Tanggal Daftar
                                        </th>
                                        <th class="bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Pilihan Kelas
                                        </th>
                                        <th class="bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Progres Kelas
                                        </th>
                                        <th class="bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Status
                                        </th>
                                        <th class="bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            WA
                                        </th>
                                        <th class="bg-white px-6 right-0 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-100 even:bg-white">
                                        <td class="text-center px-6 py-4">1</td>
                                        <td class="px-6 py-4">Aldi</td>
                                        <td class="text-center px-6 py-4">11-05-2025</td>
                                        <td class="text-center px-6 py-4">Graphic Designer</td>
                                        <td class="text-center px-6 py-4">
                                            <div class="flex flex-row">
                                                <div class="w-4/5 bg-gray-200 h-4 flex flex-row">

                                                    @if ($progress == "belum")
                                                        <div id="progressBar0" class="h-4 transition-all duration-500 ease-in-out"></div>
                                                    @elseif ($progress == "pretest")
                                                        <div id="progressBar1" class="bg-primary/60 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                                    @elseif ($progress == "materials")
                                                        <div id="progressBar1" class="bg-primary/60 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                                        <div id="progressBar2" class="bg-primary/80 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                                    @elseif ($progress == "posttest")
                                                        <div id="progressBar1" class="bg-primary/60 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                                        <div id="progressBar2" class="bg-primary/80 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                                        <div id="progressBar3" class="bg-primary h-4 transition-all duration-500 ease-in-out" style="width: 34%;"></div>
                                                    @endif
                                                </div>
                                                <div class="w-1/5 flex justify-between text-xs px-0.5">
                                                    @if ($progress == "belum")
                                                    <span>0%</span>
                                                    @elseif ($progress == "pretest")
                                                    <span>33%</span>
                                                    @elseif ($progress == "materials")
                                                    <span>66%</span>
                                                    @elseif ($progress == "posttest")
                                                    <span>100%</span>
                                                    @endif
                                                </div>

                                            </div>
                                        </td>
                                        <td class="text-center px-6 py-4">
                                            <select name="enrollment_status_id" onchange="this.form.submit()" class="rounded border px-2 py-1">
                                                <option value="1">
                                                    Proses
                                                </option>
                                                <option value="2">
                                                    Terdaftar
                                                </option>
                                                <option value="3">
                                                    Penilaian
                                                </option>
                                                <option value="4">
                                                    Nonaktif
                                                </option>
                                            </select>
                                        </td>
                                        <td class="text-center px-6 py-4">
                                            <a href="https://wa.me/6281282103522" class="inline-flex items-center rounded p-2 hover:bg-blue-700" style="background-color: #00E45B" target="_blank" rel="noopener noreferrer">
                                                <img src="{{ asset('assets/images/dashboard/svg-icon/whatsapp.webp') }}" class="w-[16px] h-[16px]" alt="Whatsapp">
                                            </a>
                                        </td>
                                        <td class="text-center px-6 py-4">
                                            <a href="{{ route('dashboard.pendaftar.show') }}" class="inline-flex items-center rounded p-2 hover:bg-blue-700" style="background-color: #3b82f6">
                                                <i class="bx bx-show-alt text-white"></i>
                                            </a>
                                            <a href="{{ route('dashboard.pendaftar.edit') }}" class="inline-flex items-center rounded p-2 hover:bg-yellow-700" style="background-color: #e9b306">
                                                <i class="bx bxs-edit-alt text-white"></i>
                                            </a>
                                            <button type="button" onclick="openDeleteModal({{-- {{ $user->id }} --}})" class="inline-flex items-center rounded p-2 hover:bg-red-700" style="background-color: #ef4444">
                                                <i class="bx bxs-trash-alt text-white"></i>
                                            </button>
                                        </td>
                                    </tr>


                                <!-- Note : Untuk kode penampilan data-nya dimatikan dulu -->

                                    {{-- @foreach ($pendaftar as $index => $user)
                                        <tr class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-100 even:bg-white">
                                            <td class="text-center px-6 py-4">{{ $index + 1 }}</td>
                                            <td class="px-6 py-4">{{ $user->first_name }} {{ $user->last_name }}</td>
                                            <td class="text-center px-6 py-4">
                                                {{ $user->created_at ? $user->created_at->format('d-m-Y') : '-' }}
                                            </td>
                                            <td class="text-center px-6 py-4">
                                                @if ($user->enrollments && $user->enrollments->count())
                                                    @foreach ($user->enrollments as $enrollment)
                                                        <div>
                                                            {{ $enrollment->course ? $enrollment->course->name : '-' }}
                                                        </div>
                                                    @endforeach
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center px-6 py-4">
                                                <div class="flex flex-row">
                                                    <div class="w-4/5 bg-gray-200 h-4 flex flex-row">

                                                        @if ($progress == "belum")
                                                            <div id="progressBar0" class="h-4 transition-all duration-500 ease-in-out"></div>
                                                        @elseif ($progress == "pretest")
                                                            <div id="progressBar1" class="bg-primary/60 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                                        @elseif ($progress == "materials")
                                                            <div id="progressBar1" class="bg-primary/60 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                                            <div id="progressBar2" class="bg-primary/80 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                                        @elseif ($progress == "posttest")
                                                            <div id="progressBar1" class="bg-primary/60 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                                            <div id="progressBar2" class="bg-primary/80 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                                            <div id="progressBar3" class="bg-primary h-4 transition-all duration-500 ease-in-out" style="width: 34%;"></div>
                                                        @endif
                                                    </div>
                                                    <div class="w-1/5 flex justify-between text-xs px-0.5">
                                                        @if ($progress == "belum")
                                                        <span>0%</span>
                                                        @elseif ($progress == "pretest")
                                                        <span>33%</span>
                                                        @elseif ($progress == "materials")
                                                        <span>66%</span>
                                                        @elseif ($progress == "posttest")
                                                        <span>100%</span>
                                                        @endif
                                                    </div>

                                                </div>
                                            </td>
                                            <td class="text-center px-6 py-4">
                                                @if ($user->enrollments && $user->enrollments->count())
                                                    @foreach ($user->enrollments as $enrollment)
                                                        <form action="{{ route('dashboard.updateStatus', $enrollment->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('PATCH')
                                                            <select name="enrollment_status_id" onchange="this.form.submit()" class="rounded border px-2 py-1">
                                                                <option value="1"
                                                                    {{ $enrollment->enrollment_status_id == 1 ? 'selected' : '' }}>
                                                                    Proses
                                                                </option>
                                                                <option value="2"
                                                                    {{ $enrollment->enrollment_status_id == 2 ? 'selected' : '' }}>
                                                                    Terdaftar
                                                                </option>
                                                                <option value="3"
                                                                    {{ $enrollment->enrollment_status_id == 3 ? 'selected' : '' }}>
                                                                    Penilaian
                                                                </option>
                                                                <option value="4"
                                                                    {{ $enrollment->enrollment_status_id == 4 ? 'selected' : '' }}>
                                                                    Nonaktif
                                                                </option>
                                                            </select>
                                                        </form>
                                                    @endforeach
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center px-6 py-4">
                                                @if ($user->enrollments && $user->enrollments->count())
                                                    @foreach ($user->enrollments as $enrollment)
                                                        @php
                                                            $wa = preg_replace('/[^0-9]/', '', $user->phone_number);
                                                            if (substr($wa, 0, 1) === '0') {
                                                                $wa = '62' . substr($wa, 1);
                                                            }
                                                            $username = $user->username ?? '-';
                                                            $password =
                                                                session('generated_credentials') &&
                                                                session('generated_credentials.username') == $username
                                                                    ? session('generated_credentials.password')
                                                                    : '';
                                                            $pesan =
                                                                "Selamat, pendaftaran Anda di Berbinar+ berhasil!\n\nUsername: $username\nPassword: " .
                                                                ($password ?: '[Password rahasia]') .
                                                                "\n\nSilakan login ke aplikasi dan segera ganti password Anda.";
                                                            $waLink =
                                                                'https://wa.me/' . $wa . '?text=' . urlencode($pesan);
                                                        @endphp
                                                        <a href="{{ $waLink }}" target="_blank" class="inline-flex items-center rounded p-2 bg-green-500 hover:bg-green-600" title="Kirim WhatsApp">
                                                            <i class="bx bxl-whatsapp text-white"></i>
                                                        </a>
                                                    @endforeach
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="flex items-center justify-center gap-2 px-6 py-4">
                                                <a href="{{ route('dashboard.pendaftar.show', $user->id) }}" class="inline-flex items-center rounded p-2 hover:bg-blue-700" style="background-color: #3b82f6">
                                                    <i class="bx bx-show-alt text-white"></i>
                                                </a>
                                                <a href="{{ route('dashboard.pendaftar.edit', $user->id) }}" class="inline-flex items-center rounded p-2 hover:bg-yellow-700" style="background-color: #e9b306">
                                                    <i class="bx bxs-edit-alt text-white"></i>
                                                </a>
                                                <button type="button" onclick="openDeleteModal({{ $user->id }})" class="inline-flex items-center rounded p-2 hover:bg-red-700" style="background-color: #ef4444">
                                                    <i class="bx bxs-trash-alt text-white"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </section>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
        <div class="relative w-[360px] md:w-[560px] rounded-[20px] bg-white p-6 text-center font-plusJakartaSans shadow-lg" style="background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px; background-clip: padding-box, border-box;">
            <!-- Warning Icon -->
            <img src="{{ asset('assets/images/dashboard/warning.webp') }}" alt="Warning Icon" class="mx-auto h-[83px] w-[83px]" />

            <!-- Title -->
            <h2 class="mt-4 text-2xl font-bold text-stone-900">Konfirmasi Hapus</h2>

            <!-- Message -->
            <p class="mt-2 text-base font-medium text-black">
                Apakah Anda yakin ingin menghapus kelas ini? Semua data terkait juga akan dihapus.
            </p>

            <!-- Actions -->
            <div class="mt-6 flex justify-center gap-3">
                <button type="button" id="cancelDelete" class="rounded-lg border border-stone-300 px-6 py-2 text-stone-700">Tidak</button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-6 py-2 font-medium text-white">
                        Ya
                    </button>
                </form>
            </div>
        </div>
    </div>


    </div>
    </div>
    </div>



    </div>
    </section>


    <script>
        let deleteModal = document.getElementById('deleteModal');
        let deleteForm = document.getElementById('deleteForm');

        function openDeleteModal(userId) {
            deleteForm.action = `/dashboard/pendaftar/${userId}`;
            deleteModal.classList.remove('hidden');
        }

        function closeDeleteModal() {
            deleteModal.classList.add('hidden');
        }
    </script>
@endsection
