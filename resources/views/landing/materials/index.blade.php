@extends('landing.layouts.materials', [
    'title' => 'Materi Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('style')
    {{-- Video.js CSS --}}
    <link href="https://vjs.zencdn.net/7.21.1/video-js.css" rel="stylesheet" />
    <style>
        :root {
            --vjs-theme-primary: #3986A3;
        }

        /* Proteksi visual */
        .video-js .vjs-progress-control {
            pointer-events: none;
        }

        .video-js .vjs-control-bar {
            pointer-events: auto;
        }

        .video-js .vjs-progress-holder {
            opacity: 0.8;
        }

        /* Container dengan overflow hidden untuk memotong elemen YouTube */
        .video-container {
            position: relative;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            background-color: #000;
        }

        .video-js {
            width: 100%;
            height: auto;
            aspect-ratio: 16 / 9;
        }

        .video-js .vjs-tech {
            width: 100%;
            height: 100%;
        }

        /* Overlay rekomendasi YouTube jika muncul */
        .video-container iframe[src*="youtube.com"] {
            pointer-events: none !important;
        }

        .video-container .ytp-ce-element,
        .video-container .ytp-ce-video,
        .video-container .ytp-ce-channel,
        .video-container .ytp-endscreen-content {
            display: none !important;
            opacity: 0 !important;
            visibility: hidden !important;
            z-index: -1 !important;
        }

        /* Mengembalikan posisi tombol play agar tetap di tengah setelah scaling */
        .vjs-big-play-button {
            background-color: rgba(57, 134, 163, 0.9) !important;
            border-radius: 50% !important;
            width: 2.5em !important;
            height: 2.5em !important;
            line-height: 2.5em !important;
            margin-top: -1.25em !important;
            margin-left: -1.25em !important;
            border: none !important;
            z-index: 10;
        }

        /* Sembunyikan kontrol asli YouTube */
        .vjs-youtube .vjs-iframe-blocker {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="mt-20 lg:mt-10">
        <div class="w-full flex flex-col">
            {{-- Breadcrumb Profesional --}}
            <nav class="text-gray-500 max-sm:text-sm text-lg mb-4" aria-label="Breadcrumb">
                <a href="{{ route('landing.home.index') }}"
                    class="hover:text-[#3986A3] transition-colors uppercase font-medium">BERBINAR+</a>
                <span class="mx-2">/</span>
                <a href="{{ route('landing.home.preview', ['class_id' => $class->id]) }}"
                    class="hover:text-[#3986A3] transition-colors">{{ $class->name ?? 'Course' }}</a>
                <span class="mx-2">/</span>
                <span class="text-black font-semibold">{{ $section->title ?? '-' }}</span>
            </nav>

            <h1 class="text-2xl lg:text-4xl font-bold text-gray-900 mb-6">{{ $section->title ?? '-' }}</h1>

            {{-- Logic Ekstraksi ID YouTube --}}
            @php
                $videoId = null;
                if ($section->video_url) {
                    if (
                        preg_match(
                            '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i',
                            $section->video_url,
                            $matches,
                        )
                    ) {
                        $videoId = $matches[1];
                    }
                }
            @endphp

            @if ($videoId)
                @php
                    // Cari next section berdasarkan urutan $sections
                    $nextSection = null;
                    if (isset($sections) && $sections->count()) {
                        $found = false;
                        foreach ($sections as $i => $sec) {
                            if ($sec->id == $section->id) {
                                $found = true;
                                if (isset($sections[$i + 1])) {
                                    $nextSection = $sections[$i + 1];
                                }
                                break;
                            }
                        }
                    }
                    // URL post test
                    $postTestUrl = route('landing.posttest.index', ['class_id' => $class->id]);
                @endphp
                <div class="w-full lg:w-4/5 video-container" style="position:relative;">
                    {{-- Player Video.js dengan Tech YouTube --}}
                    <video id="course-video" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto"
                        data-setup='{ 
                            "techOrder": ["youtube"], 
                            "sources": [{ "type": "video/youtube", "src": "https://www.youtube.com/watch?v={{ $videoId }}" }],
                            "youtube": { 
                                "modestbranding": 1, 
                                "rel": 0, 
                                "iv_load_policy": 3,
                                "controls": 0,
                                "showinfo": 0,
                                "disablekb": 1,
                                "playsinline": 1,
                                "fs": 0
                            } 
                        }'>
                    </video>
                    <div id="overlay-end"
                        style="display:none; position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(255,255,255,0.95);z-index:99;align-items:center;justify-content:center;flex-direction:column;"
                        class="flex">
                        <div class="text-2xl font-bold mb-4" style="color:#3986A3;">Materi Selesai!</div>
                        <button id="btn-next-overlay"
                            class="px-8 py-3 rounded-xl font-bold text-white hover:scale-105 active:scale-95"
                            style="background-color:#3986A3;"
                            data-next-url="{{ $nextSection ? route('landing.home.materials', ['class_id' => $class->id, 'section_id' => $nextSection->id]) : $postTestUrl }}">
                            {{ $nextSection ? 'Lanjut Materi' : 'Lanjut ke Post Test' }}
                        </button>
                    </div>
                </div>
            @endif

            {{-- Deskripsi Materi --}}
            <div class="mt-12">
                <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                    Deskripsi Materi
                </h3>
                <div class="text-gray-700 leading-relaxed max-w-4xl text-lg p-6 bg-gray-50 rounded-2xl">
                    {{ $section->description ?? 'Deskripsi materi pelatihan belum tersedia.' }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- Library Video.js & Plugin YouTube --}}
    <script src="https://vjs.zencdn.net/7.21.1/video.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/videojs-youtube@3.0.1/dist/Youtube.min.js"></script>

    <script>
        window.addEventListener('load', function() {
            @if ($videoId)
                const player = videojs('course-video');
                let progressSent = false;

                // Mencegah user melakukan klik kanan pada video
                player.on('contextmenu', function(e) {
                    e.preventDefault();
                });

                player.on('timeupdate', function() {
                    let currentTime = player.currentTime();
                    let duration = player.duration();
                    // 10 Detik Sebelum Durasi Belakang
                    if (duration > 0) {
                        let threshold = duration - 10;
                        // Jika video pendek (kurang dari 10 detik), setel threshold ke 90%
                        if (duration < 15) threshold = duration * 0.9;
                        if (currentTime >= threshold && !progressSent) {
                            progressSent = true;
                            updateDatabaseProgres();
                        }
                    }
                });

                // Tampilkan overlay custom saat video selesai
                player.on('ended', function() {
                    document.getElementById('overlay-end').style.display = 'flex';
                });

                // Tombol lanjut materi pada overlay
                const btnNextOverlay = document.getElementById('btn-next-overlay');
                if (btnNextOverlay) {
                    btnNextOverlay.onclick = function() {
                        const nextUrl = btnNextOverlay.getAttribute('data-next-url');
                        if (nextUrl) {
                            window.location.href = nextUrl;
                        }
                    };
                }

                function updateDatabaseProgres() {
                    console.log("Ambang batas (10 detik terakhir) tercapai. Sinkronisasi...");
                    fetch("{{ route('landing.home.user.progress.update') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                course_section_id: '{{ $section->id }}'
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                showSuccessFeedback();
                            }
                        });
                }

                function showSuccessFeedback() {
                    const btnNext = document.getElementById('btn-next');
                    if (btnNext) {
                        btnNext.disabled = false;
                        btnNext.classList.replace('bg-gray-200', 'bg-cyan-500');
                        btnNext.classList.replace('text-gray-400', 'text-white');
                        btnNext.classList.remove('cursor-not-allowed');
                    }
                }
            @endif
        });
    </script>
@endsection
