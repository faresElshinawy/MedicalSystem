<?php

namespace App\Http\Controllers\Patient;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientDoctorController extends Controller
{
    public function index()
    {
        return view('Patient.Pages.Doctor.index',[
            'doctors'=>Doctor::get()
        ]);
    }
}
