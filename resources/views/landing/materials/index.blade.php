@extends('landing.layouts.materials',[
'title' => 'Materi Berbinar+',
'active' => 'Berbinar+',
'page' => 'Berbinar+',
])

@section('content')

    <div class="mt-20 lg:mt-10">
        <div class="w-full flex flex-col">
            <!-- <h3 class="text-gray-500 text-sm">BERBINAR+    /    Graphic Design    /     Course Menu   /    <span class="text-black">Produksi Visual</span></h3> -->
            <nav class="text-gray-500 max-sm:text-sm text-lg" aria-label="Breadcrumb">
                <a href="{{ route('homepage.index') }}" class="hover:text-gray-900 transition-colors">BERBINAR+</a>
                <span>/</span>
                <a href="" class="hover:text-gray-900 transition-colors">Graphic Design</a>
                <span>/</span>
                <a href="" class="hover:text-gray-900 transition-colors">Course Menu</a>
                <span>/</span>
                <a href="" class="hover:text-gray-900 transition-colors"><span class="text-black">Produksi Visual</span></a>
            </nav>
            <h1 class="mt-4 lg:mt-6 text-xl lg:text-3xl font-semibold">Produksi Visual</h1>
            <img src="{{ asset("assets/images/landing/favicion/materials-placeholder.png") }}" alt="Back" class="w-full lg:w-4/5 mt-5 lg:mt-10 rounded-2xl">

                <div class="mb-4 font-medium lg:text-2xl mt-5"><span class="border-b-2 border-cyan-300 pb-[2px]">Deskripsi</span></div>

                <div class="font-normal text-sm lg:text-lg flex flex-col gap-4">
                    <p>
                        Pada materi Produksi Visual, kamu akan mendalami bagaimana sebuah ide dikembangkan menjadi karya desain yang siap dipublikasikan. Materi ini mencakup teknik dasar hingga lanjutan seperti pengolahan foto, manipulasi gambar, pembuatan ilustrasi vektor, hingga menyusun layout yang efektif untuk berbagai media.
                    </p>

                    <p>
                        Kamu juga akan belajar bagaimana memilih elemen visual yang tepat, menyesuaikan tone warna, serta menata tipografi agar hasil desain lebih komunikatif. Dengan memahami tahapan produksi ini, kamu dapat menghasilkan desain yang tidak hanya estetik, tetapi juga fungsional dan sesuai dengan kebutuhan target audiens.
                    </p>
                </div>

        </div>
    </div>
@endsection
