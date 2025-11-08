<?php
function isRouteNameStartWith($routeName)
{
    return Str::startsWith(Route::currentRouteName(), $routeName) ? 'rounded-xl bg-[#3986A3]' : '';
}
?>

<li class="{{ isRouteNameStartWith('dashboard.admin.class') }} my-5 rounded-lg p-2">
    <a href="{{ route('dashboard.admin.class.index') }}"
        class="{{ Str::startsWith(Route::currentRouteName(), 'dashboard.admin.class') ? 'text-white' : 'text-gray-700 hover:text-primary' }} flex flex-row items-center duration-700">
        <i
            class="bx bx-book {{ Str::startsWith(Route::currentRouteName(), 'dashboard.admin.class') ? 'text-white' : 'text-gray-700' }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Daftar Class</span>
    </a>
</li>

<li class="{{ isRouteNameStartWith('dashboard.admin.layanan') }} my-5 rounded-lg p-2">
    <a href="{{ route('dashboard.admin.layanan.index') }}"
        class="{{ Str::startsWith(Route::currentRouteName(), 'dashboard.admin.layanan') ? 'text-white' : 'text-gray-700 hover:text-primary' }} flex flex-row items-center duration-700">
        <i
            class="bx bx-package {{ Str::startsWith(Route::currentRouteName(), 'dashboard.admin.layanan') ? 'text-white' : 'text-gray-700' }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Paket Layanan</span>
    </a>
</li>

<li class="{{ isRouteNameStartWith('dashboard.admin.user.index') }} my-5 rounded-lg p-2">
    <a href="{{ route('dashboard.admin.user.index') }}"
        class="{{ Str::startsWith(Route::currentRouteName(), 'dashboard.admin.user.index') ? 'text-white' : 'text-gray-700 hover:text-primary' }} flex flex-row items-center duration-700">
        <i
            class="bx bx-user {{ Str::startsWith(Route::currentRouteName(), 'dashboard.admin.user.index') ? 'text-white' : 'text-gray-700' }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Data Pendaftar</span>
    </a>
</li>
