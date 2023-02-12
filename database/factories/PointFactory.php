<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point>
 */
class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => factory(\App\Models\User::class),
            'task_id' => factory(\App\Models\Task::class),
            'quize_id' => factory(\App\Models\Quiz::class),
            'course_id' => factory(\App\Models\Course::class),
            'score' => $this->faker->number,
        ];
    }
}
