@extends('dashboard.layouts.app', [
    'title' => 'Dashboard User Berbinar+',
    'active' => 'Dashboard',
])

@section('content')
    <section class="flex w-full">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="py-4 md:pt-12 md:pb-7">
                    <div class="">
                        <div class="flex flex-row gap-2">
                            <p tabindex="0"
                                class="mb-2 text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-2xl lg:text-4xl">
                                Dashboard Admin</p>
                        </div>
                        <p class="w-full text-disabled">Fitur ini digunakan untuk menampilkan data admin.</p>
                        <a href="" type="button"
                            class="focus:ring-2 focus:ring-offset-2  mt-8 sm:mt-3 inline-flex items-start justify-start px-6 py-3 text-white bg-primary hover:bg-primary focus:outline-none rounded">
                            <p class=" font-medium leading-none text-dark">Tambah Data</p>
                        </a>
                    </div>
                </div>
                <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10 rounded-md">
                    <div class="mt-4 overflow-x-auto">

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
