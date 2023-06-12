<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DoctorFactory extends Factory
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
            'email'=>$this->faker->email,
            'password'=>$this->faker->password,
            'phone'=>1100162900,
            'type'=>'doctor',
            'specialty_id'=>$this->faker->numberBetween(1,5),
            'image'=>$this->faker->imageUrl(640,480,'doctors'),
            'description'=>$this->faker->sentence(),
            'status'=>'isset'
        ];
    }
}
