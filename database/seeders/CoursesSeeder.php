<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Courses::factory()->create([
            'title' => 'Introducción a HTML',
            'tech' => 'HTML',
            'poster' => 'https://play-lh.googleusercontent.com/RslBy1o2NEBYUdRjQtUqLbN-ZM2hpks1mHPMiHMrpAuLqxeBPcFSAjo65nQHbTA53YYn',
            'level' => 'Begginer', 
        ]);

        Courses::factory()->create([
            'title' => 'Introducción a CSS',
            'tech' => 'CSS',
            'poster' => 'https://play-lh.googleusercontent.com/RTAZb9E639F4JBcuBRTPEk9_92I-kaKgBMw4LFxTGhdCQeqWukXh74rTngbQpBVGxqo',
            'level' => 'Begginer',
        ]);
    }
}
