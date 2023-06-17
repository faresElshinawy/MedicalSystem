<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientExaminationController extends Controller
{
    public function index()
    {
            return view('Patient.Pages.Examination.index');
    }
}
