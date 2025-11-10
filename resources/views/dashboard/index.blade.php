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
                                Dashboard Berbinar +</p>
                            <p class="w-full text-disabled">
                                Halaman utama yang menampilkan ringkasan data program Berbinar+ serta akses cepat untuk mengelola kelas, pendaftar, dan paket layanan secara efisien.
                            </p>
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
                <div class="flex flex-col w-full gap-6">
                    <div class="flex flex-row w-full gap-6">
                        <div class="flex w-1/3 items-center p-8 bg-white shadow rounded-lg">
                            <div
                                class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-blur-bg rounded-full mr-6">
                                <i class='bx bx-file text-2xl'></i>
                            </div>
                            <div>
                                <span class="block text-2xl font-bold">{{ $totalBerbinarPlusClass }}</span>
                                <span class="block text-gray-500">Kelas Berbinar+</span>
                            </div>
                        </div>

                        <div class="flex w-1/3 items-center p-8 bg-white shadow rounded-lg">
                            <div
                                class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-primary bg-blur-bg rounded-full mr-6">
                                <i class='bx bx-user text-2xl'></i>
                            </div>
                            <div>
                                <span class="block text-2xl font-bold">{{ $totalBerbinarPlusUser }}</span>
                                <span class="block text-gray-500">Pendaftar Berbinar+</span>
                            </div>
                        </div>

                    </div>
                                    <!-- Charts Section -->
                    <div class="w-full grid grid-cols-1 gap-6">
                        <div class="flex h-[330px] flex-col rounded-xl bg-white px-6 py-4 shadow">
                            <div class="mb-4">
                                <h1 class="text-[28px] text-[#75BADB]"><b>Data Berbinar+</b></h1>
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                    <p class="text-[14px]">Berikut ini merupakan visualisasi jumlah pendaftar dan kelas Berbinar+</p>
                                </div>
                            </div>
                            <div class="flex w-full flex-col items-center h-full">
                                <canvas id="marketingChart" class="mb-1" style="max-height: 180px;"></canvas>
                                <div class="mb-4 flex gap-4 text-xs">
                                    @php
                                        $chartLabels = ['Kelas Berbinar+', 'Pendaftar Berbinar+'];
                                        $chartColors = ['#106681', '#E9B306'];
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
                </div>

                @section('script')
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const chartDataValues = [{{ $totalBerbinarPlusClass }}, {{ $totalBerbinarPlusUser }}];
                            const chartColors = ['rgba(16, 102, 129, 0.6)', 'rgba(233, 179, 6, 0.6)'];
                            const solidColors = ['#106681', '#E9B306'];
                            const chartLabels = ['Kelas', 'Pendaftar'];

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
                                    indexAxis: 'y',
                                    scales: {
                                        x: {
                                            beginAtZero: true,
                                            grid: {
                                                color: '#eee'
                                            },
                                            position: 'top',
                                            ticks: {
                                                stepSize: 50,
                                                callback: function(value) {
                                                    return value % 50 === 0 ? value : '';
                                                }
                                            },
                                            min: 0,
                                            max: 250, // Fixed maximum scale at 250
                                            suggestedMax: 250 // Ensure the scale always goes up to 250
                                        },
                                        y: {
                                            grid: {
                                                color: '#eee'
                                            },
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
                                                if (value >= Math.max(...chartDataValues) *
                                                    0.8) {
                                                    ctx.fillStyle = '#fff';
                                                    ctx.textAlign = 'right';
                                                    ctx.textBaseline = 'middle';
                                                    ctx.fillText(value, bar.x - 10, bar.y);
                                                } else {
                                                    ctx.fillStyle = '#444';
                                                    ctx.textAlign = 'left';
                                                    ctx.textBaseline = 'middle';
                                                    ctx.fillText(value, bar.x + 10, bar.y);
                                                }
                                                if (value > 0) {
                                                    const solidColor = solidColors[index %
                                                        solidColors.length];
                                                    const barHeight = bar.height || (bar.base -
                                                        bar.y) * 2;
                                                    ctx.fillStyle = solidColor;
                                                    ctx.fillRect(bar.x - 6, bar.y - barHeight /
                                                        2, 12, barHeight);
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
