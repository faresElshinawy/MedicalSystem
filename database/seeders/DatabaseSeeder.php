<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DoctorSeeder;
use Database\Seeders\SpecialtySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            SpecialtySeeder::class,
            DoctorSeeder::class,
            PatientSeeder::class,
            ExaminationSeeder::class,
            NoteSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
