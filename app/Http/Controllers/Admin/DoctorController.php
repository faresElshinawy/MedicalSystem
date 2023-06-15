<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Specialty;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\DoctorStoreRequest;
use App\Http\Requests\DoctorUpdateRquest;

class DoctorController extends Controller
{

    use ImageUpload;

    public function index()
    {
        return view('Admin.pages.Doctors.index');
    }

    public function create()
    {
        return view('Admin.pages.Doctors.create',['specialties'=>Specialty::get()]);
    }

    public function store(DoctorStoreRequest $request)
    {
        Doctor::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'image'=>$this->upload($request,Doctor::$uploadPath),
            'description'=>$request->description,
            'specialty_id'=>$request->specialty,
            'phone'=>$request->phone,
        ]);
        toast('doctor added successfully','success');
        return redirect()->back();
    }

    public function edit(Doctor $doctor)
    {
        $specialties = Specialty::get();
        return view('Admin.pages.Doctors.edit',compact('doctor','specialties'));
    }

    public function update(DoctorUpdateRquest $request,Doctor $doctor)
    {
        $doctor->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password ? Hash::make($request->password) : $doctor->password,
            'image'=>$this->upload($request,Doctor::$uploadPath,$doctor->image),
            'description'=>$request->description,
            'specialty_id'=>$request->specialty,
            'phone'=>$request->phone,
        ]);
        toast('doctor updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Doctor $doctor)
    {
        $this->remove(Doctor::$uploadPath,$doctor->image);
        $doctor->delete();
        toast('doctor deleted successfully','success');
        return redirect()->back();
    }
}
