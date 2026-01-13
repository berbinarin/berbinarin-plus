<style>
    #sidebarBerbinar {
        transform: translateX(0);
    }

    #sidebarBerbinar.closed {
        transform: translateX(-110%);
    }

    #sidebarBerbinar.closed~#openSidebarBtn {
        display: block;
    }

    @media (max-width: 600px) {
        #sidebarBerbinar.mobile-closed {
            transform: translateX(-110%);
        }
    }

    /* In your main CSS file or within a @layer directive */
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: none;
        opacity: 0;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>

<!-- Tombol buka sidebar (di luar sidebar, misal di layout utama) -->
<button id="openSidebarBtn"
    class="top-6 left-6 lg:ml-5 z-40 bg-[#3986A3] text-white px-3 py-2 rounded-full shadow-lg fixed lg:sticky lg:hidden">
    <i class="bx bx-menu text-2xl"></i>
</button>

<!-- Sidebar -->
<nav id="sidebarBerbinar"
    class="flex w-72 flex-col max-sm:shadow-xl bg-white py-8 mobile-closed max-sm:fixed top-0 left-0 h-full z-50 transition-transform duration-300">
    <!-- Tombol tutup sidebar -->
    <button id="closeSidebarBtn" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
    {{-- LOGO BERBINAR --}}
    <div class="flex flex-row items-center justify-center">
        <img src="{{ asset('assets/images/landing/favicion/logo-berbinar.webp') }}"
            alt="Logo Berbinar Insightful Indonesia" title="Logo Berbinar Insightful Indonesia" class="w-14" />
    </div>
    {{-- LIST MENU --}}
    <ul class="mt-10 overflow-y-auto custom-scrollbar overflow-x-hidden text-gray-700 dark:text-gray-400">
        <!-- Links -->
        <div class="mb-4">
            <h1 class="text-xl lg:text-2xl font-semibold leading-5 pl-8 pr-2 mb-2">Pre Test</h1>
            <a href="{{ route('landing.pretest.index', ['class_id' => $class->id ?? 1]) }}"
                class="flex flex-row items-center justify-between duration-150 pl-8 pr-2 py-2 hover:bg-primary-alt {{ Request::routeIs('pretest.index') ? 'bg-primary text-white' : 'bg-gray-50' }}">
                <span class="text-lg lg:text-lg leading-5">Pre Test - {{ $class->name ?? '-' }}</span>
            </a>
        </div>

        {{-- Untuk Course Menu dan menu lainnya --}}
        <div class="mb-4">
            <h1 class="text-xl lg:text-2xl font-semibold leading-5 pl-8 pr-2 mb-2">Course Menu</h1>
            <div class="flex flex-col">
                @if (isset($class) && $class->sections && $class->sections->count())
                    @foreach ($class->sections as $i => $section)
                        <a href="{{ route('landing.home.materials', ['class_id' => $class->id, 'section_id' => $section->id]) }}"
                            class="flex flex-row items-center justify-between duration-150 pl-8 pr-2 py-2 hover:bg-primary-alt {{ isset($sectionActive) && $sectionActive == $section->id ? 'bg-primary text-white' : 'bg-gray-50' }}">
                            <span class="text-lg lg:text-lg leading-5">{{ $i + 1 }}.
                                {{ $section->title ?? '-' }}</span>
                        </a>
                    @endforeach
                @else
                    <span class="text-gray-500 italic pl-8">Belum ada materi.</span>
                @endif
            </div>
        </div>

        <div class="mb-4">
            <h1 class="text-xl lg:text-2xl font-semibold leading-5 pl-8 pr-2 mb-2">Post Test</h1>
            <!-- <a href="{{ route('landing.posttest.index') }}" class="flex flex-row items-center justify-between duration-150 pl-8 pr-2 py-2 hover:bg-primary-alt {{ Request::routeIs('posttest.index') ? 'bg-primary text-white' : 'bg-gray-50' }}"> -->
            <a id="showModalPostTest" href="#"
                class="flex flex-row items-center justify-between duration-150 pl-8 pr-2 py-2 hover:bg-primary-alt {{ Request::routeIs('posttest.index') ? 'bg-primary text-white' : 'bg-gray-50' }}">
                <span class="text-lg lg:text-lg leading-5">Post Test - Graphic Design</span>
                <i class="bx bxs-lock text-2xl text-primary"></i>
            </a>
        </div>

        <div class="mb-4">
            <h1 class="text-xl lg:text-2xl font-semibold leading-5 pl-8 pr-2 mb-2">Sertifikat</h1>
            <a href="{{ route('landing.home.certificates') }}"
                class="flex flex-row items-center justify-between duration-150 pl-8 pr-2 py-2 hover:bg-primary-alt {{ Request::routeIs('certificates.index') ? 'bg-primary text-white' : 'bg-gray-50' }}">
                <!-- <a id="showModalCertificates" href="#') }}" class="flex flex-row items-center justify-between duration-150 pl-8 pr-2 py-2 hover:bg-primary-alt {{ Request::routeIs('certificates.index') ? 'bg-primary text-white' : 'bg-gray-50' }}"> -->
                <span class="text-lg lg:text-lg leading-5">Download Sertifikat</span>
                <i class="bx bxs-lock text-2xl text-primary"></i>
            </a>
        </div>

        <!-- <li class="dark-hover:text-blue-300 mt-20 rounded-lg p-2">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="fixed bottom-5 left-14 items-center gap-2 rounded-full bg-blue-500 px-6 py-2 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <i class="bx bx-log-out text-lg"></i>
                    <span class="text-center text-base">Logout</span>
                </button>
            </form>
        </li> -->
    </ul>
</nav>

{{-- catatan, ini ada beberapa versi untuk menu menu yang kekunci, jadi kurang lebih di antara beberapa versi cuma beda judul saja --}}

<!-- Modal Kunci Materi -->
<div id="confirmModalMaterials" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
    <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg"
        style="background: linear-gradient(to right, #BD7979, #BD7979) top/100% 6px no-repeat, white; border-radius: 20px;background-clip: padding-box, border-box;">
        <!-- Error Icon -->
        <img src="{{ asset('assets/images/dashboard/error.webp') }}" alt="Error Icon"
            class="mx-auto h-[83px] w-[83px]" />

        <!-- Title -->
        <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">Oops! Materi ini terkunci!</h2>

        <!-- Message -->
        <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">Tuntaskan dulu materi sebelumnya, biar
            progres belajarmu makin mantap.</p>

        <!-- Actions -->
        <div class="mt-3 lg:mt-6 flex justify-center gap-3">
            <button type="button" id="cancelModalMaterials"
                class="w-1/3 rounded-lg bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-3 lg:px-6 py-2 font-medium text-white">Ok</button>
        </div>
    </div>
</div>

<!-- Modal Kunci Post Test -->
<div id="confirmModalPostTest" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
    <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg"
        style="background: linear-gradient(to right, #BD7979, #BD7979) top/100% 6px no-repeat, white; border-radius: 20px;background-clip: padding-box, border-box;">
        <!-- Error Icon -->
        <img src="{{ asset('assets/images/dashboard/error.webp') }}" alt="Error Icon"
            class="mx-auto h-[83px] w-[83px]" />

        <!-- Title -->
        <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">Oops! Post Test ini terkunci!</h2>

        <!-- Message -->
        <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">Tuntaskan dulu materi sebelumnya, biar
            progres belajarmu makin mantap.</p>

        <!-- Actions -->
        <div class="mt-3 lg:mt-6 flex justify-center gap-3">
            <button type="button" id="cancelModalPostTest"
                class="w-1/3 rounded-lg bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-3 lg:px-6 py-2 font-medium text-white">Ok</button>
        </div>
    </div>
</div>

<!-- Modal Kunci Sertifikat -->
<div id="confirmModalCertificates" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/40">
    <div class="relative w-[90%] lg:w-[560px] rounded-[20px] bg-white p-3 lg:p-6 text-center font-plusJakartaSans shadow-lg"
        style="background: linear-gradient(to right, #BD7979, #BD7979) top/100% 6px no-repeat, white; border-radius: 20px;background-clip: padding-box, border-box;">
        <!-- Error Icon -->
        <img src="{{ asset('assets/images/dashboard/error.webp') }}" alt="Error Icon"
            class="mx-auto h-[83px] w-[83px]" />

        <!-- Title -->
        <h2 class="mt-2 lg:mt-4 text-lg lg:text-2xl font-bold text-stone-900">Oops! Sertifikat ini terkunci!</h2>

        <!-- Message -->
        <p class="mt-1 lg:mt-2 text-sm lg:text-base font-medium text-black">Tuntaskan dulu materi sebelumnya, biar
            progres belajarmu makin mantap.</p>

        <!-- Actions -->
        <div class="mt-3 lg:mt-6 flex justify-center gap-3">
            <button type="button" id="cancelModalCertificates"
                class="w-1/3 rounded-lg bg-gradient-to-r from-[#74AABF] to-[#3986A3] px-3 lg:px-6 py-2 font-medium text-white">Ok</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebarBerbinar');
        const openBtn = document.getElementById('openSidebarBtn');
        const closeBtn = document.getElementById('closeSidebarBtn');

        closeBtn.addEventListener('click', function() {
            sidebar.classList.add('closed');
            sidebar.classList.add('fixed');
            openBtn.classList.remove('lg:hidden');
        });

        openBtn.addEventListener('click', function() {
            sidebar.classList.remove('closed');
            sidebar.classList.remove('fixed');
            sidebar.classList.remove('mobile-closed');
            openBtn.classList.add('lg:hidden');
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const showModalsMaterials = document.querySelectorAll('[id="showModalMaterials"]');
        const confirmModalMaterials = document.getElementById('confirmModalMaterials');
        const cancelModalMaterials = document.getElementById('cancelModalMaterials');

        if (showModalsMaterials.length) {
            showModalsMaterials.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (confirmModalMaterials) confirmModalMaterials.classList.remove('hidden');
                });
            });
        }

        if (cancelModalMaterials) {
            cancelModalMaterials.addEventListener('click', function() {
                if (confirmModalMaterials) confirmModalMaterials.classList.add('hidden');
            });
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const showModalsPostTest = document.querySelectorAll('[id="showModalPostTest"]');
        const confirmModalPostTest = document.getElementById('confirmModalPostTest');
        const cancelModalPostTest = document.getElementById('cancelModalPostTest');

        if (showModalsPostTest.length) {
            showModalsPostTest.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (confirmModalPostTest) confirmModalPostTest.classList.remove('hidden');
                });
            });
        }

        if (cancelModalPostTest) {
            cancelModalPostTest.addEventListener('click', function() {
                if (confirmModalPostTest) confirmModalPostTest.classList.add('hidden');
            });
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const showModalsCertificates = document.querySelectorAll('[id="showModalCertificates"]');
        const confirmModalCertificates = document.getElementById('confirmModalCertificates');
        const cancelModalCertificates = document.getElementById('cancelModalCertificates');

        if (showModalsCertificates.length) {
            showModalsCertificates.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (confirmModalCertificates) confirmModalCertificates.classList.remove(
                        'hidden');
                });
            });
        }

        if (cancelModalCertificates) {
            cancelModalCertificates.addEventListener('click', function() {
                if (confirmModalCertificates) confirmModalCertificates.classList.add('hidden');
            });
        }
    });
</script>
