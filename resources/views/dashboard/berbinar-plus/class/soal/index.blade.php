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
                            <a href="{{ route('dashboard.kelas.index') }}">
                                <img src="{{ asset('assets/images/dashboard/svg-icon/dashboard-back.webp') }}" alt="Back Btn" />
                            </a>
                            <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">Daftar Soal</p>
                        </div>
                        <p class="w-full text-disabled">
                            Halaman untuk menambahkan atau mengubah soal baru ke dalam program Berbinar+ secara rinci, beserta detail soal, dan jawaban.
                        </p>
                        <a href="javascript:void(0);" onclick="openCreateQuestionModal()" class="mt-8 inline-flex items-start justify-start rounded-lg bg-primary px-6 py-3 text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-3">
                            <p class="text-dark font-medium leading-none">Tambah Data</p>
                        </a>
                    </div>
                </div>
                <div class="flex w-full space-x-4">
                    <div class="rounded-lg bg-white w-full shadow-md px-4 py-4 md:px-8 md:py-7 xl:px-10 mb-7">
                        <div class="mb-4 mt-4 overflow-x-hidden">

                            <table id="example" class="display min-w-full pt-5 leading-normal">
                                <thead>
                                    <tr class="mt-4">
                                        <th class="w-1/12 sticky-col sticky-col-1 bg-white px-6 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            No
                                        </th>
                                        <th class="w-4/12 sticky-col sticky-col-2 bg-white px-6 py-3 text-start text-base font-bold leading-4 tracking-wider text-black">
                                            Tipe Soal
                                        </th>
                                        <th class="w-4/12 sticky-col sticky-col-2 bg-white px-6 py-3 text-start text-base font-bold leading-4 tracking-wider text-black">
                                            Pertanyaan
                                        </th>
                                        <th class="w-3/12 bg-white px-6 right-0 py-3 text-center text-base font-bold leading-4 tracking-wider text-black">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- @foreach ($classes as $index => $class) --}}
                                        <tr class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-50 even:bg-white">
                                            <td class="whitespace-no-wrap text-center sticky-col sticky-col-1 px-6 py-4">
                                                {{-- {{ $index + 1 }} --}} 1
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                                {{-- {{ $class->name }} --}} Pilihan Ganda
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                                {{-- {{ $class->name }} --}} Pertanyaan 1
                                            </td>
                                            <td class="whitespace-no-wrap flex items-center justify-center gap-2 px-6 py-4">
                                                <a href="javascript:void(0);" onclick="openDetailQuestionModal()" class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #3b82f6">
                                                    <i class="bx bxs-show text-white"></i>
                                                </a>
                                                <a href="javascript:void(0);" onclick="openEditQuestionModal()" class="inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #e9b306">
                                                    <i class="bx bxs-edit-alt text-white"></i>
                                                </a>
                                                <button type="button" onclick="openDeleteModal({{-- {{ $class->id }} --}})" class="inline-flex items-start justify-start rounded p-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #ef4444">
                                                    <i class="bx bxs-trash-alt text-white"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-50 even:bg-white">
                                            <td class="whitespace-no-wrap text-center sticky-col sticky-col-1 px-6 py-4">
                                                {{-- {{ $index + 1 }} --}} 2
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                                {{-- {{ $class->name }} --}} Pilihan Ganda
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                                {{-- {{ $class->name }} --}} Pertanyaan 2
                                            </td>
                                            <td class="whitespace-no-wrap flex items-center justify-center gap-2 px-6 py-4">
                                                <a href="javascript:void(0);" onclick="openDetailQuestionModal()" class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #3b82f6">
                                                    <i class="bx bxs-show text-white"></i>
                                                </a>
                                                <a href="javascript:void(0);" onclick="openEditQuestionModal()" class="inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #e9b306">
                                                    <i class="bx bxs-edit-alt text-white"></i>
                                                </a>
                                                <button type="button" onclick="openDeleteModal({{-- {{ $class->id }} --}})" class="inline-flex items-start justify-start rounded p-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #ef4444">
                                                    <i class="bx bxs-trash-alt text-white"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr class="border-b border-gray-200 hover:bg-gray-200 odd:bg-gray-50 even:bg-white">
                                            <td class="whitespace-no-wrap text-center sticky-col sticky-col-1 px-6 py-4">
                                                {{-- {{ $index + 1 }} --}} 3
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                                {{-- {{ $class->name }} --}} Isian Singkat
                                            </td>
                                            <td class="whitespace-no-wrap sticky-col sticky-col-2 px-6 py-4">
                                                {{-- {{ $class->name }} --}} Pertanyaan 3
                                            </td>
                                            <td class="whitespace-no-wrap flex items-center justify-center gap-2 px-6 py-4">
                                                <a href="javascript:void(0);" onclick="openDetailQuestionModal()" class="inline-flex items-start justify-start rounded p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #3b82f6">
                                                    <i class="bx bxs-show text-white"></i>
                                                </a>
                                                <a href="javascript:void(0);" onclick="openEditQuestionModal()" class="inline-flex items-start justify-start rounded p-2 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #e9b306">
                                                    <i class="bx bxs-edit-alt text-white"></i>
                                                </a>
                                                <button type="button" onclick="openDeleteModal({{-- {{ $class->id }} --}})" class="inline-flex items-start justify-start rounded p-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background-color: #ef4444">
                                                    <i class="bx bxs-trash-alt text-white"></i>
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

    <!-- Question's Create Modal -->
    <div id="createQuestionModal" class="fixed inset-0 z-10 flex hidden items-center justify-center bg-black bg-opacity-50">
        <div class="relative w-full max-w-xl rounded-xl bg-white p-6 text-center">
            <h3 class="mb-4 text-xl font-bold leading-6 text-black" id="modal-title">
                Tambah Soal Pre Test
            </h3>
            <form id="createSoalForm" method="GET" action="{{ route("dashboard.kelas.soal.index") }}">
                @csrf
                <div class="mb-5 mt-6 flex flex-col gap-4">
                    <div class="text-left">
                        <label class="mb-1 block font-medium text-gray-600">Tipe Soal</label>
                        <select id="type" name="type" class="w-full rounded-lg border border-gray-300 px-3 py-2" required>
                            <option value="multiple_choice">Pilihan Ganda</option>
                            <option value="short_answer">Jawaban Singkat</option>
                        </select>
                    </div>
                    <div class="text-left">
                        <label class="mb-1 block font-medium text-gray-600">Pertanyaan</label>
                        <input type="text" id="question" name="question" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Berapa hasil dari 2 + 5?" required />
                    </div>
                    <div id="multipleChoiceSection" class="max-h-52 overflow-y-auto">
                        <div class="text-left">
                            <div class="mb-6 mt-2 flex cursor-pointer items-center justify-center rounded-lg border border-dashed border-blue-500 py-2 text-blue-500" id="addOptionButton">
                                <h1 class="flex items-center gap-2">
                                    <i class="bx bx-plus-circle"></i>
                                    Tambahkan pilihan
                                </h1>
                            </div>
                            <div id="pilihanContainer"></div>
                        </div>
                    </div>
                    <div id="shortAnswerSection" class="hidden max-h-52 overflow-y-auto">
                        <label class="mb-1 block font-medium text-gray-600">Jawaban Uraian</label>
                        <input type="text" name="correct_answer" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Jawaban uraian..." />
                    </div>
                </div>
                <div class="flex w-full justify-center gap-4">
                    <button type="button" class="w-1/2 rounded-lg border border-[#3986A3] px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeCreateQuestionModal()">Batal</button>
                    <button type="submit" class="w-1/2 rounded-lg bg-[#3986A3] px-6 py-2 text-center text-white hover:bg-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Question's Edit Modal -->
    <div id="editQuestionModal" class="fixed inset-0 z-10 flex hidden items-center justify-center bg-black bg-opacity-50">
        <div class="relative w-full max-w-xl rounded-xl bg-white p-6 text-center">
            <h3 class="mb-4 text-xl font-bold leading-6 text-black" id="modal-title">
                Ubah Soal Pre Test
            </h3>
            <form id="editSoalForm" method="POST" action="">
                @csrf
                @method("PUT")
                <div class="mb-5 mt-6 flex flex-col gap-4">
                    <div class="text-left">
                        <label class="mb-1 block font-medium text-gray-600">Tipe Soal</label>
                        <select id="edit_type" name="type" class="w-full rounded-lg border border-gray-300 px-3 py-2" required>
                            <option value="multiple_choice">Pilihan Ganda</option>
                            <option value="short_answer">Jawaban Singkat</option>
                        </select>
                    </div>
                    <div class="text-left">
                        <label class="mb-1 block font-medium text-gray-600">Pertanyaan</label>
                        <input type="text" id="edit_question" name="question" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Berapa hasil dari 2 + 5?" required />
                    </div>
                    <div id="editMultipleChoiceSection" class="max-h-52 overflow-y-auto">
                        <div class="text-left">
                            <div class="mb-6 mt-2 flex cursor-pointer items-center justify-center rounded-lg border border-dashed border-blue-500 py-2 text-blue-500" id="editAddOptionButton">
                                <h1 class="flex items-center gap-2">
                                    <i class="bx bx-plus-circle"></i>
                                    Tambahkan pilihan
                                </h1>
                            </div>
                            <div id="editPilihanContainer"></div>
                        </div>
                    </div>
                    <div id="editShortAnswerSection" class="hidden max-h-52 overflow-y-auto">
                        <label class="mb-1 block font-medium text-gray-600">Jawaban Uraian</label>
                        <input type="text" name="correct_answer" class="w-full rounded-lg border border-gray-300 px-3 py-2" placeholder="Jawaban uraian..." />
                    </div>
                </div>
                <div class="flex w-full justify-center gap-4">
                    <button type="button" class="w-1/2 rounded-lg border border-[#3986A3] px-6 py-2 text-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2" onclick="closeEditQuestionModal()">Batal</button>
                    <button type="submit" class="w-1/2 rounded-lg bg-[#3986A3] px-6 py-2 text-center text-white hover:bg-[#3986A3] focus:outline-none focus:ring-2 focus:ring-[#3986A3] focus:ring-offset-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Question's Detail Modal -->
    <div id="detailQuestionModal" class="fixed inset-0 z-10 flex hidden items-center justify-center bg-black bg-opacity-50">
        <div class="relative w-full max-w-xl rounded-xl bg-white p-6 text-center">
            <h3 class="mb-4 text-xl font-bold leading-6 text-black">
                Detail Soal Pre Test
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

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
        <div class="relative w-[360px] md:w-[560px] rounded-[20px] bg-white p-6 text-center font-plusJakartaSans shadow-lg" style="background: linear-gradient(to right, #74aabf, #3986a3) top/100% 6px no-repeat, white; border-radius: 20px; background-clip: padding-box, border-box;">
            <!-- Warning Icon -->
            <img src="{{ asset('assets/images/dashboard/warning.webp') }}" alt="Warning Icon"
                class="mx-auto h-[83px] w-[83px]" />

            <!-- Title -->
            <h2 class="mt-4 text-2xl font-bold text-stone-900">Konfirmasi Hapus</h2>

            <!-- Message -->
            <p class="mt-2 text-base font-medium text-black">Apakah Anda yakin ingin menghapus kelas ini? Semua data terkait
                juga akan dihapus.</p>

            <!-- Actions -->
            <div class="mt-6 flex justify-center gap-3">
                <button type="button" id="cancelDelete" class="rounded-lg border border-stone-300 px-6 py-2 text-stone-700">Tidak</button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-[5px] bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-6 py-2 font-medium text-white">
                        Ya
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let deleteModal = document.getElementById('deleteModal');
        let deleteForm = document.getElementById('deleteForm');
        let cancelDelete = document.getElementById('cancelDelete');

        function openDeleteModal(classId) {
            deleteForm.action = `/dashboard/kelas/${classId}`;
            deleteModal.classList.remove('hidden');
        }

        if (cancelDelete) {
            cancelDelete.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });
        }
    </script>

        <script>
        function openCreateQuestionModal() {
            document.getElementById('createQuestionModal').classList.remove('hidden');
        }
        function closeCreateQuestionModal() {
            document.getElementById('createQuestionModal').classList.add('hidden');
            document.getElementById('createSoalForm').reset();
        }
    </script>

    {{-- Modal Create --}}
    <script>
        let abjadPool = ['A', 'B', 'C', 'D'];
        let usedAbjad = [];

        const pilihanContainer = document.getElementById('pilihanContainer');
        const addOptionButton = document.getElementById('addOptionButton');

        addOptionButton.addEventListener('click', function () {
            // Cari abjad pertama yang belum dipakai
            const abjad = abjadPool.find((a) => !usedAbjad.includes(a));
            if (!abjad) return; // Jika abjad habis

            usedAbjad.push(abjad);

            const pilihanDiv = document.createElement('div');
            pilihanDiv.className = 'flex items-center gap-2 mb-2';
            pilihanDiv.setAttribute('data-abjad', abjad);

            pilihanDiv.innerHTML = `
                <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">${abjad}.</div>
                <input type="text" name="options[${abjad}][jawaban]" class="w-2/3 rounded-lg border border-gray-300 px-3 py-2" placeholder="Jawaban pilihan ${abjad}" required>
                <select name="options[${abjad}][status]" class="rounded-lg appearance-none bg-none border border-gray-300 px-2 py-2">
                    <option value="benar">Benar</option>
                    <option value="salah">Salah</option>
                </select>
                <button type="button" class="bg-[#ECE6F0] rounded-lg w-1/12 h-auto pb-2 text-center align-top text-gray-500 font-bold px-2 text-2xl deleteOptionBtn">×</button>
            `;
            pilihanContainer.appendChild(pilihanDiv);

            // Event hapus
            pilihanDiv.querySelector('.deleteOptionBtn').addEventListener('click', function () {
                const abjadHapus = pilihanDiv.getAttribute('data-abjad');
                usedAbjad = usedAbjad.filter((a) => a !== abjadHapus);
                pilihanDiv.remove();
            });
        });
    </script>

    <script>
        const typeSelect = document.getElementById('type');
        const multipleChoiceSection = document.getElementById('multipleChoiceSection');
        const shortAnswerSection = document.getElementById('shortAnswerSection');

        typeSelect.addEventListener('change', function () {
            if (this.value === 'short_answer') {
                multipleChoiceSection.classList.add('hidden');
                shortAnswerSection.classList.remove('hidden');
            } else {
                multipleChoiceSection.classList.remove('hidden');
                shortAnswerSection.classList.add('hidden');
            }
        });
    </script>

    {{-- Modal Edit --}}
    <script>
        let editAbjadPool = ['A', 'B', 'C', 'D'];
        let editUsedAbjad = [];

        const editPilihanContainer = document.getElementById('editPilihanContainer');
        const editAddOptionButton = document.getElementById('editAddOptionButton');

        editAddOptionButton.addEventListener('click', function () {
            const abjad = editAbjadPool.find((a) => !editUsedAbjad.includes(a));
            if (!abjad) return;
            editUsedAbjad.push(abjad);

            const pilihanDiv = document.createElement('div');
            pilihanDiv.className = 'flex items-center gap-2 mb-2';
            pilihanDiv.setAttribute('data-abjad', abjad);

            pilihanDiv.innerHTML = `
                <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">${abjad}.</div>
                <input type="text" name="options[${abjad}][jawaban]" class="w-2/3 rounded-lg border border-gray-300 px-3 py-2" placeholder="Jawaban pilihan ${abjad}" required>
                <select name="options[${abjad}][status]" class="rounded-lg appearance-none bg-none border border-gray-300 px-2 py-2">
                    <option value="benar">Benar</option>
                    <option value="salah">Salah</option>
                </select>
                <button type="button" class="bg-[#ECE6F0] rounded-lg w-1/12 h-auto pb-2 text-center align-top text-gray-500 font-bold px-2 text-2xl deleteOptionBtn">×</button>
            `;
            editPilihanContainer.appendChild(pilihanDiv);

            pilihanDiv.querySelector('.deleteOptionBtn').addEventListener('click', function () {
                const abjadHapus = pilihanDiv.getAttribute('data-abjad');
                editUsedAbjad = editUsedAbjad.filter((a) => a !== abjadHapus);
                pilihanDiv.remove();
            });
        });

        function closeEditQuestionModal() {
            document.getElementById('editQuestionModal').classList.add('hidden');
            document.getElementById('editSoalForm').reset();
            editPilihanContainer.innerHTML = '';
            editUsedAbjad = [];
        }
    </script>

    <script>
        // Ambil elemen pada modal edit
        const editTipeSelect = document.getElementById('edit_type');
        const editPilihanGandaSection = document.querySelector('#editQuestionModal #editMultipleChoiceSection');
        const editUraianSection = document.querySelector('#editQuestionModal #editShortAnswerSection');

        editTipeSelect.addEventListener('change', function () {
            if (this.value === 'short_answer') {
                editPilihanGandaSection.classList.add('hidden');
                editUraianSection.classList.remove('hidden');
            } else {
                editPilihanGandaSection.classList.remove('hidden');
                editUraianSection.classList.add('hidden');
            }
        });

        // Jika ingin langsung menyesuaikan saat modal dibuka (misal dari data edit)
        function openEditQuestionModal(soal) {
            document.getElementById('editQuestionModal').classList.remove('hidden');
            document.getElementById('editSoalForm').action = soal.action_url;
            document.getElementById('edit_type').value = soal.type;
            document.getElementById('edit_question').value = soal.question;

            // Tampilkan/hide section sesuai type
            if (soal.type === 'short_answer') {
                editPilihanGandaSection.classList.add('hidden');
                editUraianSection.classList.remove('hidden');
                // Isi jawaban short_answer jika ada
                editUraianSection.querySelector('input[name="correct_answer"]').value = soal.scoring?.correct_answer || '';
            } else {
                editPilihanGandaSection.classList.remove('hidden');
                editUraianSection.classList.add('hidden');
            }

            // Reset options ganda
            editPilihanContainer.innerHTML = '';
            editUsedAbjad = [];

            if (soal.options && Array.isArray(soal.options)) {
                soal.options.forEach(function (options) {
                    const abjad = options.key;
                    const jawaban = options.text;
                    const status = options.key === soal.scoring.correct_answer ? 'benar' : 'salah';

                    editUsedAbjad.push(abjad);

                    const pilihanDiv = document.createElement('div');
                    pilihanDiv.className = 'flex items-center gap-2 mb-2';
                    pilihanDiv.setAttribute('data-abjad', abjad);

                    pilihanDiv.innerHTML = `
                        <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">${abjad}.</div>
                        <input type="text" name="options[${abjad}][jawaban]" class="w-2/3 rounded-lg border border-gray-300 px-3 py-2" value="${options.text}" required>
                        <select name="options[${abjad}][status]" class="rounded-lg appearance-none bg-none border border-gray-300 px-2 py-2">
                            <option value="benar" ${status === 'benar' ? 'selected' : ''}>Benar</option>
                            <option value="salah" ${status === 'salah' ? 'selected' : ''}>Salah</option>
                        </select>
                        <button type="button" class="bg-[#ECE6F0] rounded-lg w-1/12 h-auto pb-2 text-center align-top text-gray-500 font-bold px-2 text-2xl deleteOptionBtn">×</button>
                    `;
                    editPilihanContainer.appendChild(pilihanDiv);

                    pilihanDiv.querySelector('.deleteOptionBtn').addEventListener('click', function () {
                        const abjadHapus = pilihanDiv.getAttribute('data-abjad');
                        editUsedAbjad = editUsedAbjad.filter((a) => a !== abjadHapus);
                        pilihanDiv.remove();
                    });
                });
            }
        }
    </script>

    {{-- Modal Detail --}}
    <script>
        function openDetailQuestionModal() {
            document.getElementById('detailQuestionModal').classList.remove('hidden');
        }
        function closeDetailQuestionModal() {
            document.getElementById('detailQuestionModal').classList.add('hidden');
        }
    </script>

    <script>
        function openDetailSoalModal(soal) {
            document.getElementById('detailQuestionModal').classList.remove('hidden');

            // Isi type soal dan pertanyaan
            const typeSelect = document.querySelector('#detailQuestionModal select');
            typeSelect.value = soal.type; // pake 'type', bukan 'type'

            const questionInput = document.querySelector('#detailQuestionModal input[type="text"]');
            questionInput.value = soal.text; // pake 'text', bukan 'question'

            // Isi pilihan jawaban
            const pilihanWrapper = document.getElementById('pilihanWrapper');
            const pilihanContainer = document.getElementById('detailPilihanContainer');
            const shortAnswerContainer = document.getElementById('shortAnswerContainer');
            const shortAnswerText = document.getElementById('shortAnswerText');

            // reset tampilan
            pilihanWrapper.style.display = 'none';
            shortAnswerContainer.style.display = 'none';
            pilihanContainer.innerHTML = '';
            shortAnswerText.textContent = '';

            if (soal.type === 'multiple_choice' && soal.options && Array.isArray(soal.options)) {
                pilihanWrapper.style.display = 'block';
                soal.options.forEach(function (options) {
                    const abjad = options.key;
                    const jawaban = options.text;
                    const status = options.key === soal.scoring.correct_answer ? 'benar' : 'salah';

                    const dropdownClass = status === 'benar' ? 'bg-green-500 text-white' : 'bg-red-500 text-white';

                    const pilihanDiv = document.createElement('div');
                    pilihanDiv.className = 'flex items-center gap-2 mb-2';

                    pilihanDiv.innerHTML = `
                        <div class="font-bold w-1/12 h-auto py-2 bg-primary rounded-lg text-white text-center">${abjad}.</div>
                        <input type="text" class="w-4/5 rounded-lg border border-gray-300 px-3 py-2 bg-gray-100" value="${jawaban}" readonly>
                        <select class="rounded-lg border appearance-none bg-none border-gray-300 px-2 py-2 ${dropdownClass}" disabled>
                            <option value="benar" ${status === 'benar' ? 'selected' : ''}>Benar</option>
                            <option value="salah" ${status === 'salah' ? 'selected' : ''}>Salah</option>
                        </select>
                    `;
                    pilihanContainer.appendChild(pilihanDiv);
                });
            } else if (soal.type === 'short_answer') {
                shortAnswerContainer.style.display = 'block';
                shortAnswerText.textContent = soal.scoring?.correct_answer || '-';
            }
        }
    </script>
@endsection
