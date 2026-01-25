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
                            <a href="{{ route('dashboard.pendaftar.show', ['id' => $userModel->id]) }}">
                                <img src="{{ asset('assets/images/dashboard/svg-icon/dashboard-back.webp') }}"
                                    alt="Back Btn" />
                            </a>
                            <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">
                                Pengumpulan</p>
                        </div>
                        <p class="w-full text-disabled">
                            Halaman yang menampilkan rangkuman data hasil Pre Test, Post Test peserta di kelas Graphic
                            Designer dan Sertifikat, sehingga memudahkan admin dalam melakukan pengecekan, penilaian, dan
                            pengelolaan data kelas.
                        </p>
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <div class="rounded-lg bg-white w-full shadow-md px-4 py-2 md:px-8 md:pb-7 xl:px-10 mb-7">
                        <div class="mb-4 mt-4 overflow-x-hidden">

                            <!-- <table id="example" class="display min-w-full pt-5 leading-normal"> -->
                            <table id="example" class="min-w-full pt-5 leading-normal">
                                <h3 class="text-3xl font-semibold text-primary-alt pb-4">
                                    Data Jawaban Tes Kelas
                                    {{ $enrollmentModel && $enrollmentModel->course ? $enrollmentModel->course->name : '-' }}
                                </h3>
                                <thead>
                                    <tr class="mt-4">
                                        <th
                                            class="w-1/12 sticky-col sticky-col-1 bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            No
                                        </th>
                                        <th
                                            class="w-8/12 sticky-col sticky-col-2 bg-white px-6 py-3 text-start text-base font-bold leading-4 tracking-wider text-black">
                                            Tipe Tes
                                        </th>
                                        <th
                                            class="w-3/12 bg-white px-6 right-0 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-50 even:bg-white">
                                        <td class="whitespace-no-wrap text-center sticky-col sticky-col-1 px-6 py-4">1</td>
                                        <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                            <span class="italic">Pre Test</span>
                                        </td>
                                        <td class="whitespace-no-wrap flex items-center justify-center gap-2 px-6 py-4">
                                            @if ($preTestResult)
                                                <a href="{{ route('dashboard.pendaftar.pengumpulan-tes.pre-test.show', ['user' => $userModel->id, 'enrollment' => $enrollmentModel->id]) }}"
                                                    class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                                    style="background-color: #3b82f6">
                                                    <i class="bx bxs-show text-white"></i>
                                                </a>
                                            @else
                                                <span class="text-red-500 italic">Belum mengerjakan pre test</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-50 even:bg-white">
                                        <td class="whitespace-no-wrap text-center sticky-col sticky-col-1 px-6 py-4">2</td>
                                        <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                            <span class="italic">Post Test</span>
                                        </td>
                                        <td class="whitespace-no-wrap flex items-center justify-center gap-2 px-6 py-4">
                                            @if ($postTestResult)
                                                <a href="{{ route('dashboard.pendaftar.pengumpulan-tes.post-test.show', ['user' => $userModel->id, 'enrollment' => $enrollmentModel->id]) }}"
                                                    class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                                    style="background-color: #3b82f6">
                                                    <i class="bx bxs-show text-white"></i>
                                                </a>
                                            @else
                                                <span class="text-red-500 italic">Belum mengerjakan post test</span>
                                            @endif
                                        </td>
                                    </tr>
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
                                        <th
                                            class="w-8/12 sticky-col sticky-col-2 bg-white px-6 py-3 text-start text-base font-bold leading-4 tracking-wider text-black">
                                            Sertifikat
                                        </th>
                                        <th
                                            class="w-3/12 bg-white px-6 right-0 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- @foreach ($tests as $index => $test) --}}
                                    <tr class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-50 even:bg-white">
                                        <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                            Sertifikat
                                            {{-- @if (isset($certificate) && $certificate && $certificate->certificate_file)
                                                <br>
                                                <a href="{{ asset('storage/' . $certificate->certificate_file) }}"
                                                    target="_blank" class="text-blue-600 underline">Download Sertifikat
                                                    (PDF)</a>
                                            @endif --}}
                                        </td>
                                        <td class="whitespace-no-wrap flex items-center justify-center gap-2 px-6 py-4">
                                            <button type="button"
                                                class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                                style="background-color: #3b82f6" onclick="openDetailQuestionModal()">
                                                <i class="bx bxs-show text-white"></i>
                                            </button>
                                            <button type="button"
                                                class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                                style="background-color: #e9b306" onclick="openEditCertificateModal()">
                                                <i class="bx bxs-edit-alt text-white"></i>
                                            </button>
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
    <div id="editCertificateModal"
        class="fixed inset-0 z-10 flex hidden items-center justify-center bg-black bg-opacity-50">
        <div class="relative w-full max-w-xl rounded-xl bg-white p-6 text-center">
            <h3 class="mb-4 text-xl font-bold leading-6 text-black" id="modal-title">
                Ubah Sertifikat
            </h3>
            <form id="editSoalForm" method="POST"
                action="{{ route('dashboard.pengumpulan-tes.certificate.upload', ['user' => $userModel->id, 'enrollment' => $enrollmentModel->id]) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-5 mt-6 flex flex-col gap-4">
                    <div class="text-left">
                        <label class="text-lg">Upload Sertifikat (PDF)</label>
                        @if (isset($certificate) && $certificate && $certificate->certificate_file)
                            <div class="mb-2">
                                <a href="{{ asset('storage/' . $certificate->certificate_file) }}" target="_blank"
                                    class="text-blue-600 underline">Lihat Sertifikat Saat Ini</a>
                            </div>
                        @endif
                        <input type="file" name="certificate" id="certificateInput"
                            class="peer w-full rounded-lg border-2 border-gray-300 px-4 py-2 shadow-sm mb-1"
                            accept="application/pdf" required />
                        <small class="text-gray-500 block">
                            Hanya file PDF, maksimal 2MB.<br>
                        </small>
                    </div>
                </div>
                <div class="flex w-full justify-center gap-4">
                    <button type="button"
                        class="w-1/2 rounded-lg border border-[#3986A3] px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2"
                        onclick="closeEditCertificateModal()">Batal</button>
                    <button type="submit"
                        class="w-1/2 rounded-lg bg-[#3986A3] px-6 py-2 text-center text-white hover:bg-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Simpan</button>
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
                    <div class="mb-2 p-2 border border-gray-300 rounded-lg">
                        @if (isset($certificate) && $certificate && $certificate->certificate_file)
                            {{-- <a href="{{ asset('storage/' . $certificate->certificate_file) }}" target="_blank"
                                class="text-blue-600 underline block mb-2">Download Sertifikat (PDF)</a> --}}
                            <iframe src="{{ asset('storage/' . $certificate->certificate_file) }}" width="100%"
                                height="400px" style="border:1px solid #ccc;"></iframe>
                        @else
                            <span class="text-gray-500 italic">Belum ada sertifikat diunggah.</span>
                        @endif
                    </div>
                </div>
            </div>
            <button type="button"
                class="w-1/2 rounded-lg border border-[#3986A3] px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2"
                onclick="closeDetailQuestionModal()">Kembali</button>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function openEditCertificateModal() {
            document.getElementById('editCertificateModal').classList.remove('hidden');
            document.getElementById('editCertificateModal').classList.add('flex');
        }

        function closeEditCertificateModal() {
            document.getElementById('editCertificateModal').classList.add('hidden');
            document.getElementById('editCertificateModal').classList.remove('flex');
        }

        function openDetailQuestionModal() {
            document.getElementById('detailQuestionModal').classList.remove('hidden');
            document.getElementById('detailQuestionModal').classList.add('flex');
        }

        function closeDetailQuestionModal() {
            document.getElementById('detailQuestionModal').classList.add('hidden');
            document.getElementById('detailQuestionModal').classList.remove('flex');
        }

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
