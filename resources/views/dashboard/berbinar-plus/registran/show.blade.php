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

                <h1 class="mb-6 text-3xl font-bold text-primary-alt mt-7">Data Kelas 1: <a href="{{ route('dashboard.kelas.index') }}" class="font-semibold text-primary underline">Graphic Designer</a></h1>
                <div class="flex flex-row gap-6 w-full justify-between">
                    <div class="w-full">

                        <div class="mb-4 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Status</h2>
                            <p class="text-lg font-semibold">Sudah Verif</p>
                        </div>

                        <div class="mb-4 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Bukti Pembayaran</h2>
                            <p class="text-lg font-semibold text-gray-400">
                                <img src="{{ asset('assets/images/dashboard/bukti_bayar.webp') }}" alt="Bukti Bayar">
                            </p>
                        </div>

                    </div>

                    <div class="w-full">

                        <div class="mb-4 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Progres</h2>
                            <div class="flex flex-row w-80 gap-2">
                                <div class="w-4/5 bg-gray-200 h-4 flex flex-row">
                                    {{-- @if ($progress == "pretest") --}}
                                        <div id="progressBar1" class="bg-primary/60 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                    {{-- @elseif ($progress == "materials") --}}
                                        <!-- <div id="progressBar1" class="bg-primary/60 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                        <div id="progressBar2" class="bg-primary/80 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div> -->
                                    {{-- @elseif ($progress == "posttest") --}}
                                        <!-- <div id="progressBar1" class="bg-primary/60 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                        <div id="progressBar2" class="bg-primary/80 h-4 transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                                        <div id="progressBar3" class="bg-primary h-4 transition-all duration-500 ease-in-out" style="width: 34%;"></div> -->
                                    {{-- @endif --}}
                                </div>
                                <div class="w-1/5 flex justify-between text-sm font-semibold px-0.5">
                                    {{-- @if ($progress == "pretest") --}}
                                    <span>1/3</span>
                                    {{-- @elseif ($progress == "materials") --}}
                                    <!-- <span>2/3</span> -->
                                    {{-- @elseif ($progress == "posttest") --}}
                                    <!-- <span>3/3</span> -->
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Paket Layanan</h2>
                            <p class="text-lg font-semibold">
                                A+ 200.000
                            </p>
                        </div>
                        <div class="mb-4 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Darimana SobatBinar mengetahui layanan
                                produk BERBINAR+</h2>
                            <p class="text-lg font-semibold">dari Kanz</p>
                        </div>
                    </div>
                </div>

                <h1 class="mb-6 text-3xl font-bold text-primary-alt mt-7">Data Kelas 2: <a href="{{ route('dashboard.kelas.index') }}" class="font-semibold text-primary underline">UI/UX Designer</a></h1>
                <div class="flex flex-row gap-6 w-full justify-between">
                    <div class="w-full">

                        <div class="mb-4 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Status</h2>
                            <p class="text-lg font-semibold">Belum Verif</p>
                        </div>

                        <div class="mb-4 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Bukti Pembayaran</h2>
                            <p class="text-lg font-semibold text-gray-400">
                                <img src="{{ asset('assets/images/dashboard/bukti_bayar.webp') }}" alt="Bukti Bayar">
                            </p>
                        </div>

                    </div>

                    <div class="w-full">

                        <div class="mb-4 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Aksi</h2>
                            <p class="text-lg font-semibold">
                                <a href="{{ route('dashboard.pendaftar.show') }}" class="inline-flex items-center rounded p-2 hover:bg-blue-700" style="background-color: #00B300">
                                    <i class="bx bx-check text-white"></i>
                                </a>
                                <span class="italic">Enroll</span> &nbsp; Pendaftar
                            </p>
                        </div>
                        <div class="mb-4 flex flex-col">
                            <h2 class="mb-2 text-lg font-semibold text-gray-500">Paket Layanan</h2>
                            <p class="text-lg font-semibold">
                                A+ 200.000
                            </p>
                        </div>
                        <div class="mb-4 flex flex-col">
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
