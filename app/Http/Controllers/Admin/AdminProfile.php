<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminUpdate;

class AdminProfile extends Controller
{

    use ImageUpload;

    public function index(Admin $admin)
    {
        return view('Admin.pages.Profile.index',['admin'=>$admin]);
    }

    public function update(AdminUpdate $request,admin $admin)
    {
        $admin->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password??$admin->password,
            'phone'=>$request->phone,
            'image'=>$this->upload($request,Admin::$uploadPath,$admin->image)
        ]);
        toast('Profile updated successfully','success');
        return redirect()->back();
    }
}
