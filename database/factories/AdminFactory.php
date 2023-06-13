<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
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
            'image'=>'6486750aded784.31507595_WhatsApp Image 2023-03-15 at 1.41.49 PM (1).jpeg',
            'type'=>'admin'
        ];
    }
}
