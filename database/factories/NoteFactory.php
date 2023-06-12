<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id'=>$this->faker->numberBetween(1,10),
            'doctor_id'=>$this->faker->numberBetween(1,10),
            'message'=>$this->faker->sentence()
        ];
    }
}
