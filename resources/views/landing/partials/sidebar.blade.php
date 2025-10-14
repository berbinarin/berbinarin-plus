<style>
    #sidebarBerbinar {
        transform: translateX(0);
    }
    #sidebarBerbinar.closed {
        transform: translateX(-110%);
    }
    #sidebarBerbinar.closed ~ #openSidebarBtn {
        display: block;
    }
</style>

<!-- Tombol buka sidebar (di luar sidebar, misal di layout utama) -->
<button id="openSidebarBtn" class="top-6 left-6 lg:ml-5 z-40 bg-[#3986A3] text-white px-3 py-2 rounded-full shadow-lg fixed lg:sticky lg:hidden">
    <i class="bx bx-menu text-2xl"></i>
</button>

<!-- Sidebar -->
<nav id="sidebarBerbinar" class="flex w-72 flex-col max-sm:shadow-xl bg-white py-8 pl-10 max-sm:fixed top-0 left-0 h-full z-50 transition-transform duration-300">
    <!-- Tombol tutup sidebar -->
    <button id="closeSidebarBtn" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
    {{-- LOGO BERBINAR --}}
    <div class="flex flex-row items-center justify-center">
        <img src="{{ asset("assets/images/landing/favicion/logo-berbinar.png") }}" alt="Logo Berbinar Insightful Indonesia" title="Logo Berbinar Insightful Indonesia" class="w-14" />
    </div>
    {{-- LIST MENU --}}
    <ul class="mt-10 overflow-y-auto overflow-x-hidden text-gray-700 dark:text-gray-400">
        <!-- Links -->
         <div class="mb-4">
             <h1 class="text-lg lg:text-2xl font-semibold leading-5 mb-4 lg:mb-2">Pre Test</h1>
             <a href="" class="flex flex-row items-center duration-700">
                 <span class="text-lg lg:text-lg leading-5">Pre Test - Graphic Design</span>
             </a>
         </div>

         <div class="mb-4">
            <h1 class="text-lg lg:text-2xl font-semibold leading-5 mb-4 lg:mb-2">Course Menu</h1>
            <a href="{{ route('materials.index') }}" class="flex flex-row items-center duration-700">
                <span class="text-lg lg:text-lg leading-5 mb-4 lg:mb-2">1. Perkenalan Dasar</span>
            </a>
            <a href="" class="flex flex-row items-center duration-700">
                <span class="text-lg lg:text-lg leading-5 mb-4 lg:mb-2">1. Perkenalan Dasar</span>
            </a>
            <a href="" class="flex flex-row items-center duration-700">
                <span class="text-lg lg:text-lg leading-5 mb-4 lg:mb-2">1. Perkenalan Dasar</span>
            </a>
            <a href="" class="flex flex-row items-center duration-700">
                <span class="text-lg lg:text-lg leading-5 mb-4 lg:mb-2">1. Perkenalan Dasar</span>
            </a>
            <a href="" class="flex flex-row items-center duration-700">
                <span class="text-lg lg:text-lg leading-5 mb-4 lg:mb-2">1. Perkenalan Dasar</span>
            </a>
            <a href="" class="flex flex-row items-center duration-700">
                <span class="text-lg lg:text-lg leading-5 mb-4 lg:mb-2">1. Perkenalan Dasar</span>
            </a>
            <a href="" class="flex flex-row items-center duration-700">
                <span class="text-lg lg:text-lg leading-5 mb-4 lg:mb-2">1. Perkenalan Dasar</span>
            </a>
            <a href="" class="flex flex-row items-center duration-700">
                <span class="text-lg lg:text-lg leading-5 mb-4 lg:mb-2">1. Perkenalan Dasar</span>
            </a>
            <a href="" class="flex flex-row items-center duration-700">
                <span class="text-lg lg:text-lg leading-5 mb-4 lg:mb-2">1. Perkenalan Dasar</span>
            </a>
            <a href="" class="flex flex-row items-center duration-700">
                <span class="text-lg lg:text-lg leading-5 mb-4 lg:mb-2">1. Perkenalan Dasar</span>
            </a>
            <a href="" class="flex flex-row items-center duration-700">
                <span class="text-lg lg:text-lg leading-5 mb-4 lg:mb-2">1. Perkenalan Dasar</span>
            </a>
         </div>

         <div class="mb-4">
             <h1 class="text-lg lg:text-2xl font-semibold leading-5 mb-4 lg:mb-2">Post Test</h1>
             <a href="" class="flex flex-row items-center duration-700">
                 <span class="text-lg lg:text-lg leading-5">Post Test - Graphic Design</span>
             </a>
         </div>

         <div class="mb-4">
             <h1 class="text-lg lg:text-2xl font-semibold leading-5 mb-4 lg:mb-2">Sertifikat</h1>
             <a href="{{ route('certificates.index') }}" class="flex flex-row items-center duration-700">
                 <span class="text-lg lg:text-lg leading-5">Download Sertifikat</span>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebarBerbinar');
    const openBtn = document.getElementById('openSidebarBtn');
    const closeBtn = document.getElementById('closeSidebarBtn');

    closeBtn.addEventListener('click', function () {
        sidebar.classList.add('closed');
        sidebar.classList.add('fixed');
        openBtn.classList.remove('lg:hidden');
    });

    openBtn.addEventListener('click', function () {
        sidebar.classList.remove('closed');
        sidebar.classList.remove('fixed');
        openBtn.classList.add('lg:hidden');
    });
});
</script>
