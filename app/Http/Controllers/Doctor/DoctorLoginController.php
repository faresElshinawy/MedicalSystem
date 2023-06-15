<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DoctorLoginRequest;

class DoctorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:doctor')->except('logout');
    }

    public function index()
    {
        if(Auth::guard('doctor')->check())
        {
            toast('you can not access this page while you are loged in','success');
            return redirect()->route('doctor.Statistics.all');
        }
        return view('doctor.pages.Login.index');
    }

    public function authenticate(DoctorLoginRequest $request)
    {

        $credentials = $request->only(['email','password']);
        if(Auth::guard('doctor')->attempt($credentials)){
            toast('Welcome '.Auth::guard('doctor')->user()->name,'success');
            return redirect()->intended('doctor/statistics');
        }
        session()->flush();
        toast('the provider credential do not match our records','error');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return redirect()->route('doctor.login');
    }
}
