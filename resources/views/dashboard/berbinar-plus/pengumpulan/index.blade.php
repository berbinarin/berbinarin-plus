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
                            <a href="{{ route('dashboard.pendaftar.index') }}">
                                <img src="{{ asset('assets/images/dashboard/svg-icon/dashboard-back.webp') }}" alt="Back Btn" />
                            </a>
                            <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">Data Kelas</p>
                        </div>
                        <p class="w-full text-disabled">
                            Halaman yang menampilkan rangkuman data hasil Pre Test, Post Test peserta di kelas Graphic Designer dan Sertifikat, sehingga memudahkan admin dalam melakukan pengecekan, penilaian, dan pengelolaan data kelas.
                        </p>
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <div class="rounded-lg bg-white w-full shadow-md px-4 py-2 md:px-8 md:pb-7 xl:px-10 mb-7">
                        <div class="mb-4 mt-4 overflow-x-hidden">

                            <!-- <table id="example" class="display min-w-full pt-5 leading-normal"> -->
                            <table id="example" class="min-w-full pt-5 leading-normal">
                                <h3 class="text-3xl font-semibold text-primary-alt pb-4">Data Jawaban Test Kelas Graphic Designer</h3>
                                <thead>
                                    <tr class="mt-4">
                                        <th class="w-1/12 sticky-col sticky-col-1 bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            No
                                        </th>
                                        <th class="w-8/12 sticky-col sticky-col-2 bg-white px-6 py-3 text-start text-base font-bold leading-4 tracking-wider text-black">
                                            Tipe Tes
                                        </th>
                                        <th class="w-3/12 bg-white px-6 right-0 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
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
                                                {{-- {{ $test->name }} --}} Pre Test
                                            </td>
                                            <td class="whitespace-no-wrap flex items-center justify-center gap-2 px-6 py-4">
                                                <a href="{{ route('dashboard.pengumpulan-tes.pre-test.index') }}" class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #3b82f6">
                                                    <i class="bx bxs-show text-white"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <tr class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-50 even:bg-white">
                                            <td class="whitespace-no-wrap text-center sticky-col sticky-col-1 px-6 py-4">
                                                {{-- {{ $index + 1 }} --}} 2
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                                {{-- {{ $test->name }} --}} Post Test
                                            </td>
                                            <td class="whitespace-no-wrap flex items-center justify-center gap-2 px-6 py-4">
                                                <a href="{{ route('dashboard.pengumpulan-tes.post-test.index') }}" class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #3b82f6">
                                                    <i class="bx bxs-show text-white"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    {{-- @endforeach --}}
                                </tbody>

                            </table>

                        </div>
                    </div>

                    <div class="rounded-lg bg-white w-full shadow-md px-4 py-2 md:px-8 md:pb-7 xl:px-10 mb-7">
                        <div class="mb-4 mt-4 overflow-x-hidden">

                            <!-- <table id="example" class="display min-w-full pt-5 leading-normal"> -->
                            <table id="example" class="min-w-full pt-5 leading-normal">
                                <h3 class="text-3xl font-semibold text-primary-alt pb-4">Data Sertifikat</h3>
                                <thead>
                                    <tr class="mt-4">
                                        <th class="w-8/12 sticky-col sticky-col-2 bg-white px-6 py-3 text-start text-base font-bold leading-4 tracking-wider text-black">
                                            Sertifikat
                                        </th>
                                        <th class="w-3/12 bg-white px-6 right-0 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- @foreach ($tests as $index => $test) --}}
                                        <tr class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-50 even:bg-white">
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                                {{-- {{ $test->name }} --}} Sertifikat
                                            </td>
                                            <td class="whitespace-no-wrap flex items-center justify-center gap-2 px-6 py-4">
                                                <a href="{{ route('dashboard.pengumpulan-tes.pre-test.index') }}" class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #3b82f6">
                                                    <i class="bx bxs-show text-white"></i>
                                                </a>
                                                <a href="{{ route('dashboard.pengumpulan-tes.pre-test.index') }}" class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #e9b306">
                                                    <i class="bx bxs-edit-alt text-white"></i>
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

    <!-- Certificate's Edit Modal -->
    <div id="editCertificateModal" class="fixed inset-0 z-10 flex hidden items-center justify-center bg-black bg-opacity-50">
        <div class="relative w-full max-w-xl rounded-xl bg-white p-6 text-center">
            <h3 class="mb-4 text-xl font-bold leading-6 text-black" id="modal-title">
                Ubah Sertifikat
            </h3>
            <form id="editSoalForm" method="POST" action="">
                @csrf
                @method("PUT")
                <div class="mb-5 mt-6 flex flex-col gap-4">
                    <div class="text-left">
                        <label class="text-lg">Sertifikat</label>
                        <!-- Catatan : Ini untuk input sertifikatnya Kak -->
                        {{-- @if ($class->certificate) --}}
                            {{-- <div class="mb-2">
                                <img id="certificatePreview" src="{{ asset('uploads/certificates/' . $class->certificate) }}" alt="Certificate" class="h-24 rounded">
                            </div> --}}
                        {{-- @else --}}
                            <div class="mb-2">
                                <img id="certificatePreview" src="" alt="Certificate" class="h-24 rounded hidden">
                            </div>
                        {{-- @endif --}}
                        <input type="file" name="certificate" id="certificateInput" class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-2 shadow-sm mb-1" accept="image/*" />
                        <small class="text-gray-500 block">
                            Kosongkan jika tidak ingin mengubah sertifikat.<br>
                            <!-- <span class="text-red-500">Ukuran gambar maksimal 1 MB, dimensi 300x300 px.</span> -->
                        </small>
                    </div>
                </div>
                <div class="flex w-full justify-center gap-4">
                    <button type="button" class="w-1/2 rounded-lg border border-[#3986A3] px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeEditCertificateModal()">Batal</button>
                    <button type="submit" class="w-1/2 rounded-lg bg-[#3986A3] px-6 py-2 text-center text-white hover:bg-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Question's Detail Modal -->
    <div id="detailQuestionModal" class="fixed inset-0 z-10 flex hidden items-center justify-center bg-black bg-opacity-50">
        <div class="relative w-full max-w-xl rounded-xl bg-white p-6 text-center">
            <h3 class="mb-4 text-xl font-bold leading-6 text-black">
                Detail Sertifikat
            </h3>
            <div class="mb-5 mt-6 flex flex-col gap-4">
                <div class="text-left">
                    <label class="mb-1 block font-medium text-gray-600">Tipe Soal</label>
                    <select class="w-full rounded-lg border border-gray-300 bg-gray-100 px-3 py-2" disabled>
                        <option value="multiple_choice" selected>Pilihan Ganda</option>
                        <option value="short_answer">Jawaban Singkat</option>
                    </select>
                </div>
                <div class="text-left">
                    <label class="mb-1 block font-medium text-gray-600">Pertanyaan</label>
                    <input type="text" class="w-full rounded-lg border border-gray-300 bg-gray-100 px-3 py-2" value="Kapan Kanz punya pacar history nerd?" readonly />
                </div>
                <div id="pilihanWrapper" class="text-left">
                    <label class="mb-1 block font-medium text-gray-600">Pilihan Jawaban</label>
                    <div id="detailPilihanContainer" class="max-h-52 overflow-y-auto"></div>
                </div>
                <div id="shortAnswerContainer" class="mb-4 hidden text-left">
                    <label class="mb-1 block font-medium text-gray-600">Jawaban Uraian</label>
                    <p id="shortAnswerText" class="rounded-lg border border-gray-300 bg-gray-100 px-3 py-2"></p>
                </div>
            </div>
            <button type="button" class="w-1/2 rounded-lg border border-[#3986A3] px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeDetailQuestionModal()">Kembali</button>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Certificate preview
            const certificateInput = document.getElementById('certificateInput');
            const certificatePreview = document.getElementById('certificatePreview');
            certificateInput.addEventListener('change', function(e) {
                const [file] = certificateInput.files;
                if (file) {
                    certificatePreview.src = URL.createObjectURL(file);
                    certificatePreview.classList.remove('hidden');
                }
            });
        })
    </script>
@endsection
