@php
    if (!function_exists('isRouteNameStartWith')) {
        function isRouteNameStartWith($routeName)
        {
            return Str::startsWith(Route::currentRouteName(), $routeName) ? 'rounded-xl bg-[#3986A3]' : '';
        }
    }
@endphp

<li class="{{ isRouteNameStartWith('dashboard.kelas', 'bg') }} my-5 rounded-lg p-2">
    <a href="{{ route('dashboard.kelas.index') }}"
        class="{{ Str::startsWith(Route::currentRouteName(), 'dashboard.kelas') ? 'text-white' : 'text-gray-700 hover:text-primary' }} flex flex-row items-center duration-700">
        <i
            class="bx bx-book {{ Str::startsWith(Route::currentRouteName(), 'dashboard.kelas') ? 'text-white' : 'text-gray-700' }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Daftar Kelas</span>
    </a>
</li>

<li class="{{ isRouteNameStartWith('dashboard.pendaftar') }} my-5 rounded-lg p-2">
    <a href="{{ route('dashboard.pendaftar.index') }}"
        class="{{ Str::startsWith(Route::currentRouteName(), 'dashboard.pendaftar') ? 'text-white' : 'text-gray-700 hover:text-primary' }} flex flex-row items-center duration-700">
        <i
            class="bx bx-user {{ Str::startsWith(Route::currentRouteName(), 'dashboard.pendaftar') ? 'text-white' : 'text-gray-700' }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Data Pendaftar</span>
    </a>
</li>

<!-- <li class="{{ isRouteNameStartWith('dashboard.pengumpulan-tes') }} my-5 rounded-lg p-2">
    <a href="{{ route('dashboard.pendaftar.pengumpulan-tes.index') }}"
        class="{{ Str::startsWith(Route::currentRouteName(), 'dashboard.pengumpulan-tes') ? 'text-white' : 'text-gray-700 hover:text-primary' }} flex flex-row items-center duration-700">
        <i
            class="bx bx-file {{ Str::startsWith(Route::currentRouteName(), 'dashboard.pengumpulan-tes') ? 'text-white' : 'text-gray-700' }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Pengumpulan Tes</span>
    </a>
</li> -->
