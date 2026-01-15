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
            --vjs-theme-primary: #22d3ee;
            /* Warna Cyan Berbinar+ */
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

        /* TEKNIK CLIPPING: Memperbesar video sedikit (115%)
                           untuk menyembunyikan judul di atas dan logo di bawah */
        .video-js .vjs-tech {
            width: 100%;
            height: 100%;
        }

        /* Sembunyikan overlay rekomendasi YouTube jika muncul */
        /* Untuk YouTube embed, overlay rekomendasi biasanya berupa .ytp-ce-element, .ytp-ce-video, .ytp-ce-channel, dan .ytp-endscreen-content */
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
            background-color: rgba(34, 211, 238, 0.9) !important;
            border-radius: 50% !important;
            width: 2.5em !important;
            height: 2.5em !important;
            line-height: 2.5em !important;
            margin-top: -1.25em !important;
            margin-left: -1.25em !important;
            border: none !important;
            z-index: 10;
        }

        /* Sembunyikan kontrol asli YouTube agar tidak bisa di-skip sembarangan */
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
                    class="hover:text-cyan-500 transition-colors uppercase font-medium">BERBINAR+</a>
                <span class="mx-2">/</span>
                <a href="{{ route('landing.home.preview', ['class_id' => $class->id]) }}"
                    class="hover:text-cyan-500 transition-colors">{{ $class->name ?? 'Course' }}</a>
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
                        <div class="text-2xl font-bold text-cyan-600 mb-4">Materi Selesai!</div>
                        <button id="btn-next-overlay"
                            class="px-8 py-3 rounded-xl font-bold bg-cyan-500 text-white hover:scale-105 active:scale-95">Lanjut
                            Materi</button>
                    </div>
                </div>

                {{-- Status Bar Interaktif --}}
                {{-- <div
                    class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 w-full lg:w-4/5 p-5 bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-4">
                        <div id="status-bg"
                            class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center transition-colors">
                            <i id="status-icon" class="fas fa-lock text-gray-400"></i>
                        </div>
                        <div>
                            <p id="status-text" class="text-gray-600 font-medium">Video sedang diputar...</p>
                            <p class="text-xs text-gray-400">Tonton hingga selesai untuk klaim sertifikat.</p>
                        </div>
                    </div>
                    <button id="btn-next" disabled
                        class="px-10 py-3 rounded-xl font-bold transition-all duration-500 bg-gray-200 text-gray-400 cursor-not-allowed shadow-inner">
                        Lanjut Materi
                    </button>
                </div> --}}
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

                // Mencegah user melakukan klik kanan pada video
                player.on('contextmenu', function(e) {
                    e.preventDefault();
                });

                // Deteksi Video Selesai
                player.on('ended', function() {
                    // Tampilkan overlay custom
                    document.getElementById('overlay-end').style.display = 'flex';
                    // Optional: tetap update progress ke backend
                    updateProgress();
                });

                // Tombol lanjut materi pada overlay
                document.getElementById('btn-next-overlay').onclick = function() {
                    // Aksi lanjut materi, misal redirect atau trigger progress
                    // window.location.href = 'URL_LANJUT_MATERI';
                };

                function updateProgress() {
                    fetch("", {
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
                                // UI Feedback saat berhasil
                                const btn = document.getElementById('btn-next');
                                const text = document.getElementById('status-text');
                                const icon = document.getElementById('status-icon');
                                const bg = document.getElementById('status-bg');

                                btn.disabled = false;
                                btn.classList.replace('bg-gray-200', 'bg-cyan-500');
                                btn.classList.replace('text-gray-400', 'text-white');
                                btn.classList.remove('cursor-not-allowed');
                                btn.classList.add('hover:scale-105', 'active:scale-95');

                                bg.classList.replace('bg-gray-100', 'bg-green-100');
                                icon.classList.replace('fa-lock', 'fa-check-circle');
                                icon.classList.replace('text-gray-400', 'text-green-600');

                                text.innerText = "Materi Selesai! Kamu hebat.";
                                text.classList.replace('text-gray-600', 'text-green-600');
                                text.classList.add('font-bold');
                            }
                        });
                }
            @endif
        });
    </script>
@endsection
