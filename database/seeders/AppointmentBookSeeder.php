<?php

namespace Database\Seeders;

use App\Models\AppointmentBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       AppointmentBook::factory()->count(5)->create();
    }
}
