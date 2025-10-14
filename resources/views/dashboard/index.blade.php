@extends('dashboard.layouts.app', [
    'title' => 'Dashboard',
])

@section('content')
    <section class="flex w-full">
        <div class="flex flex-col w-full">
            <div class="w-full">
                <div class="py-10">
                    <div>
                        @role('berbinarplus')
                            <p tabindex="0" class="focus:outline-none text-4xl font-bold leading-normal text-gray-800 mb-2">
                                Dashboard</p>
                            <p class="w-full text-disabled"> Fitur ini digunakan untuk menampilkan statistik kursus, jumlah
                                peserta, serta aktivitas pembelajaran yang tersedia di platform e-learning Berbinarplus.
                            @endrole

                            @role('berbinaradmin')
                            <p tabindex="0" class="focus:outline-none text-4xl font-bold leading-normal text-gray-800 mb-2">
                                Dashboard</p>
                            <p class="w-full text-disabled"> Fitur ini digunakan untuk menampilkan statistik kursus, jumlah
                                peserta, serta aktivitas pembelajaran yang tersedia di platform e-learning Berbinarplus.
                            @endrole
                    </div>
                </div>
            </div>

            @role('berbinarplus')
                <div class="flex flex-row w-full gap-6">
                    <div class="flex items-center p-8 bg-white shadow rounded-lg">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-blur-bg rounded-full mr-6">
                            <i class='bx bx-table text-2xl'></i>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">10</span>
                            <span class="block text-gray-500">Class Berbinar Plus</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white shadow rounded-lg">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-blur-bg rounded-full mr-6">
                            <i class='bx bx-table text-2xl'></i>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">50</span>
                            <span class="block text-gray-500">Pendaftar</span>
                        </div>
                    </div>

                </div>
            @endrole
            @role('berbinaradmin')
                <div class="flex flex-row w-full gap-6">
                    <div class="flex items-center p-8 bg-white shadow rounded-lg">
                        <div
                            class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-blur-bg rounded-full mr-6">
                            <i class='bx bx-table text-2xl'></i>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">10</span>
                            <span class="block text-gray-500">Admin</span>
                        </div>
                    </div>
                    

                </div>
            @endrole
        </div>
    </section>
@endsection
