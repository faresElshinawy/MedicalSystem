<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Examination>
 */
class ExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'doctor_id'=>$this->faker->numberBetween(1,10),
            'patient_id'=>$this->faker->numberBetween(1,10),
            'price'=>$this->faker->numberBetween(100,250),
            'status'=>$this->faker->randomElement(['pending','cancel','success']),
            'time'=>$this->faker->dateTimeBetween('-1 month','-1 week')->format('Y-m-d'),
            'title'=>$this->faker->name,
            'description'=>$this->faker->sentence(),
            'offer'=>$this->faker->numberBetween(0,100)
        ];
    }
}
