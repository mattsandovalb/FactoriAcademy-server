<?php

namespace Database\Seeders;

use App\Models\Technologies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Technologies::factory()->create([
            'title' => 'HTML',
            'tech' => 'HTML'
        ]);
        Technologies::factory()->create([
            'title' => 'CSS',
            'tech' => 'CSS'
        ]);
    }
}
