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
                            <a href="{{ route('dashboard.pendaftar.pengumpulan-tes.index') }}">
                                <img src="{{ asset('assets/images/dashboard/svg-icon/dashboard-back.webp') }}" alt="Back Btn" />
                            </a>
                            <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">Data Peserta Post Test</p>
                        </div>
                        <p class="w-full text-disabled">
                            Halaman yang menampilkan rangkuman data hasil Post Test peserta Berbinar+, sehingga memudahkan admin dalam melakukan pengecekan, penilaian, dan pengelolaan data kelas.
                        </p>
                    </div>
                </div>
                <div class="flex w-full space-x-4">
                    <div class="rounded-lg bg-white w-full shadow-md px-4 py-4 md:px-8 md:py-7 xl:px-10 mb-7">
                        <div class="mb-4 mt-4 overflow-x-hidden">

                            <table id="example" class="display min-w-full pt-5 leading-normal">
                                <thead>
                                    <tr class="mt-4">
                                        <th class="sticky-col sticky-col-1 bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            No
                                        </th>
                                        <th class="sticky-col sticky-col-2 bg-white px-6 py-3 text-start text-base font-bold leading-4 tracking-wider text-black">
                                            Nama
                                        </th>
                                        <th class="sticky-col sticky-col-2 bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Kelas
                                        </th>
                                        <th class="sticky-col sticky-col-2 bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Tanggal
                                        </th>
                                        <th class="sticky-col sticky-col-2 bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Status
                                        </th>
                                        <th class="bg-white px-6 right-0 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- @foreach ($tests as $index => $test) --}}
                                        <tr class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-50 even:bg-white">
                                            <td class="whitespace-no-wrap text-center sticky-col sticky-col-1 px-6 py-4">
                                                {{-- {{ $index + 1 }} --}} 1
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                                {{-- {{ $test->name }} --}} Kanz Eka
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 text-center px-6 py-4">
                                                {{-- {{ $test->name }} --}} Graphic Designer
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 text-center px-6 py-4">
                                                {{-- {{ $test->name }} --}} 30 Januari 2022
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 text-center px-6 py-4">
                                                <div class="inline-flex items-center justify-center">
                                                    <div id="status" class="text-center px-3 py-1 rounded-lg">{{-- {{ $test->name }} --}} Progress</div>
                                                </div>
                                            </td>
                                            <td class="whitespace-no-wrap flex items-center justify-center gap-2 px-6 py-4">
                                                <a href="{{ route('dashboard.pendaftar.pengumpulan-tes.post-test.show') }}" class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #3b82f6">
                                                    <i class="bx bxs-show text-white"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <tr class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-50 even:bg-white">
                                            <td class="whitespace-no-wrap text-center sticky-col sticky-col-1 px-6 py-4">
                                                {{-- {{ $index + 1 }} --}} 2
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                                {{-- {{ $test->name }} --}} Kanz Dwi
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 text-center px-6 py-4">
                                                {{-- {{ $test->name }} --}} Graphic Designer
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 text-center px-6 py-4">
                                                {{-- {{ $test->name }} --}} 31 Januari 2022
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 text-center px-6 py-4">
                                                <div class="inline-flex items-center justify-center">
                                                    <div id="status" class="text-center px-3 py-1 rounded-lg">{{-- {{ $test->name }} --}} Finished</div>
                                                </div>
                                            </td>
                                            <td class="whitespace-no-wrap flex items-center justify-center gap-2 px-6 py-4">
                                                <a href="{{ route('dashboard.pendaftar.pengumpulan-tes.post-test.show') }}" class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #3b82f6">
                                                    <i class="bx bxs-show text-white"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    {{-- @endforeach --}}
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[id="status"]').forEach(function (el) {
                const text = (el.textContent || '').trim().toLowerCase();

                el.classList.remove('bg-white','bg-gray-50','bg-gray-100','text-black', 'text-white','text-gray-700','text-gray-800','bg-cyan-500','bg-green-500','text-blue-800','text-green-800');

                if (text === 'progress') {
                    el.classList.add('bg-primary-alt','text-white');
                } else if (text === 'finished') {
                    el.classList.add('bg-green-500','text-white');
                }
            });
        });
    </script>
@endsection
