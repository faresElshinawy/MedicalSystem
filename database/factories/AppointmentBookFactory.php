<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppointmentBook>
 */
class AppointmentBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name,
            'email'=>fake()->email,
            'doctor_id'=>fake()->numberBetween(1,5),
            'date'=>fake()->date('Y-m-d'),
            'time'=>fake()->time()
        ];
    }
}
