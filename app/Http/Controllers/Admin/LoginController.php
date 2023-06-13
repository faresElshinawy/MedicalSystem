<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdminLoginRequest;

class LoginController extends Controller
{

    public function index()
    {
        if(Auth::check())
        {
            toast('you can not access this page while you are loged in','success');
            return redirect()->route('admin.Statistics.all');
        }
        return view('Admin.pages.Login.index');
    }

    public function authenticate(AdminLoginRequest $request)
    {

        $credentials = $request->only(['email','password']);
        if(Auth::guard('admin')->attempt($credentials)){
            toast('Loged in successfully','success');
            return redirect()->intended('admin/statistics');
        }
        session()->flush();
        toast('the provider credential do not match our records','error');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        session()->regenerate();
        session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
