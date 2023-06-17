<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Examination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class StatisticsController extends Controller
{
    public function index()
    {
        // $doctors = Cache::remember('doctors', 60*60, function () {
        //     return Doctor::query()->with('specialty')->orderBy('created_at','DESC')->limit(6)->get();
        // });

        // $patients = Cache::remember('patients', 60*60, function () {
        //     return Patient::query()->with('doctor')->orderBy('created_at','DESC')->limit(6)->get();
        // });

        // $examinations = Cache::remember('examinations', 60*60, function () {
        //     return Examination::query()->with('doctor','patient')->orderBy('time','DESC')->limit(6)->get();
        // });

        // $doctorsCount = Doctor::count();
        // $patientsCount = Patient::count();
        // $examinationsCount = Examination::count();
        // $totalRevenue = Examination::sum('price');
        // compact('doctors','patients','examinations','examinationsCount','doctorsCount','patientsCount','totalRevenue');
        return view('Admin.pages.Statistics.index');
    }
}
