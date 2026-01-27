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
                                Dashboard Berbinar+</p>
                            <p class="w-full text-disabled">
                                Halaman utama yang menampilkan ringkasan data program Berbinar+ serta akses cepat untuk mengelola kelas, pendaftar, dan paket layanan secara efisien.
                            </p>
                            @endrole

                            @role('berbinarplusadmin')
                            <p tabindex="0" class="focus:outline-none text-4xl font-bold leading-normal mx-10 text-gray-800 mb-2">
                                Dashboard Berbinar +</p>
                            <p class="w-5/6 text-[#333333] lg:text-lg mx-10"> Halaman utama yang menampilkan ringkasan data program Berbinar+
                                serta akses cepat untuk mengelola kelas, pendaftar, dan paket layanan secara efisien.                            @endrole
                            @role('berbinarplusadmin')
                            <p tabindex="0" class="focus:outline-none text-4xl font-bold leading-normal mx-10 text-gray-800 mb-2">
                                Dashboard Berbinar +</p>
                            <p class="w-5/6 text-[#333333] lg:text-lg mx-10"> Halaman utama yang menampilkan ringkasan data program Berbinar+
                                serta akses cepat untuk mengelola kelas, pendaftar, dan paket layanan secara efisien.                            @endrole
                    </div>
                </div>
            </div>

            @role('berbinarplus')
                <div class="flex flex-row w-full gap-6">

                    <!-- Charts Section -->
                    <div class="w-full grid grid-cols-1 gap-6">
                        <div class="flex h-[70vh] flex-col rounded-xl bg-white px-6 py-4 shadow">
                            <div class="mb-4">
                                <h1 class="text-[28px] text-[#75BADB]"><b>Rata-Rata Progres Kelas Berbinar+</b></h1>
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                    <p class="text-[14px]">Berikut ini merupakan visualisasi rata-rata progres tiap-tiap kelas Berbinar+</p>
                                </div>
                            </div>
                            <div class="flex w-full flex-col items-center h-full">
                                <canvas id="marketingChart" class="mb-1" style="max-height: 400px;"></canvas>
                                <div class="mb-4 flex gap-4 text-xs">
                                    @php
                                        $chartLabels = ['Kelas Eka', 'Kelas Dwi', 'Kelas Tri', 'Kelas Catur', 'Kelas Panca'];
                                        $chartColors = ['#440E03', '#F4320B', '#E9B306', '#57F527', '#106681'];
                                    @endphp
                                    @foreach ($chartLabels as $i => $label)
                                        <div class="flex items-center gap-1">
                                            <span class="inline-block h-3 w-3 rounded"
                                                style="background: {{ $chartColors[$i] }}"></span>
                                            {{ $label }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col w-full gap-6">

                        <div class="flex flex-col w-full items-start px-6 py-4 bg-white shadow rounded-lg">
                            <h1 class="text-[28px] text-[#75BADB]"><b>Data Kelas dan Pendaftar Baru</h1>
                            <div class="w-full h-[59vh] overflow-y-scroll">

                                <table id="unfinished" class="min-w-full pt-5 leading-normal">
                                    <thead>
                                        <th class="w-1/12">No.</th>
                                        <th class="text-start">Jenis</th>
                                        <th class="text-center">Nama</th>
                                        <th class="w-1/6">Aksi</th>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b border-gray-200 bg-white">
                                            <td class="text-center">1.</td>
                                            <td class="py-4">
                                                <p>Pendaftar Baru</p>
                                            </td>
                                            <td class="text-center">Kanz Abiyu Alkautsar</td>
                                            <td class="flex justify-center pt-3">
                                                <a href="{{ route('dashboard.pendaftar.index') }}">
                                                    <img src="{{ asset('assets/images/dashboard/svg/arrow-square.webp') }}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200 bg-white">
                                            <td class="text-center">1.</td>
                                            <td class="py-4">
                                                <p>Kelas Baru</p>
                                            </td>
                                            <td class="text-center">Graphic Designer</td>
                                            <td class="flex justify-center pt-3">
                                                <a href="{{ route('dashboard.kelas.index') }}">
                                                <img src="{{ asset('assets/images/dashboard/svg/arrow-square.webp') }}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200 bg-white">
                                            <td class="text-center">1.</td>
                                            <td class="py-4">
                                                <p>Pendaftar Baru</p>
                                            </td>
                                            <td class="text-center">Kanz Abiyu Alkautsar</td>
                                            <td class="flex justify-center pt-3">
                                                <a href="{{ route('dashboard.pendaftar.index') }}">
                                                <img src="{{ asset('assets/images/dashboard/svg/arrow-square.webp') }}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200 bg-white">
                                            <td class="text-center">1.</td>
                                            <td class="py-4">
                                                <p>Kelas Baru</p>
                                            </td>
                                            <td class="text-center">Graphic Designer</td>
                                            <td class="flex justify-center pt-3">
                                                <a href="{{ route('dashboard.kelas.index') }}">
                                                <img src="{{ asset('assets/images/dashboard/svg/arrow-square.webp') }}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200 bg-white">
                                            <td class="text-center">1.</td>
                                            <td class="py-4">
                                                <p>Pendaftar Baru</p>
                                            </td>
                                            <td class="text-center">Kanz Abiyu Alkautsar</td>
                                            <td class="flex justify-center pt-3">
                                                <a href="{{ route('dashboard.pendaftar.index') }}">
                                                <img src="{{ asset('assets/images/dashboard/svg/arrow-square.webp') }}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200 bg-white">
                                            <td class="text-center">1.</td>
                                            <td class="py-4">
                                                <p>Kelas Baru</p>
                                            </td>
                                            <td class="text-center">Graphic Designer</td>
                                            <td class="flex justify-center pt-3">
                                                <a href="{{ route('dashboard.kelas.index') }}">
                                                <img src="{{ asset('assets/images/dashboard/svg/arrow-square.webp') }}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200 bg-white">
                                            <td class="text-center">1.</td>
                                            <td class="py-4">
                                                <p>Pendaftar Baru</p>
                                            </td>
                                            <td class="text-center">Kanz Abiyu Alkautsar</td>
                                            <td class="flex justify-center pt-3">
                                                <a href="{{ route('dashboard.pendaftar.index') }}">
                                                <img src="{{ asset('assets/images/dashboard/svg/arrow-square.webp') }}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200 bg-white">
                                            <td class="text-center">1.</td>
                                            <td class="py-4">
                                                <p>Kelas Baru</p>
                                            </td>
                                            <td class="text-center">Graphic Designer</td>
                                            <td class="flex justify-center pt-3">
                                                <a href="{{ route('dashboard.kelas.index') }}">
                                                <img src="{{ asset('assets/images/dashboard/svg/arrow-square.webp') }}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200 bg-white">
                                            <td class="text-center">1.</td>
                                            <td class="py-4">
                                                <p>Pendaftar Baru</p>
                                            </td>
                                            <td class="text-center">Kanz Abiyu Alkautsar</td>
                                            <td class="flex justify-center pt-3">
                                                <a href="{{ route('dashboard.pendaftar.index') }}">
                                                <img src="{{ asset('assets/images/dashboard/svg/arrow-square.webp') }}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200 bg-white">
                                            <td class="text-center">1.</td>
                                            <td class="py-4">
                                                <p>Kelas Baru</p>
                                            </td>
                                            <td class="text-center">Graphic Designer</td>
                                            <td class="flex justify-center pt-3">
                                                <a href="{{ route('dashboard.kelas.index') }}">
                                                <img src="{{ asset('assets/images/dashboard/svg/arrow-square.webp') }}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                @section('script')
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const chartDataValues = [{{ $kelas1 }}, {{ $kelas2 }}, {{ $kelas3 }}, {{ $kelas4 }}, {{ $kelas5 }}];
                            const chartColors = ['rgba(68, 14, 3, 0.6)', 'rgba(244, 50, 11, 0.6)', 'rgba(233, 179, 6, 0.6)', 'rgba(87, 245, 39, 0.6)', 'rgba(16, 102, 129, 0.6)'];
                            const solidColors = ['#440E03', '#F4320B', '#E9B306', '#57F527', '#106681'];
                            const chartLabels = ['Kelas Eka', 'Kelas Dwi', 'Kelas Tri', 'Kelas Catur', 'Kelas Panca'];

                            const ctx = document.getElementById('marketingChart').getContext('2d');
                            const chartData = {
                                labels: chartLabels,
                                datasets: [{
                                    label: 'Jumlah',
                                    data: chartDataValues,
                                    backgroundColor: chartColors,
                                    borderRadius: 0,
                                    barThickness: 30,
                                }, ],
                            };

                            new Chart(ctx, {
                                type: 'bar',
                                data: chartData,
                                options: {
                                    indexAxis: 'x',
                                    scales: {
                                        x: {
                                            beginAtZero: true,
                                            grid: {
                                                color: '#eee'
                                            },
                                        },
                                        y: {
                                            grid: {
                                                color: '#eee'
                                            },
                                            beginAtZero: true,
                                            max: 100,
                                            ticks: {
                                                stepSize: 10,
                                                callback: function(value) {
                                                    return value % 10 === 0 ? value : '';
                                                }
                                            }
                                        },
                                    },
                                    plugins: {
                                        legend: {
                                            display: false
                                        },
                                    },
                                    animation: false,
                                },
                                plugins: [{
                                    afterDatasetsDraw: function(chart) {
                                        const ctx = chart.ctx;
                                        chart.data.datasets.forEach(function(dataset, i) {
                                            const meta = chart.getDatasetMeta(i);
                                            meta.data.forEach(function(bar, index) {
                                                const value = dataset.data[index];
                                                ctx.save();
                                                ctx.font = 'bold 14px sans-serif';
                                                if (value >= Math.max(...chartDataValues) * 0.8) {
                                                    ctx.fillStyle = '#fff';
                                                    ctx.textAlign = 'center';
                                                    ctx.textBaseline = 'top';
                                                    ctx.fillText(value, bar.x, bar.y + 15);
                                                } else {
                                                    ctx.fillStyle = '#444';
                                                    ctx.textAlign = 'center';
                                                    ctx.textBaseline = 'bottom';
                                                    ctx.fillText(value, bar.x, bar.y - 5);
                                                }
                                                if (value > 0) {
                                                    const solidColor = solidColors[index %
                                                        solidColors.length];
                                                    const barHeight = bar.height || (bar.base -
                                                        bar.y) * 2;
                                                    ctx.fillStyle = solidColor;
                                                    ctx.fillRect(bar.x - bar.width / 2, bar.y, bar.width, 12);
                                                }
                                                ctx.restore();
                                            });
                                        });
                                    },
                                }, ],
                            });
                        });
                    </script>
                @endsection
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
