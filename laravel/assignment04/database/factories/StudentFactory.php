<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'age' => rand(10, 60),
            'major_id' => rand(1, 5),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
            'updated_at' => $this->faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
        ];
    }
}
