@extends('landing.layouts.test',[
'title' => 'Post Test Berbinar+',
'active' => 'Berbinar+',
'page' => 'Berbinar+',
])

@section('content')

<div class="mt-20 lg:mt-10">
        <div class="w-full flex flex-col">
            <nav class="text-gray-500 max-sm:text-sm text-lg" aria-label="Breadcrumb">
                <a href="{{ route('homepage.index') }}" class="hover:text-gray-900 transition-colors">BERBINAR+</a>
                <span>/</span>
                <a href="" class="hover:text-gray-900 transition-colors">Graphic Design</a>
                <span>/</span>
                <a href="" class="hover:text-gray-900 transition-colors">Sertifikat</a>
                <span>/</span>
                <a href=""><span class="text-black">Post Test - Graphic Design</span></a>
            </nav>

            <h1 class="mt-4 lg:mt-6 text-xl lg:text-3xl font-semibold">Post Test - Graphic Design</h1>

            <div class="bg-white w-full mt-5 lg:mt-10 rounded-2xl p-5 lg:p-8">
                <h2 class="mb-6 font-medium text-lg lg:text-xl">20 Soal Terlampir</h2>

                <a href="{{ route('posttest.question') }}" class="bg-disabled text-white py-1 px-4 lg:py-1 rounded-lg text-lg lg:text-xl gap-2">Mulai Post Test</a>
            </div>
        </div>
    </div>
@endsection
