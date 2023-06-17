<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Setting;
use App\Models\AppointMentBook;
use App\Models\Specialty;
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
            // SpecialtySeeder::class,
            // DoctorSeeder::class,
            // PatientSeeder::class,
            // ExaminationSeeder::class,
            // NoteSeeder::class,
            // AdminSeeder::class,
            // AppointMentBookSeeder::class,
        ]);
        Admin::create([
            'name'=>'Fares El Shinawy',
            'email'=>'test@test.com',
            'password'=>Hash::make('123456'),
            'phone'=>'0265449449'
        ]);
        Specialty::create([
            'name'=>'Internal medicine'
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
        Patient::create([
            'name'=>'fares',
            'password'=>Hash::make('123456'),
            'phone'=>'0265449449',
            'age'=>22,
            'birthdate'=>date('Y-m-d'),
            'address'=>'tanta',
            'doctor_id'=>'1'
        ]);
        $settings = [
            new Setting(['name'=>'websiteName','value'=>'Medinova']),
            new Setting(['name'=>'homeButton','value'=>'Home']),
            new Setting(['name'=>'headerTitle','value'=>'WELCOME TO MEDINOVA']),
            new Setting(['name'=>'headerDescription','value'=>'Best Healthcare Solution In Your City']),
            new Setting(['name'=>'headerButton','value'=>'Find Doctor']),
            new Setting(['name'=>'contactButton','value'=>'Contact']),
            new Setting(['name'=>'examinationsButton','value'=>'My Examinations']),
            new Setting(['name'=>'profileButton','value'=>'Profile']),
            new Setting(['name'=>'aboutSectionTitle','value'=>'ABOUT US']),
            new Setting(['name'=>'aboutTitle','value'=>'Best Medical Care For Yourself and Your Family']),
            new Setting(['name'=>'aboutDescription','value'=>'Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam diam amet diam et eos sadipscing labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor consetetur takimata eirmod, dolores takimata consetetur invidunt magna dolores aliquyam dolores dolore. Amet erat amet et magna']),
            new Setting(['name'=>'appointmentSectionName','value'=>'APPOINTMENT']),
            new Setting(['name'=>'appointmentTitle','value'=>'Make An Appointment For Your Family']),
            new Setting(['name'=>'appointmentDescription','value'=>'Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.']),
            new Setting(['name'=>'appointmentCardTitle','value'=>'Book An Appointment']),
            new Setting(['name'=>'appointmentCardButton','value'=>'Make An Appointment']),
            new Setting(['name'=>'doctorSectionTitle','value'=>'OUR DOCTORS']),
            new Setting(['name'=>'doctorsButton','value'=>'Doctors']),
            new Setting(['name'=>'doctorTitle','value'=>'Qualified Healthcare Professionals']),
            new Setting(['name'=>'examinationsSectionTitle','value'=>'Examinations']),
            new Setting(['name'=>'examinationsDescription','value'=>'Down Below Your Examinations Records Let Us Know If There Is Any Problem.']),
            new Setting(['name'=>'examinationsTableTitle','value'=>'examinations Table']),
            new Setting(['name'=>'getInTouchTitle','value'=>'GET IN TOUCH']),
            new Setting(['name'=>'getInTouchDescriptoin','value'=>'No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor']),
            new Setting(['name'=>'address','value'=>'123 Street, New York, USA']),
            new Setting(['name'=>'email','value'=>'info@example.com']),
            new Setting(['name'=>'phone','value'=>'+012 345 67890']),
            new Setting(['name'=>'quickLinksTitle','value'=>'QUICK LINKS']),
            new Setting(['name'=>'socialLinksTitle','value'=>'SOCIAl LINKS']),
            new Setting(['name'=>'facebook','value'=>'SOCIAl LINKS']),
            new Setting(['name'=>'instgram','value'=>'SOCIAl LINKS']),
            new Setting(['name'=>'linkedIn','value'=>'SOCIAl LINKS']),
            new Setting(['name'=>'youtube','value'=>'SOCIAl LINKS']),
            new Setting(['name'=>'twitter','value'=>'SOCIAl LINKS']),
        ];
        foreach($settings as $setting)
        {
            Setting::create([
                'name'=>$setting->name,
                'value'=>$setting->value
            ]);
        }
    }
}
