@extends('dashboard.layouts.app', [
    'title' => 'Berbinar Plus',
])

@section('content')
<section class="flex w-full">
    <div class="flex w-full flex-col">
        <div class="py-4 md:pb-7 md:pt-12">
            <div class="mb-2 flex items-center gap-2">
                <a href="{{ route('dashboard.admin.class.index') }}">
                    <img src="{{ asset('assets/images/dashboard/svg/dashboard-back.png') }}" alt="Back Btn" />
                </a>
                <p class="text-base font-bold leading-normal text-gray-800 sm:text-lg md:text-2xl lg:text-4xl">
                    Detail Daftar Class
                </p>
            </div>
            <p class="w-full text-disabled">
                Halaman ini menampilkan informasi detail mengenai data Class yang terdapat pada BERBINAR+. Admin dapat melihat informasi lengkap seputar nama, deskripsi, thumbnail, dan silabus Class.
            </p>
        </div>
        <div class="rounded-3xl bg-white px-4 py-4 shadow-lg shadow-gray-400 md:px-8 md:py-7 xl:px-10">

            <div class="mb-6">
                <h1 class="mb-2 text-2xl text-primary-alt font-bold">Nama <span class="italic">Class</span></h1>
                <p class="font-semibold text-lg">{{ $class->name }}</p>
            </div>

            <div class="mb-6">
                <h1 class="mb-2 text-2xl text-primary-alt font-bold">Deskripsi</h1>
                <p class="font-semibold text-lg">{{ $class->description }}</p>
            </div>

            <div class="mb-6">
                <h1 class="mb-2 text-2xl text-primary-alt font-bold">Thumbnail</h1>
                @if($class->thumbnail)
                    <img src="{{ asset('uploads/thumbnails/' . $class->thumbnail) }}" alt="Thumbnail" class="w-64 rounded-lg shadow">
                @else
                    <p class="text-gray-500">Tidak ada gambar</p>
                @endif
            </div>

            <div class="mb-6">
                <h1 class="mb-2 text-2xl text-primary-alt font-bold">Silabus</h1>
                @php
                    $syllabus = json_decode($class->syllabus, true);
                @endphp
                @if(is_array($syllabus) && count($syllabus))
                    <ol class="list-decimal pl-6 space-y-2">
                        @foreach($syllabus as $item)
                            <li>
                                <div class="font-semibold">{{ $item['title'] ?? '-' }}</div>
                                <div class="text-gray-700">{{ $item['details'] ?? '-' }}</div>
                            </li>
                        @endforeach
                    </ol>
                @else
                    <p class="text-gray-500">Tidak ada silabus</p>
                @endif
            </div>

        </div>
    </div>
</section>
@endsection