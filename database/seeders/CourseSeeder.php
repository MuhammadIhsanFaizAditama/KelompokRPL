<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::create([
            'title' => 'Pemrograman Dasar',
            'description' => 'Belajar logika dasar dan sintaks pemrograman.',
        ]);

        Course::create([
            'title' => 'Desain Web',
            'description' => 'Membuat tampilan web menggunakan HTML, CSS, dan JS.',
        ]);

        Course::create([
            'title' => 'Database',
            'description' => 'Mengenal konsep dasar SQL dan relasi antar tabel.',
        ]);
    }
}
