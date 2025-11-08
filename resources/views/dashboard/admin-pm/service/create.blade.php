@extends('dashboard.layouts.app', [
    'title' => 'Tambah Paket Layanan',
])

@section('content')
    <section class="flex w-full">
        <div class="flex w-full flex-col">
            <div class="py-4 md:pb-7 md:pt-12">
                <div class="mb-2 flex items-center gap-2">
                    <a href="{{ route('dashboard.admin.layanan.index') }}">
                        <img src="{{ asset('assets/images/dashboard/svg/dashboard-back.png') }}" alt="Back Btn" />
                    </a>
                    <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">Tambah
                        Paket Layanan</p>
                </div>
                <p class="w-full text-disabled lg:text-lg">Formulir untuk menambahkan paket layanan baru yang akan ditawarkan di semua
                    kelas.</p>
            </div>
            <div class="rounded-3xl bg-white px-4 py-4 shadow-lg shadow-gray-400 md:px-8 md:py-7 xl:px-10">
                
                <form action="{{ route('dashboard.admin.layanan.store') }}" method="POST">
                    @csrf

                    <h1 class="mb-6 text-center text-3xl font-bold">Paket Layanan Baru</h1>
                    <div class="flex flex-col gap-6">
                        
                        {{-- Nama Paket --}}
                        <div>
                            <label for="name" class="text-lg">Nama Paket</label>
                            <div class="relative w-full mt-2">
                                <input type="text" id="name" name="name" placeholder="Contoh: A+ Online Weekday atau Insight"
                                    class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-4 shadow-sm" required />
                            </div>
                        </div>

                        {{-- Tipe (Online/Offline) --}}
                        <div>
                            <label for="type" class="text-lg">Tipe Layanan</label>
                            <div class="relative w-full mt-2">
                                <select id="type" name="type"
                                    class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-4 shadow-sm">
                                    <option value="">Pilih Tipe (Opsional)</option>
                                    <option value="Online">Online</option>
                                    <option value="Offline">Offline</option>
                                </select>
                            </div>
                        </div>

                        {{-- Jadwal (Weekday/Weekend) --}}
                        <div>
                            <label for="schedule" class="text-lg">Jadwal Layanan</label>
                            <div class="relative w-full mt-2">
                                <select id="schedule" name="schedule"
                                    class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-4 shadow-sm">
                                    <option value="">Pilih Jadwal (Opsional)</option>
                                    <option value="Weekday">Weekday</option>
                                    <option value="Weekend">Weekend</option>
                                </select>
                            </div>
                        </div>

                        {{-- Deskripsi Paket --}}
                        <div>
                            <label for="description" class="text-lg">Deskripsi Paket</label>
                            <div class="relative w-full mt-2">
                                <textarea id="description" name="description" placeholder="Deskripsi singkat fitur-fitur paket ini" rows="4"
                                    class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-4 shadow-sm resize-none"></textarea>
                            </div>
                        </div>

                        {{-- Harga --}}
                        <div>
                            <label for="price" class="text-lg">Harga</label>
                            <div class="relative w-full mt-2">
                                <input type="number" id="price" name="price" placeholder="Contoh: 15000"
                                    class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-4 shadow-sm" required />
                            </div>
                        </div>

                        {{-- Catatan Harga --}}
                        <div>
                            <label for="price_note" class="text-lg">Catatan Harga (Opsional)</label>
                            <div class="relative w-full mt-2">
                                <input type="text" id="price_note" name="price_note" placeholder="Contoh: /jam"
                                    class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-4 shadow-sm" />
                            </div>
                        </div>

                        {{-- Tombol Simpan & Batal --}}
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
                                    <img src="{{ asset('assets/images/dashboard/svg/warning.svg') }}"
                                        alt="Warning Icon" class="h-12 w-12" />
                                </div>
                                <p class="mb-6 text-lg">Apakah Anda yakin ingin membatalkan?</p>
                                <div class="flex w-full justify-center gap-4">
                                    {{-- Ganti route ini ke index paket layanan Anda --}}
                                    <a href="{{ route('dashboard.admin.layanan.index') }}" id="confirmCancel"
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
    {{-- Script untuk modal (sama seperti yang Anda miliki) --}}
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

        confirmCancel.onclick = function(e) {
            e.preventDefault();
            window.location.href = "{{ route('dashboard.admin.layanan.index') }}";
        };
    </script>
@endsection