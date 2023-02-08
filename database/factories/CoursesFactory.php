<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courses>
 */
class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

                'title' => fake()->title(20),
                'description' => fake()->text(200),
                'tech' => fake()->text(10),
                'poster' => fake()->url(),
                'level' => fake()->text(6),

        ];
    }
}
