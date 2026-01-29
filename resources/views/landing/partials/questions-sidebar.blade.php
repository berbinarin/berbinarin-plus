<style>
    #sidebarBerbinar {
        transform: translateX(0);
    }

    #sidebarBerbinar.closed {
        transform: translateX(110%);
    }

    @media (max-width: 600px) {
        #sidebarBerbinar.mobile-closed {
            transform: translateX(110%);
        }
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
</style>

<!-- Tombol buka sidebar (di luar sidebar, misal di layout utama) -->
<button id="openSidebarBtn"
    class="fixed lg:sticky top-6 right-6 lg:mr-5 z-40 bg-[#3986A3] text-white px-3 py-2 rounded-full shadow-lg lg:hidden">
    <i class="bx bx-menu text-2xl"></i>
</button>

<!-- Sidebar -->
<nav id="sidebarBerbinar"
    class="flex w-72 flex-col bg-white py-8 px-5 max-sm:shadow-xl mobile-closed max-sm:fixed top-0 right-0 h-full z-50 transition-transform duration-300">
    <!-- Tombol tutup sidebar -->
    <button id="closeSidebarBtn" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
    {{-- LOGO BERBINAR --}}
    <div class="flex flex-row items-center justify-center">
        <img src="{{ asset('assets/images/landing/favicion/logo-berbinar.webp') }}"
            alt="Logo Berbinar Insightful Indonesia" title="Logo Berbinar Insightful Indonesia" class="w-14" />
    </div>
    {{-- LIST MENU --}}
    <ul class="mt-10 overflow-y-auto overflow-x-hidden text-gray-700 dark:text-gray-400">
        <!-- Links -->
        <div class="mb-4">
            <h1 class="text-lg lg:text-2xl font-semibold leading-5 mb-4">Navigasi Soal</h1>
            <div class="flex flex-wrap gap-2 px-1">
                @if (isset($pretest) && $pretest->questions->count())
                    @foreach ($pretest->questions as $i => $q)
                        <a href="{{ route('landing.pretest.question', ['class_id' => $class->id ?? 1, 'number' => $i + 1]) }}"
                            class="flex items-center justify-center w-8 h-8 rounded-lg border {{ ($number ?? 1) == $i + 1 ? 'bg-[#3986A3] text-white' : 'bg-[#BAD5DF] text-black' }} border-gray-500 text-lg shadow hover:bg-gray-300 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            {{ $i + 1 }}
                        </a>
                    @endforeach
                @endif
                @if (isset($posttest) && $posttest->questions->count())
                    @foreach ($posttest->questions as $i => $q)
                        <a href="{{ route('landing.posttest.question', ['class_id' => $class->id ?? 1, 'number' => $i + 1]) }}"
                            class="flex items-center justify-center w-8 h-8 rounded-lg border {{ ($number ?? 1) == $i + 1 ? 'bg-[#3986A3] text-white' : 'bg-[#BAD5DF] text-black' }} border-gray-500 text-lg shadow hover:bg-gray-300 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            {{ $i + 1 }}
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </ul>
</nav>

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
            sidebar.classList.remove('mobile-closed');
            sidebar.classList.remove('fixed');
            openBtn.classList.add('lg:hidden');
        });
    });
</script>
