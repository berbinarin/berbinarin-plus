@extends('dashboard.layouts.app', [
    'title' => 'Detail Berbinar Plus User',
])

@section('content')
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="py-4 md:pb-7 md:pt-12">
                <div class="mb-2 flex items-center gap-2">
                    <a href="{{ route('dashboard.pendaftar.index') }}">
                        <img src="{{ asset('assets/images/dashboard/svg-icon/dashboard-back.webp') }}" alt="Back Btn" />
                    </a>
                    <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">Detail
                        Data Pendaftar</p>
                </div>
                <p class="w-full text-disabled">Halaman ini menampilkan informasi detail mengenai data peserta yang berhasil
                    mendaftar Berbinar+. Admin dapat melihat Informasi lengkap seputar Data diri dan Pilihan Kelas pengguna.
                </p>
            </div>
            <div class="rounded-lg bg-white px-4 py-4 shadow-md mb-7 md:px-8 md:py-7 xl:px-10">
                <h1 class="mb-6 text-3xl font-bold text-primary-alt">Data Diri</h1>
                <div class="mb-10 grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Nama Lengkap</h2>
                        <p class="text-lg font-semibold">{{ $user->first_name }} {{ $user->last_name }}</p>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Telepon/HP</h2>
                        <p class="text-lg font-semibold">{{ $user->phone_number }}</p>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Alamat Email</h2>
                        <p class="text-lg font-semibold">{{ $user->email }}</p>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Jenis Kelamin</h2>
                        <p class="text-lg font-semibold">{{ $user->gender }}</p>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Pendidikan Terakhir</h2>
                        <p class="text-lg font-semibold">{{ $user->last_education }}</p>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Usia</h2>
                        <p class="text-lg font-semibold">{{ $user->age }} Tahun</p>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Username</h2>
                        <div class="flex items-center gap-2">
                            <p class="text-lg font-semibold" id="usernameText">{{ $user->username }}</p>
                        </div>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Password</h2>
                        <div class="flex items-center gap-2">
                            <p class="text-lg font-semibold" id="passwordText">{{ $user->plain_password ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                @foreach ($user->enrollments as $i => $enrollment)
                    <h1 class="mb-6 text-3xl font-bold text-primary-alt mt-7">Data Kelas {{ $i + 1 }}: <a
                            href="{{ route('dashboard.kelas.index') }}" class="font-semibold text-primary underline">
                            {{ $enrollment->course->name ?? '-' }}
                        </a></h1>
                    <div class="flex flex-row gap-6 w-full justify-between">
                        <div class="w-full">
                            <div class="mb-4 flex flex-col">
                                <h2 class="mb-2 text-lg font-semibold text-gray-500">Status</h2>
                                <p class="text-lg font-semibold">
                                    @php
                                        $statusKelasMap = [
                                            'pending_payment' => [
                                                'label' => 'Proses Pembayaran',
                                                'color' => 'text-yellow-500',
                                            ],
                                            'enrolled' => ['label' => 'Terdaftar', 'color' => 'text-blue-500'],
                                            'completed' => ['label' => 'Selesai', 'color' => 'text-green-600'],
                                            'expired' => ['label' => 'Kadaluarsa', 'color' => 'text-gray-500'],
                                        ];
                                        $statusKelas = $statusKelasMap[$enrollment->status_kelas] ?? [
                                            'label' => $enrollment->status_kelas,
                                            'color' => 'text-gray-400',
                                        ];
                                    @endphp
                                    <span class="{{ $statusKelas['color'] }}">{{ $statusKelas['label'] }}</span>
                                </p>
                            </div>
                            <div class="mb-4 flex flex-col">
                                <h2 class="mb-2 text-lg font-semibold text-gray-500">Bukti Pembayaran</h2>
                                <p class="text-lg font-semibold text-gray-400">
                                    @if ($enrollment->payment_proof_url)
                                        <img src="{{ asset('storage/' . $enrollment->payment_proof_url) }}"
                                            alt="Bukti Bayar" class="max-h-40 rounded border border-gray-300" />
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="mb-4 flex flex-col">
                                <h2 class="mb-2 text-lg font-semibold text-gray-500">Aksi</h2>
                                <p class="text-lg font-semibold">
                                    @if ($enrollment->status_kelas == 'pending_payment')
                                        <form
                                            action="{{ route('dashboard.pendaftar.acc-pembayaran', ['enrollment_id' => $enrollment->id]) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="inline-flex items-center rounded p-2 hover:bg-blue-700"
                                                style="background-color: #00B300">
                                                <i class="bx bx-check text-white"></i>
                                            </button>
                                            <span class="italic">ACC Pembayaran</span>
                                        </form>
                                    @else
                                        <span class="italic">-</span>
                                    @endif
                                </p>
                            </div>
                            <div class="mb-4 flex flex-col">
                                <h2 class="mb-2 text-lg font-semibold text-gray-500">Paket Layanan</h2>
                                <p class="text-lg font-semibold">
                                    {{ $enrollment->service_package }}
                                    @php
                                        $price = $enrollment->price_package;
                                        // Ambil angka pertama jika ada range, dan pastikan hanya angka
                                        if (is_string($price)) {
                                            // Ambil angka pertama dari string (misal: 'Rp44.000 - Rp140.000')
                                            if (preg_match('/(\d+[.,]?\d*)/', $price, $matches)) {
                                                $price = str_replace(['.', ','], '', $matches[1]);
                                            } else {
                                                $price = null;
                                            }
                                        }
                                    @endphp
                                    @if ($price)
                                        Rp {{ number_format((int) $price, 0, ',', '.') }}
                                    @endif
                                </p>
                            </div>
                            <div class="mb-4 flex flex-col">
                                <h2 class="mb-2 text-lg font-semibold text-gray-500">Darimana SobatBinar mengetahui layanan
                                    produk BERBINAR+</h2>
                                <p class="text-lg font-semibold">{{ $user->referral_source }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function copyToClipboard(elementId) {
            const text = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(text).then(function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Disalin ke clipboard!',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const thumb = document.getElementById('buktiTransferThumb');
            const modal = document.getElementById('buktiTransferModal');
            const closeBtn = document.getElementById('closeBuktiTransfer');
            if (thumb && modal && closeBtn) {
                thumb.addEventListener('click', function() {
                    modal.classList.remove('hidden');
                });
                closeBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    modal.classList.add('hidden');
                });
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
