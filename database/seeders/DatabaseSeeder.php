<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Database\Seeders\DoctorSeeder;
use Illuminate\Support\Facades\Hash;
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
        Admin::create([
            'name'=>'Fares El Shinawy',
            'email'=>'test@test.com',
            'password'=>Hash::make('123456'),
            'phone'=>'0265449449'
        ]);
        Patient::create([
            'name'=>'Fares El Shinawy',
            'password'=>Hash::make('123456'),
            'phone'=>'0265449449',
            'age'=>22,
            'birthdate'=>date('Y-m-d'),
            'address'=>'tanta',
            'doctor_id'=>'1'
        ]);
        Doctor::create([
            'name'=>'Fares El Shinawy',
            'email'=>'test@test.com',
            'password'=>Hash::make('123456'),
            'phone'=>'0265449449',
            'specialty_id'=>'1',
            'image'=>'testimage',
            'description'=>'hfadkshfkhakshk'
        ]);
    }
}
