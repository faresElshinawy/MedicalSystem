<?php

use App\Http\Livewire\Specialty;
use App\Http\Livewire\DoctorSearch;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\admin\ExaminationController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\StatisticsController;

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

Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
    Route::controller(LoginController::class)->middleware('guest')->group(function(){
        Route::get('login','index')->name('login');
        Route::post('login','authenticate')->name('store');
    });
});

Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
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

    Route::delete('logout',[LoginController::class,'logout'])->name('logout');
});


