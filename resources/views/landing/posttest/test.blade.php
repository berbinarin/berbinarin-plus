@extends('landing.layouts.test-questions', [
    'title' => 'Posttest Berbinar+',
    'active' => 'Berbinar+',
    'page' => 'Berbinar+',
])

@section('content')
    <div class="mt-20 lg:mt-10">
        <!-- Navigasi -->
        <nav class="text-gray-500 max-sm:text-sm text-lg" aria-label="Breadcrumb">
            <a href="{{ route('landing.home.index') }}" class="hover:text-gray-900 transition-colors">BERBINAR+</a>
            <span>/</span>
            <a href="{{ route('landing.home.preview', ['class_id' => $class->id ?? 1]) }}"
                class="hover:text-gray-900 transition-colors">{{ $class->name ?? '-' }}</a>
            <span>/</span>
            <a href="{{ route('landing.posttest.index', ['class_id' => $class->id ?? 1]) }}"
                class="hover:text-gray-900 transition-colors">Post Test</a>
            <span>/</span>
            <span class="text-black">Pertanyaan {{ $number ?? 1 }}</span>
        </nav>

        <!-- Judul -->
        <div class="mt-4 mb-6 lg:mt-6 flex flex-row">
            <h1 class="text-xl lg:text-3xl font-semibold">Post Test - {{ $class->name ?? '-' }}</h1>
        </div>

        <!-- Pertanyaan -->
        <h3 class="text-xl font-semibold mb-6">Pertanyaan {{ $number ?? 1 }} dari {{ $total ?? 1 }}</h3>

        <!-- Wrapper -->
        <div class="w-full">
            <!-- Card pertanyaan -->
            <div
                class="bg-white rounded-[18px] ring-1 ring-[#2986A3] flex flex-col lg:flex-row-reverse justify-between items-center gap-8 px-4 py-6 lg:px-12 lg:py-8">
                <div class="flex-1">
                    <p class="text-base lg:text-xl font-medium mb-7">
                        {{ $question->question_text ?? 'Tidak ada pertanyaan.' }}
                    </p>
                    @if ($question)
                        <form id="posttestForm" class="flex flex-col gap-3">
                            @csrf
                            @if ($question->type === 'short_answer')
                                <input type="text" name="answer"
                                    class="min-w-5 h-10 text-[#2986A3] focus:ring-[#2986A3] border rounded-lg px-3"
                                    placeholder="Jawaban singkat..." value="" autocomplete="off">
                            @elseif($question->type === 'multiple_choice' && is_array($question->options))
                                @foreach ($question->options as $key => $option)
                                    <label class="flex items-start gap-3 lg:gap-5 text-base lg:text-xl">
                                        <input type="radio" name="answer" value="{{ $key }}"
                                            class="min-w-5 h-7 text-[#2986A3] focus:ring-[#2986A3]">
                                        {{ is_array($option) && isset($option['jawaban']) ? $option['jawaban'] : $key }}
                                    </label>
                                @endforeach
                            @endif
                        </form>
                    @endif
                </div>
            </div>

            <!-- Tombol navigasi -->
            <div
                class="flex w-full justify-between items-center gap-4 mt-8 text-center font-medium text-base lg:text-xl mx-auto">
                @if (($number ?? 1) > 1)
                    <a href="{{ route('landing.posttest.question', ['class_id' => $class->id ?? 1, 'number' => ($number ?? 1) - 1]) }}"
                        class="max-sm:w-1/2 py-2 px-[18px] bg-white ring-1 ring-[#3986A3] rounded-lg">Sebelumnya</a>
                @else
                    <span></span>
                @endif
                @if (($number ?? 1) < ($total ?? 1))
                    <button id="nextBtn"
                        class="max-sm:w-1/2 py-2 px-[18px] bg-[#3986A3] rounded-lg text-white">Berikutnya</button>
                @else
                    <button id="finishBtn"
                        class="max-sm:w-1/2 py-2 px-[18px] bg-[#3986A3] rounded-lg text-white">Selesai</button>
                @endif
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            const classId = {{ $class->id ?? 1 }};
            const number = {{ $number ?? 1 }};
            const total = {{ $total ?? 1 }};
            const questionId = {{ $question->id ?? 'null' }};

            function saveAnswer() {
                const form = document.getElementById('posttestForm');
                let answer = '';
                if (!form) return;
                if (form.answer) {
                    if (form.answer.type === 'radio') {
                        answer = form.answer.checked ? form.answer.value : '';
                    } else {
                        answer = form.answer.value;
                    }
                } else {
                    // Multiple radio
                    const radios = form.querySelectorAll('input[type="radio"][name="answer"]');
                    radios.forEach(r => {
                        if (r.checked) answer = r.value;
                    });
                }
                let answers = JSON.parse(localStorage.getItem('posttest_answers_' + classId) || '{}');
                answers[questionId] = answer;
                localStorage.setItem('posttest_answers_' + classId, JSON.stringify(answers));
            }

            document.addEventListener('DOMContentLoaded', function() {
                const nextBtn = document.getElementById('nextBtn');
                const finishBtn = document.getElementById('finishBtn');
                const form = document.getElementById('posttestForm');
                if (nextBtn) {
                    nextBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        saveAnswer();
                        window.location.href =
                            "{{ route('landing.posttest.question', ['class_id' => $class->id ?? 1, 'number' => ($number ?? 1) + 1]) }}";
                    });
                }
                if (finishBtn) {
                    finishBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        saveAnswer();
                        // submit all answers
                        const answersRaw = localStorage.getItem('posttest_answers_' + classId);
                        let answersObj = {};
                        try {
                            answersObj = answersRaw ? JSON.parse(answersRaw) : {};
                        } catch (e) {
                            answersObj = {};
                        }
                        const csrfMeta = document.querySelector('meta[name="csrf-token"]');
                        const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';
                        fetch("{{ route('landing.posttest.submit', ['class_id' => $class->id ?? 1]) }}", {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    answers: answersObj
                                })
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data && data.redirect) {
                                    localStorage.removeItem('posttest_answers_' + classId);
                                    window.location.href = data.redirect;
                                } else {
                                    window.location.href =
                                        "{{ route('landing.posttest.index', ['class_id' => $class->id ?? 1]) }}";
                                }
                            })
                            .catch(() => {
                                window.location.href =
                                    "{{ route('landing.posttest.index', ['class_id' => $class->id ?? 1]) }}";
                            });
                    });
                }
                // Prefill jika sudah ada
                let answers = JSON.parse(localStorage.getItem('posttest_answers_' + classId) || '{}');
                if (answers[questionId] !== undefined) {
                    if (form && form.answer) {
                        if (form.answer.type === 'radio') {
                            if (form.answer.value === answers[questionId]) form.answer.checked = true;
                        } else {
                            form.answer.value = answers[questionId];
                        }
                    } else {
                        // Multiple radio
                        const radios = form.querySelectorAll('input[type="radio"][name="answer"]');
                        radios.forEach(r => {
                            if (r.value === answers[questionId]) r.checked = true;
                        });
                    }
                }
            });
        </script>
    @endsection
