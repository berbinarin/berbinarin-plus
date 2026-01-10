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
                            Data Pendaftar
                        </p>
                        <p class="w-full text-disabled">
                            Halaman ini menampilkan data lengkap peserta yang telah mendaftar ke program Berbinar+, termasuk
                            informasi pribadi, kelas yang diikuti, dan paket layanan yang dipilih.
                        </p>
                        <a href="{{ route('dashboard.pendaftar.create') }}"
                            class="mt-8 inline-flex items-start justify-start rounded-lg bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
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
                                        <th
                                            class="sticky-col sticky-col-1 bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            No
                                        </th>
                                        <th
                                            class="sticky-col sticky-col-2 bg-white px-6 py-3 text-start text-base font-bold leading-4 tracking-wider text-black">
                                            Nama Lengkap
                                        </th>
                                        <th
                                            class="bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Tanggal Daftar
                                        </th>
                                        <th
                                            class="bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Nama Pengguna
                                        </th>
                                        <th
                                            class="bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Sandi
                                        </th>
                                        <th
                                            class="bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Status
                                        </th>
                                        <th
                                            class="bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            WA
                                        </th>
                                        <th
                                            class="bg-white px-6 right-0 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($pendaftar as $index => $user)
                                        @php
                                            $enrollment = $user->enrollments->first();
                                            $courseName =
                                                $enrollment && $enrollment->course ? $enrollment->course->name : '-';
                                            $username = $user->username ?? '-';
                                            $plainPassword = $user->plain_password ?? '-';
                                            // Status berdasarkan user_status_id
                                            switch ($user->user_status_id) {
                                                case 2:
                                                    $status = 'Aktif';
                                                    $statusColor = 'text-blue-500';
                                                    break;
                                                case 1:
                                                    $status = 'Pending';
                                                    $statusColor = 'text-yellow-500';
                                                    break;
                                                case 3:
                                                    $status = 'Suspended';
                                                    $statusColor = 'text-orange-500';
                                                    break;
                                                case 4:
                                                    $status = 'Banned';
                                                    $statusColor = 'text-red-700';
                                                    break;
                                                case 5:
                                                    $status = 'Inactive';
                                                    $statusColor = 'text-gray-500';
                                                    break;
                                                default:
                                                    $status = 'Unknown';
                                                    $statusColor = 'text-gray-400';
                                            }
                                            // Format nomor WA agar selalu awalan 62 tanpa +, tanpa spasi/tanda baca
                                            $waNumber = $user->phone_number;
                                            if ($waNumber) {
                                                $waNumber = preg_replace('/\D/', '', $waNumber); // Hanya digit
                                                if (strpos($waNumber, '0') === 0) {
                                                    $waNumber = '62' . substr($waNumber, 1);
                                                } elseif (strpos($waNumber, '62') === 0) {
                                                    // sudah benar
                                                } elseif (strpos($waNumber, '8') === 0) {
                                                    // handle jika user input "812xxxx" tanpa 0/62
                                                    $waNumber = '62' . $waNumber;
                                                } else {
                                                    // fallback: tetap tampilkan
                                                }
                                            } else {
                                                $waNumber = '';
                                            }
                                        @endphp
                                        <tr
                                            class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-100 even:bg-white">
                                            <td class="text-center px-6 py-4">{{ $index + 1 }}</td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('dashboard.pendaftar.pengumpulan-tes.index', ['user' => $user->id]) }}"
                                                    class="text-primary font-semibold underline">
                                                    {{ $user->first_name }} {{ $user->last_name }}
                                                </a>
                                            </td>
                                            <td class="text-center px-6 py-4">
                                                {{ $user->created_at ? $user->created_at->format('d-m-Y') : '-' }}</td>
                                            <td class="text-center px-6 py-4">{{ $username }}</td>
                                            <td class="text-center px-6 py-4">{{ $plainPassword }}</td>
                                            <td class="text-center px-6 py-4">
                                                <p class="font-medium {{ $statusColor }}">
                                                    {{ $status }}
                                                </p>
                                            </td>
                                            <td class="text-center px-6 py-4">
                                                @if ($waNumber)
                                                    @php
                                                        $waMsg =
                                                            'Halo ' .
                                                            trim($user->first_name . ' ' . $user->last_name) .
                                                            ',%0A';
                                                        if ($username !== '-' && $plainPassword !== '-') {
                                                            $waMsg .=
                                                                'Berikut adalah akun Berbinar+ Anda:%0AUsername: ' .
                                                                $username .
                                                                '%0APassword: ' .
                                                                $plainPassword .
                                                                '%0A';
                                                        }
                                                        $waMsg .= 'Silakan login di https://berbinar.id/plus';
                                                    @endphp
                                                    <a href="https://wa.me/{{ $waNumber }}?text={{ $waMsg }}"
                                                        class="inline-flex items-center rounded p-2 hover:bg-blue-700"
                                                        style="background-color: #00E45B" target="_blank"
                                                        rel="noopener noreferrer">
                                                        <img src="{{ asset('assets/images/dashboard/svg-icon/whatsapp.webp') }}"
                                                            class="w-[16px] h-[16px]" alt="Whatsapp">
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center px-6 py-4">
                                                @if ($user->user_status_id != 2)
                                                    {{-- 2 = active (assume id 2 is 'active') --}}
                                                    <form action="{{ route('dashboard.updateUserStatus', $user->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="user_status_id" value="2">
                                                        <button type="submit"
                                                            class="inline-flex items-center rounded p-2 hover:bg-blue-700"
                                                            style="background-color: #00B300">
                                                            <i class="bx bx-check text-white"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                <a href="{{ route('dashboard.pendaftar.show', ['id' => $user->id]) }}"
                                                    class="inline-flex items-center rounded p-2 hover:bg-blue-700"
                                                    style="background-color: #3b82f6">
                                                    <i class="bx bx-show-alt text-white"></i>
                                                </a>
                                                <a href="{{ route('dashboard.pendaftar.edit', ['id' => $user->id]) }}"
                                                    class="inline-flex items-center rounded p-2 hover:bg-yellow-700"
                                                    style="background-color: #e9b306">
                                                    <i class="bx bxs-edit-alt text-white"></i>
                                                </a>
                                                <button type="button" onclick="openDeleteModal({{ $user->id }})"
                                                    class="inline-flex items-center rounded p-2 hover:bg-red-700"
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
    </section>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
        <div class="relative w-[360px] md:w-[560px] rounded-[20px] bg-white p-6 text-center font-plusJakartaSans shadow-lg"
            style="background: linear-gradient(to right, #BD7979, #BD7979) top/100% 6px no-repeat, white; border-radius: 20px; background-clip: padding-box, border-box;">
            <!-- Warning Icon -->
            <img src="{{ asset('assets/images/dashboard/error.webp') }}" alt="Warning Icon"
                class="mx-auto h-[83px] w-[83px]" />

            <!-- Title -->
            <h2 class="mt-4 text-2xl font-bold text-stone-900">Konfirmasi Hapus</h2>

            <!-- Message -->
            <p class="mt-2 text-base font-medium text-black">
                Apakah Anda yakin ingin menghapus kelas ini? Semua data terkait juga akan dihapus.
            </p>

            <!-- Actions -->
            <div class="mt-6 flex justify-center gap-3">
                <button type="button" id="cancelDelete" onclick="closeDeleteModal()"
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

    <!-- Modal Enroll Pendaftar -->
    <div id="enrollModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
        <div class="relative w-[360px] md:w-[560px] rounded-[20px] bg-white p-6 text-center font-plusJakartaSans shadow-lg"
            style="background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px; background-clip: padding-box, border-box;">
            <!-- Warning Icon -->
            <img src="{{ asset('assets/images/dashboard/warning.webp') }}" alt="Warning Icon"
                class="mx-auto h-[83px] w-[83px]" />

            <!-- Title -->
            <h2 class="mt-4 text-2xl font-bold text-stone-900">Konfirmasi <span class="italic">Enroll</span></h2>

            <!-- Message -->
            <p class="mt-2 text-base font-medium text-black">
                Status pendaftar akan diubah menjadi <span class="italic">enrolled</span>. <br> Lanjutkan?
            </p>

            <!-- Actions -->
            <div class="mt-6 flex justify-center gap-3">
                <button type="button" id="cancelEnroll" onclick="closeEnrollModal()"
                    class="rounded-lg border border-stone-300 px-6 py-2 text-stone-700">Tidak</button>
                <form id="enrollForm" method="POST" class="inline">
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


    </div>
    </div>
    </div>



    </div>
    </section>


    <script>
        let deleteModal = document.getElementById('deleteModal');
        let deleteForm = document.getElementById('deleteForm');

        function openDeleteModal(userId) {
            deleteForm.action = `/dashboard/pendaftar/destroy/${userId}`;
            deleteModal.classList.remove('hidden');
        }

        function closeDeleteModal() {
            deleteModal.classList.add('hidden');
        }

        let enrollModal = document.getElementById('enrollModal');
        let enrollForm = document.getElementById('enrollForm');

        function openEnrollModal(userId) {
            enrollForm.action = `/dashboard/pendaftar/${userId}`;
            enrollModal.classList.remove('hidden');
        }

        function closeEnrollModal() {
            enrollModal.classList.add('hidden');
        }
    </script>
@endsection
