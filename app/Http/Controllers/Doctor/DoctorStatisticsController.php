<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Examination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DoctorStatisticsController extends Controller
{
    public function index()
    {
        return view('Doctor.pages.Statistics.index');
    }
}
