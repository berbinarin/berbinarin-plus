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
            <div class="rounded-lg bg-white px-4 py-4 shadow-md md:px-8 md:py-7 xl:px-10 mb-7">
                <h1 class="mb-6 text-3xl font-bold text-primary-alt">Data Diri</h1>
                <div class="mb-10 grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Nama Lengkap</h2>
                        <p class="text-lg font-semibold">Revina Monika</p>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Telepon/HP</h2>
                        <p class="text-lg font-semibold">081234567890</p>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Alamat Email</h2>
                        <p class="text-lg font-semibold">momonika@gmail.com</p>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Jenis Kelamin</h2>
                        <p class="text-lg font-semibold">perempuan</p>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Pendidikan Terakhir</h2>
                        <p class="text-lg font-semibold">SMA</p>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Usia</h2>
                        <p class="text-lg font-semibold">18 Tahun</p>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Username</h2>
                        <div class="flex items-center gap-2">
                            <p class="text-lg font-semibold" id="usernameText">Momonimut</p>
                        </div>
                    </div>
                    <div class="mb-2 flex flex-col">
                        <h2 class="mb-2 text-lg font-semibold text-gray-500">Password</h2>
                        <div class="flex items-center gap-2">
                            <p class="text-lg font-semibold" id="passwordText">kanzkanz</p>
                        </div>
                    </div>
                </div>

                <h1 class="mb-6 text-3xl font-bold text-primary-alt">Pilihan Kelas</h1>
                <div>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        <div class="mb-2 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Kelas Berbinar+</h2>
                            <p class="text-lg font-semibold">Graphic Designer</p>
                        </div>
                        <div class="mb-2 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Paket Layanan</h2>
                            <p class="text-lg font-semibold">Insightful</p>
                        </div>
                        <div class="mb-2 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Harga Paket</h2>
                            <p class="text-lg font-semibold">500.000</p>
                        </div>
                        <div class="mb-2 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Status Enrollment</h2>
                            <p class="text-lg font-semibold">
                                Terdaftar
                            </p>
                        </div>
                        <div class="mb-2 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Bukti Pembayaran</h2>
                            <p class="text-lg font-semibold text-gray-400">Tidak ada bukti pembayaran</p>
                        </div>
                        <div class="mb-2 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Darimana SobatBinar mengetahui layanan
                                produk BERBINAR+</h2>
                            <p class="text-lg font-semibold">dari Kanz</p>
                        </div>
                    </div>
                </div>
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
