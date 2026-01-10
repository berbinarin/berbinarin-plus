<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berbinarp_Class;

class BebrinarpClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'category' => 'Design',
                'name' => 'Graphic Design',
                'instructor_name' => 'Rina Putri',
                'instructor_title' => 'Senior Designer',
                'rating' => 4.8,
                'thumbnail' => 'graphic-design.jpg',
                'description' => 'Di kelas ini, kamu akan mempelajari dasar hingga teknik lanjutan dalam dunia desain grafis — mulai dari memahami prinsip visual, komposisi warna, tipografi, hingga penggunaan tools digital populer seperti Adobe Photoshop dan Illustrator. Setiap materi dirancang agar kamu bisa langsung praktik dan membangun portofolio desain yang nyata. Cocok untuk pemula maupun yang ingin memperdalam skill desain demi karier kreatif yang lebih profesional.',
            ],
            [
                'category' => 'Programming',
                'name' => 'Web Development',
                'instructor_name' => 'Budi Santoso',
                'instructor_title' => 'Full Stack Developer',
                'rating' => 4.7,
                'thumbnail' => 'web-development.jpg',
                'description' => 'Kelas ini membahas pembuatan website dari dasar hingga mahir, termasuk HTML, CSS, JavaScript, dan framework populer. Sangat cocok untuk pemula yang ingin berkarier di bidang web development.',
            ],
            [
                'category' => 'Business',
                'name' => 'Digital Marketing',
                'instructor_name' => 'Siti Rahma',
                'instructor_title' => 'Marketing Expert',
                'rating' => 4.9,
                'thumbnail' => 'digital-marketing.jpg',
                'description' => 'Pelajari strategi pemasaran digital, mulai dari social media, SEO, hingga campaign management. Materi disusun agar mudah dipahami dan langsung bisa dipraktikkan.',
            ],
        ];
        foreach ($data as $item) {
            Berbinarp_Class::create($item);
        }
    }
}
