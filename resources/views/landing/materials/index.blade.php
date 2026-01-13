@extends('landing.layouts.materials', [
    'title' => 'Materi Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('content')
    <div class="mt-20 lg:mt-10">
        <div class="w-full flex flex-col">
            <nav class="text-gray-500 max-sm:text-sm text-lg" aria-label="Breadcrumb">
                <a href="{{ route('landing.home.index') }}" class="hover:text-gray-900 transition-colors">BERBINAR+</a>
                <span>/</span>
                <a href="{{ route('landing.home.preview', ['class_id' => $class->id]) }}"
                    class="hover:text-gray-900 transition-colors">{{ $class->name ?? '-' }}</a>
                <span>/</span>
                <a href="#" class="hover:text-gray-900 transition-colors">Course Menu</a>
                <span>/</span>
                <a href="#" class="hover:text-gray-900 transition-colors"><span
                        class="text-black">{{ $section->title ?? '-' }}</span></a>
            </nav>
            <h1 class="mt-4 lg:mt-6 text-xl lg:text-3xl font-semibold">{{ $section->title ?? '-' }}</h1>
            @if ($section->video_url)
                @php
                    // Extract YouTube video ID from various possible URL formats
                    $videoId = null;
                    if (preg_match('/(?:v=|\/embed\/|youtu.be\/)([\w-]{11})/i', $section->video_url, $matches)) {
                        $videoId = $matches[1];
                    } elseif (preg_match('/youtube.com\/watch\?.*v=([\w-]{11})/i', $section->video_url, $matches)) {
                        $videoId = $matches[1];
                    }
                @endphp
                @if ($videoId)
                    <div class="w-full lg:w-4/5 mt-5 lg:mt-10 rounded-2xl overflow-hidden aspect-video">
                        <iframe src="https://www.youtube.com/embed/{{ $videoId }}" style="width:100%;height:100%"
                            frameborder="0" allowfullscreen></iframe>
                    </div>
                @else
                    <div
                        class="w-full lg:w-4/5 mt-5 lg:mt-10 rounded-2xl overflow-hidden aspect-video bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">Video URL tidak valid</span>
                    </div>
                @endif
            @else
                <img src="{{ asset('assets/images/landing/favicion/materials-placeholder.webp') }}" alt="Back"
                    class="w-full lg:w-4/5 mt-5 lg:mt-10 rounded-2xl">
            @endif

            <div class="mb-4 font-medium lg:text-2xl mt-5"><span
                    class="border-b-2 border-cyan-300 pb-[2px]">Deskripsi</span></div>

            <div class="font-normal text-sm lg:text-lg flex flex-col gap-4">
                <p>{{ $section->description ?? '-' }}</p>
            </div>
        </div>
    </div>
@endsection
