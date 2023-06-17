<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PatientLoginRequest;

class PatientLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:patient')->except('logout');
    }

    public function index()
    {
        return view('Patient.Pages.login.index');
    }

    public function store(PatientLoginRequest $request)
    {
        $credentials = $request->only('name','password');
        if(Auth::guard('patient')->attempt($credentials))
        {
            toast('welcome '. Auth::guard('patient')->user()->name,'success');
            return redirect()->intended('/');
        }
        toast('wrong credentials no record found','error');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::guard('patient')->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return redirect()->route('patient.login');
    }
}
