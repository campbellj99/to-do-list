<?php

namespace Database\Factories;

use App\Models\Tasks; // Import the Task model
use Illuminate\Database\Eloquent\Factories\Factory;

class tasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            // 'description' => $this->faker->paragraph,
            'complete' => $this->faker->boolean,
        ];
    }
}
