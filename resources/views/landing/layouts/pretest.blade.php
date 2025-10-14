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

        <div class="flex h-screen w-full select-none">
            {{-- Sidebar --}}
            <div class="flex-shrink-0">
                @include("landing.partials.sidebar")
            </div>

            {{-- Main Content --}}
            <main class="w-full my-1 flex-1 overflow-y-auto rounded-l-lg px-10 pb-2 pt-2 transition duration-500 ease-in-out">
                @yield("content")
            </main>
        </div>

        {{-- Script --}}
        @include("landing.partials.script")

        {{-- Additional Script --}}
        @yield("script")
    </body>
</html>
