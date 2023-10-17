<?php

namespace Database\Factories\v1;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\v1\Study;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'study_id' => Study::inRandomOrder()->first()->id,
        ];
    }
}
