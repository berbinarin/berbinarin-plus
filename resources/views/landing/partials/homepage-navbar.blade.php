
<!-- Navbar -->
<nav class="sticky left-0 right-0 top-0 z-50 flex items-center bg-white bg-opacity-90 px-4 py-3 backdrop-blur-sm max-sm:px-4 max-sm:py-2">
    <!-- Logo -->
    <a href="{{ route('landing.home.index') }}" class="flex items-center gap-2">
        <img src="{{ asset("assets/images/landing/favicion/logo-berbinar.webp") }}" alt="Logo" class="h-10 w-auto max-sm:h-8" />
        <h1 class="text-lg max-sm:hidden">Berbinar+</h1>
    </a>

    <!-- Navigasi Link -->
    <div id="navLinks" class="ml-auto items-center space-x-2 lg:space-x-6 flex">
        <div class="relative">
            <button id="notificationButton" type="button" aria-controls="notificationModal" aria-expanded="false" class="relative focus:outline-none">
                <img src="{{ asset("assets/images/landing/favicion/notification.webp") }}" alt="Notifications" class="h-8 w-auto max-sm:h-6">
                <span class="absolute bg-[#3986A3] w-3 h-3 lg:w-3.5 lg:h-3.5 rounded-full -translate-y-6 lg:-translate-y-8 text-white text-[8px] lg:text-[10px] text-center">4</span>
            </button>
        </div>
        <a href="{{ route('landing.home.profile') }}" class="flex flex-row gap-3">
            <img src="{{ asset("assets/images/landing/favicion/profile-placeholder.webp") }}" alt="" class="h-10 rounded-full w-auto max-sm:h-8">
            <p class="items-center truncate font-medium hidden">John Doe</p>
        </a>
    </div>
</nav>

<!-- Notification Modal -->
<div id="notificationModal" class="fixed inset-0 z-50 hidden items-center flex-col justify-start lg:flex-row lg:justify-end">
    <!-- <div id="notificationOverlay" class="absolute inset-0 bg-black/50"></div> -->
    <div class="absolute w-11/12 lg:w-1/4 lg:right-4 mt-12 top-0 max-w-md mx-auto bg-white rounded-xl shadow-lg p-4">
        <div class="flex items-start justify-between mb-3">
            <h3 class="text-lg font-medium">Notifikasi</h3>
            <button id="closeNotification" class="text-2xl leading-none text-gray-600 hover:text-gray-800">&times;</button>
        </div>
        <hr class="border border-gray-300">
        <ul class="divide-y divide-gray-200 max-h-64 lg:max-h-96 overflow-y-auto">
            <li class="py-3 flex flex-row gap-2">
                <img src="{{ asset("assets/images/landing/favicion/logo-berbinar.webp") }}" alt="Logo" class="h-12 mt-1 w-auto max-sm:h-8" />
                <div>
                    <p class="text-sm font-medium">Halo Tiarasyifa! 🎓</p>
                    <p class="text-sm text-gray-500">Sertifikatmu sudah tersedia! Ayo unduh sekarang.</p>
                    <p class="text-xs text-gray-500">1 day ago</p>
                    <button class="bg-primary/10 border border-primary text-primary text-sm px-1 py-0.5 rounded mt-2 flex flex-row items-center"><p>Unduh Sertifikat</p> <i class="bx bx-right-arrow-alt text-base"></i></button>
                </div>
            </li>
            <li class="py-3 flex flex-row gap-2">
                <img src="{{ asset("assets/images/landing/favicion/logo-berbinar.webp") }}" alt="Logo" class="h-12 mt-1 w-auto max-sm:h-8" />
                <div>
                    <p class="text-sm font-medium">Keep going, Tiarasyifa! 🚀</p>
                    <p class="text-sm text-gray-500">Kamu semakin dekat dengan pencapaianmu.</p>
                    <p class="text-xs text-gray-500">2 day ago</p>
                    <button class="bg-primary/10 border border-primary text-primary text-sm px-1 py-0.5 rounded mt-2 flex flex-row items-center"><p>Lanjut Belajar</p> <i class="bx bx-right-arrow-alt text-base"></i></button>
                </div>
            </li>
            <li class="py-3 flex flex-row gap-2">
                <img src="{{ asset("assets/images/landing/favicion/logo-berbinar.webp") }}" alt="Logo" class="h-12 mt-1 w-auto max-sm:h-8" />
                <div>
                    <p class="text-sm font-medium">Mantap Tiarasyifa!</p>
                    <p class="text-sm text-gray-500">Progress belajarmu sudah 50% 🚀.</p>
                    <p class="text-xs text-gray-500">3 day ago</p>
                    <button class="bg-primary/10 border border-primary text-primary text-sm px-1 py-0.5 rounded mt-2 flex flex-row items-center"><p>Lanjut Belajar</p> <i class="bx bx-right-arrow-alt text-base"></i></button>
                </div>
            </li>
            <li class="py-3 flex flex-row gap-2">
                <img src="{{ asset("assets/images/landing/favicion/logo-berbinar.webp") }}" alt="Logo" class="h-12 mt-1 w-auto max-sm:h-8" />
                <div>
                    <p class="text-sm font-medium">Selamat Datang, Tiarasyifa! 🚀 </p>
                    <p class="text-sm text-gray-500">Saatnya mulai perjalanan belajarmu.</p>
                    <p class="text-xs text-gray-500">4 day ago</p>
                    <button class="bg-primary/10 border border-primary text-primary text-sm px-1 py-0.5 rounded mt-2 flex flex-row items-center"><p>Mulai Belajar</p> <i class="bx bx-right-arrow-alt text-base"></i></button>
                </div>
            </li>
        </ul>
        <!-- <div class="mt-4 text-right">
            <button id="closeNotificationFooter" class="px-4 py-2 rounded bg-primary text-white">Tutup</button>
        </div> -->
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    // Notification
    const notificationButton = document.getElementById('notificationButton');
    const notificationModal = document.getElementById('notificationModal');
    const notificationOverlay = document.getElementById('notificationOverlay');
    const closeNotification = document.getElementById('closeNotification');
    const closeNotificationFooter = document.getElementById('closeNotificationFooter');

    function openNotification() {
        notificationModal.classList.remove('hidden');
        notificationModal.classList.add('flex');
        notificationButton.setAttribute('aria-expanded', 'true');
    }
    function closeNotificationModal() {
        notificationModal.classList.add('hidden');
        notificationModal.classList.remove('flex');
        notificationButton.setAttribute('aria-expanded', 'false');
    }

    notificationButton?.addEventListener('click', function (e) {
        e.stopPropagation();
        const expanded = this.getAttribute('aria-expanded') === 'true';
        if (expanded) closeNotificationModal(); else openNotification();
    });

    [notificationOverlay, closeNotification, closeNotificationFooter].forEach(el => {
        el?.addEventListener('click', closeNotificationModal);
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && !notificationModal.classList.contains('hidden')) {
            closeNotificationModal();
        }
    });
});
</script>
