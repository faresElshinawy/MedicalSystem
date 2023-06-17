<?php

namespace App\Http\Controllers\Patient;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('Patient.Pages.Home.index',[
            'doctors'=>Doctor::limit(6)->get()
        ]);
    }

}
