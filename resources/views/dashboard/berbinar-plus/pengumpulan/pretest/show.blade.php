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
                        <div class="mb-2 flex items-center gap-2">
                            <a href="{{ route('dashboard.pendaftar.pengumpulan-tes.pre-test.index') }}">
                                <img src="{{ asset('assets/images/dashboard/svg-icon/dashboard-back.webp') }}" alt="Back Btn" />
                            </a>
                            <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">Detail Jawaban Pre Test</p>
                        </div>
                        <p class="w-full text-disabled">
                            Halaman yang menampilkan detail jawaban peserta pada Pre Test, lengkap dengan hasil penilaian dan data peserta untuk memudahkan proses evaluasi.
                        </p>
                    </div>
                </div>
                <div class="w-full space-x-4 flex flex-row gap-3">

                        <div class="flex flex-col gap-5 w-1/3">

                            <div class="bg-[#106681] text-white flex flex-col gap-5 justify-between px-6 py-4 rounded-xl">
                                <div class="flex flex-col gap-1">
                                    <h1>benar</h1>
                                    <h2 class="text-xl font-medium">18 Soal</h2>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h1>salah</h1>
                                    <h2 class="text-xl font-medium">2 Soal</h2>
                                </div>
                            </div>

                            <div class="bg-white flex flex-col gap-5 justify-between px-6 py-4 rounded-xl">
                                <div class="flex flex-col gap-1">
                                    <h1>Nama</h1>
                                    <h2 class="text-xl font-medium">Morgan Vero</h2>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h1>Email</h1>
                                    <h2 class="text-xl font-medium">morganvero@gmail.com</h2>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h1>Tanggal Pengerjaan</h1>
                                    <h2 class="text-xl font-medium">27 Juli 2025</h2>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h1>status</h1>
                                    <h2 class="text-xl font-medium">Finished</h2>
                                </div>
                            </div>

                        </div>


                        <div class="w-2/3">
                            <div class="bg-white flex flex-col gap-5 justify-between px-6 py-4 rounded-xl overflow-y-auto max-h-[72vh]">

                                <h1 class="text-2xl font-semibold text-primary-alt">Jawaban</h1>

                                <div class="flex flex-col overflow-y-auto">
                                    <table class="w-full h-full gap-3 mb-6" style="overflow-y: scroll">

                                        <thead class="w-full border-b border-gray-300 overflow-x-scroll">
                                            <tr>
                                                <th class="w-1/12 text-center text-gray-400">No</th>
                                                <th class="w-5/12 text-start text-gray-400">Pertanyaan</th>
                                                <th class="w-3/12 text-start text-gray-400">Jawaban</th>
                                                <th class="w-3/12 text-start text-gray-400">Jawaban Benar</th>
                                            </tr>
                                        </thead>

                                        <tbody class="px-2">

                                            <tr>
                                                <td class="py-4 text-center">1</td>
                                                <td class="text-start">Placeholder Pertanyaan</td>
                                                <td>A. Negative Space</td>
                                                <td>A. Negative Space</td>
                                            </tr>
                                            <tr>
                                                <td class="py-4 text-center">2</td>
                                                <td class="text-start">Placeholder Pertanyaan</td>
                                                <td>A. Negative Space</td>
                                                <td>A. Negative Space</td>
                                            </tr>
                                            <tr>
                                                <td class="py-4 text-center">3</td>
                                                <td class="text-start">Placeholder Pertanyaan</td>
                                                <td>A. Negative Space</td>
                                                <td>A. Negative Space</td>
                                            </tr>
                                            <tr>
                                                <td class="py-4 text-center">4</td>
                                                <td class="text-start">Placeholder Pertanyaan</td>
                                                <td>A. Negative Space</td>
                                                <td>A. Negative Space</td>
                                            </tr>
                                            <tr>
                                                <td class="py-4 text-center">5</td>
                                                <td class="text-start">Placeholder Pertanyaan</td>
                                                <td>A. Negative Space</td>
                                                <td>A. Negative Space</td>
                                            </tr>
                                            <tr>
                                                <td class="py-4 text-center">6</td>
                                                <td class="text-start">Placeholder Pertanyaan</td>
                                                <td>A. Negative Space</td>
                                                <td>A. Negative Space</td>
                                            </tr>
                                            <tr>
                                                <td class="py-4 text-center">7</td>
                                                <td class="text-start">Placeholder Pertanyaan</td>
                                                <td>A. Negative Space</td>
                                                <td>A. Negative Space</td>
                                            </tr>
                                            <tr>
                                                <td class="py-4 text-center">8</td>
                                                <td class="text-start">Placeholder Pertanyaan</td>
                                                <td>A. Negative Space</td>
                                                <td>A. Negative Space</td>
                                            </tr>
                                            <tr>
                                                <td class="py-4 text-center">9</td>
                                                <td class="text-start">Placeholder Pertanyaan</td>
                                                <td>A. Negative Space</td>
                                                <td>A. Negative Space</td>
                                            </tr>
                                            <tr>
                                                <td class="py-4 text-center">10</td>
                                                <td class="text-start">Placeholder Pertanyaan</td>
                                                <td>A. Negative Space</td>
                                                <td>A. Negative Space</td>
                                            </tr>

                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>


                </div>
            </div>
        </div>
    </section>
@endsection
