<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- Header --}}
        @include("landing.partials.header")

        {{-- Meta --}}
        @yield("meta")

        {{-- Additional Style --}}
        @yield("style")
    </head>
    <body class="relative w-full overflow-x-hidden bg-gray-100">

        {{-- Navbar --}}
        @include('landing.partials.homepage-navbar')

        <div class="flex w-full select-none">
            {{-- Sidebar --}}
            {{-- <div class="flex-shrink-0">
                @include("landing.partials.homepage-sidebar")
            </div> --}}

            {{-- Main Content --}}
            <main class="w-full flex-1 px-3 lg:px-10 pb-2 pt-4 lg:pt-6 transition duration-500 ease-in-out overflow-y-auto overflow-x-hidden">
                @yield("content")
            </main>
        </div>

        {{-- Script --}}
        @include("landing.partials.script")

        {{-- Additional Script --}}
        @yield("script")
    </body>
</html>
