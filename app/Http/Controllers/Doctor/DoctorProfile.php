<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\DoctorUpdateRquest;
use App\Traits\ImageUpload;

class DoctorProfile extends Controller
{

    use ImageUpload;

    public function index(Doctor $doctor)
    {
        return view('Doctor.pages.Profile.index',['specialties'=>Specialty::get(),'doctor'=>$doctor]);
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
        toast('Profile updated successfully','success');
        return redirect()->back();
    }
}
