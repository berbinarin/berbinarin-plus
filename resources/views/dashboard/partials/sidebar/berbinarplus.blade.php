@php
    if (!function_exists('isRouteNameStartWith')) {
        function isRouteNameStartWith($routeName)
        {
            return Str::startsWith(Route::currentRouteName(), $routeName) ? 'rounded-xl bg-[#3986A3]' : '';
        }
    }
@endphp

<li class="{{ isRouteNameStartWith('dashboard.berbinarclass') }} my-5 rounded-lg p-2">
    <a href="{{ route('dashboard.berbinarclass') }}"
        class="{{ Str::startsWith(Route::currentRouteName(), 'dashboard.berbinarclass') ? 'text-white' : 'text-gray-700 hover:text-primary' }} flex flex-row items-center duration-700">
        <i
            class="bx bx-tab {{ Str::startsWith(Route::currentRouteName(), 'dashboard.berbinarclass') ? 'text-white' : 'text-gray-700' }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Daftar Class</span>
    </a>
</li>

{{-- <li class="{{ isRouteNameStartWith('dashboard.berbinar-user.index') }} my-5 rounded-lg p-2">
    <a href="{{ route('dashboard.berbinar-user.index') }}"
        class="{{ Str::startsWith(Route::currentRouteName(), 'dashboard.berbinar-user') ? 'text-white' : 'text-gray-700 hover:text-primary' }} flex flex-row items-center duration-700">
        <i
            class="bx bx-user {{ Str::startsWith(Route::currentRouteName(), 'dashboard.berbinar-user.index') ? 'text-white' : 'text-gray-700' }} mr-2 text-lg"></i>
        <span class="ml-4 text-base font-bold leading-5">Data Pendaftar</span>
    </a>
</li> --}}
