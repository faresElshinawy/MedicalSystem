<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Requests\AdminStore;
use App\Http\Requests\AdminUpdate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use ImageUpload;

    public function index()
    {
        return view('Admin.pages.Admins.index');
    }

    public function create()
    {
        return view('Admin.pages.Admins.create');
    }

    public function store(AdminStore $request)
    {
        Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'image'=>$this->upload($request,Admin::$uploadPath)
        ]);
        toast('Admin added successfully','success');
        return redirect()->back();
    }

    public function edit(Admin $admin)
    {
        return view('Admin.pages.Admins.update',compact('admin'));
    }

    public function update(AdminUpdate $request,Admin $admin)
    {
        $passowrd = Hash::make($request->password);
        $admin->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password??$admin->password,
            'phone'=>$request->phone,
            'image'=>$this->upload($request,Admin::$uploadPath,$admin->image)
        ]);
        toast('admin updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Admin $admin)
    {
        $this->remove(Admin::$uploadPath,$admin->image);
        $admin->delete();
        toast('admin deleted successfully','success');
        return redirect()->back();
    }

}
