<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name,
            'phone'=>1100162900,
            'password'=>$this->faker->password,
            'age'=>$this->faker->numberBetween(20,30),
            'birthdate'=>$this->faker->dateTimeBetween('-30 years','-20 years')->format('Y-m-d'),
            'image'=>$this->faker->imageUrl(640,480,'patients'),
            'address'=>'El-dokki - 5 mosadak st , third floor',
            'doctor_id'=>$this->faker->numberBetween(1,10),
        ];
    }
}
