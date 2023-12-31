<?php

use App\Models\Feedback;
use App\Http\Livewire\Specialty;
use App\Http\Livewire\DoctorSearch;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\AppointmentBook;
use App\Http\Livewire\PatientExamination;
use App\Http\Controllers\Admin\AdminProfile;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\Doctor\DoctorProfile;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Doctor\NoteController;
use App\Http\Controllers\Patient\PatientProile;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Patient\HomeController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Patient\FeedbackController;
use App\Http\Controllers\admin\ExaminationController;
use App\Http\Controllers\Doctor\DoctorLoginController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Doctor\DoctorPatientController;
use App\Http\Controllers\Patient\PatientLoginController;
use App\Http\Controllers\Patient\PatientDoctorController;
use App\Http\Controllers\Admin\AdminAppointmentController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Doctor\DoctorStatisticsController;
use App\Http\Controllers\Patient\AppointmentBookController;
use App\Http\Controllers\Doctor\DoctorAppointmentController;
use App\Http\Controllers\Doctor\DoctorExaminationController;
use App\Http\Controllers\Patient\PatientExaminationController;
use App\Http\Controllers\Patient\PatientExaminationsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'prevent-back-history'],function(){

    Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
        Route::controller(LoginController::class)->group(function(){
            Route::get('login','index')->name('login');
            Route::post('login','authenticate')->name('store');
            Route::post('logout','logout')->name('logout');
        })->middleware('guest');
    });

    Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'IsAdmin'],function(){
        Route::controller(AdminController::class)->prefix('admins')->group(function(){
            Route::get('/','index')->name('admins');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('/{admin}/edit','edit')->name('edit');
            Route::put('/{admin}/update','update')->name('update');
            Route::delete('/{admin}/delete','destroy')->name('delete');
        });

        Route::controller(SpecialtyController::class)->prefix('specialty')->as('specialties.')->group(function(){
            Route::get('/','index')->name('all');
            Route::get('/create','create')->name('create');
            Route::post('/create','store')->name('store');
            Route::get('/{specialty}/edit','edit')->name('edit');
            Route::put('/{specialty}/update','update')->name('update');
            Route::delete('/{specialty}/delete','destroy')->name('delete');
        });

        Route::controller(DoctorController::class)->prefix('doctors')->as('doctors.')->group(function(){
            Route::get('/','index')->name('all');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('{doctor}/edit','edit')->name('edit');
            Route::put('{doctor}/update','update')->name('update');
            Route::delete('{doctor}/update','destroy')->name('delete');
        });

        Route::controller(PatientController::class)->prefix("patient")->as('patients.')->group(function(){
            Route::get('/','index')->name('all');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('{patient}/edit','edit')->name('edit');
            Route::put('{patient}/update','update')->name('update');
            Route::delete('{patient}/delete','destroy')->name('delete');
        });

        Route::controller(ExaminationController::class)->prefix('examination')->as('examination.')->group(function(){
            Route::get('/','index')->name('all');
        });

        Route::controller(StatisticsController::class)->prefix('statistics')->as('Statistics.')->group(function(){
            Route::get('/','index')->name('all');
        });

        Route::controller(AdminProfile::class)->prefix('profile')->as('profile.')->group(function(){
            Route::get('/{admin}','index')->name('show');
            Route::put('{admin}/update','update')->name('update');
        });

        Route::controller(AdminFeedbackController::class)->prefix('feedback')->as('feedback.')->group(function(){
            Route::get('/','index')->name('all');
            Route::delete('{feedback}/delete','destroy')->name('delete');
        });

        Route::controller(AdminAppointmentController::class)->prefix('appointments')->as('appointments.')->group(function(){
            Route::get('/','index')->name('all');
            Route::patch('/{appointmentbook}/update','update')->name('update');
            Route::delete('{appointmentbook}/delete','destroy')->name('delete');
        });

        Route::controller(SettingController::class)->prefix('settings')->as('settings.')->group(function(){
            Route::get('/','index')->name('all');
            Route::get('{setting}/edit','edit')->name('edit');
            Route::put('{setting}/update','update')->name('update');
        });

    });

    Route::group(['prefix'=>'doctor','as'=>'doctor.'],function(){
        Route::controller(DoctorLoginController::class)->group(function(){
            Route::get('login','index')->name('login');
            Route::post('login','authenticate')->name('store');
            Route::post('logout','logout')->name('logout');
        })->middleware('guest');
    });

    Route::group(['prefix'=>'doctor','as'=>'doctor.','middleware'=>'IsDoctor'],function(){

        Route::controller(DoctorStatisticsController::class)->prefix('statistics')->as('statistics.')->group(function(){
            Route::get('/','index')->name('all');
        });


        Route::controller(DoctorPatientController::class)->prefix("patients")->as('patients.')->group(function(){
            Route::get('/','index')->name('all');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('{patient}/edit','edit')->name('edit');
            Route::put('{patient}/update','update')->name('update');
            Route::delete('{patient}/delete','destroy')->name('delete');
        });

        Route::controller(DoctorExaminationController::class)->prefix('examination')->as('examination.')->group(function(){
            Route::get('/','index')->name('all');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('{examination}/edit','edit')->name('edit');
            Route::put('{examination}/update','update')->name('update');
            Route::delete('{examination}/delete','destroy')->name('delete');
        });

        Route::controller(NoteController::class)->prefix('patient')->as('patient.notes.')->group(function(){
            Route::get('{patient}/notes','index')->name('all');
            Route::get('{patient}/note/create','create')->name('create');
            Route::post('{patient}/notes/store','store')->name('store');
            Route::get('{patient}/notes/{note}/edit','edit')->name('edit');
            Route::put('notes/{note}/update','update')->name('update');
            Route::delete('notes/{note}/delete','destroy')->name('delete');
        });

        Route::controller(DoctorProfile::class)->prefix('profile')->as('profile.')->group(function(){
            Route::get('/{doctor}','index')->name('show');
            Route::put('{doctor}/update','update')->name('update');
        });

        Route::controller(DoctorAppointmentController::class)->prefix('appointments')->as('appointments.')->group(function(){
            Route::get('/','index')->name('all');
            Route::patch('/{appointmentbook}/update','update')->name('update');
            Route::delete('{appointmentbook}/delete','destroy')->name('delete');
        });

    });

    // patient pov
    Route::group([],function () {
        Route::controller(HomeController::class)->as('home.')->group(function(){
            Route::get('/','index')->name('main');
        });
        Route::controller(PatientDoctorController::class)->prefix('doctors')->as('home.doctor.')->group(function(){
            Route::get('/','index')->name('show');
        });

        Route::controller(AppointmentBookController::class)->prefix('appointment')->as('appointment.')->group(function(){
            Route::post('store','store')->name('store');
        });

        Route::group(['middleware'=>'IsPatient'],function(){


            Route::controller(FeedbackController::class)->prefix('patient/feedback')->as('home.feedback.')->group(function(){
                Route::get('/','index')->name('show');
                Route::post('/store','store')->name('store');
            });

            Route::controller(PatientExaminationController::class)->prefix('patient/examination')->as('home.patient.examination.')->group(function(){
                Route::get('/','index')->name('show');
            });

            Route::prefix('patient')->as('patient.')->group(function () {
                Route::controller(PatientProile::class)->prefix('profile')->as('profile.')->group(function(){
                    Route::get('{patient}/{name}','index')->name('show');
                    Route::put('{patient}/update','update')->name('update');
                });
            })->middleware('IsPatient');

        });

        Route::group(['prefix'=>'patient'],function(){
            Route::controller(PatientLoginController::class)->as('patient.')->group(function(){
                Route::get('login','index')->name('login');
                Route::post('login/store','store')->name('login.store');
                Route::delete('logout','logout')->name('logout');
            })->middleware('guest');
        });
    });
});



