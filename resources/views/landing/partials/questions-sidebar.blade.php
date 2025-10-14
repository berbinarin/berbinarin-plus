<style>
    #sidebarBerbinar {
        transform: translateX(0);
    }

    #sidebarBerbinar.closed {
        transform: translateX(-100%);
    }

    #openSidebarBtn {
        display: none;
    }

    #sidebarBerbinar.closed~#openSidebarBtn {
        display: block;
    }

    @media (min-width: 1024px) {
        #sidebarBerbinar {
            left: auto;
            right: 0;
        }

        #openSidebarBtn {
            left: auto;
            right: 1.5rem;
            /* right-6 */
        }

        #sidebarBerbinar.closed {
            transform: translateX(100%);
        }

        #sidebarBerbinarMobile.closed {
            transform: translateX(100%);
        }
    }

    /* Efek transisi utama */
    #mainContent {
        transition: all 0.3s ease;
    }

    /* Saat sidebar terbuka */
    #mainContent.expand {
        margin-right: 18rem;
        /* sekitar 288px (pas untuk sidebar 72 / 18rem) */
    }

    /* Saat sidebar tertutup */
    #mainContent.shrink {
        margin-right: 0;
    }
</style>

<!-- Tombol buka sidebar (di luar sidebar, misal di layout utama) -->
<button id="openSidebarBtn"
    class="fixed top-6 left-6 lg:right-6 z-50 bg-[#3986A3] text-white px-3 py-2 rounded-full shadow-lg hidden">
    <i class="bx bx-menu text-2xl"></i>
</button>

<!-- Sidebar -->
<nav id="sidebarBerbinar"
    class="flex w-72 flex-col bg-white py-8 pl-10 pr-6 fixed top-0 left-0 lg:left-auto lg:right-0 h-full z-40 transition-transform duration-300">
    <!-- Tombol tutup sidebar -->
    <button id="closeSidebarBtn" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
    {{-- LOGO BERBINAR --}}
    <div class="flex flex-row items-center justify-center">
        <img src="{{ asset('assets/images/landing/favicion/logo-berbinar.png') }}"
            alt="Logo Berbinar Insightful Indonesia" title="Logo Berbinar Insightful Indonesia" class="w-14" />
    </div>
    {{-- LIST MENU --}}
    <ul class="mt-10 overflow-y-auto overflow-x-hidden text-gray-700 dark:text-gray-400">
        <!-- Links -->
        <div class="mb-4">
            <h1 class="text-lg lg:text-2xl font-semibold leading-5 mb-4">Navigasi Soal</h1>
            <div class="flex flex-wrap gap-2">
                <a href="#"
                    class="flex items-center justify-center w-8 h-8 rounded-lg border border-gray-500 text-black font-semibold text-lg lg:text-xl shadow hover:bg-gray-300 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    1
                </a>
                <a href="#"
                    class="flex items-center justify-center w-8 h-8 rounded-lg border border-gray-500 text-black font-semibold text-lg lg:text-xl shadow hover:bg-gray-300 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    2
                </a>
                <a href="#"
                    class="flex items-center justify-center w-8 h-8 rounded-lg border border-gray-500 text-black font-semibold text-lg lg:text-xl shadow hover:bg-gray-300 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    3
                </a>
            </div>
        </div>

        <li class="dark-hover:text-blue-300 mt-20 rounded-lg p-2">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit"
                    class="fixed bottom-5 left-14 items-center gap-2 rounded-full bg-blue-500 px-6 py-2 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <i class="bx bx-log-out text-lg"></i>
                    <span class="text-center text-base">Logout</span>
                </button>
            </form>
        </li>
    </ul>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebarBerbinar');
        const openBtn = document.getElementById('openSidebarBtn');
        const closeBtn = document.getElementById('closeSidebarBtn');
        const mainContent = document.getElementById('mainContent');


        closeBtn.addEventListener('click', function() {
            sidebar.classList.add('closed');
            openBtn.style.display = 'block';
        });

        openBtn.addEventListener('click', function() {
            sidebar.classList.remove('closed');
            openBtn.style.display = 'none';
        });

    });
</script>
