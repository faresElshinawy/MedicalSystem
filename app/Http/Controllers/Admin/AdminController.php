<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Requests\AdminStore;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

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

    public function update()
    {

    }

}
