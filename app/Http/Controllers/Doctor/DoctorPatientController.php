<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Doctor;
use App\Traits\GetAge;
use App\Models\Patient;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;

class DoctorPatientController extends Controller
{
    use GetAge;
    use ImageUpload;

    public function index()
    {
        return view("Doctor.pages.Patients.index");
    }

    public function create()
    {
        return view('Doctor.pages.Patients.create');
    }

    public function store(PatientStoreRequest $request)
    {
        Patient::create([
            'name'=>$request->name,
            'password'=>$request->password,
            'phone'=>$request->phone,
            'birthdate'=>$request->birthdate,
            'age'=>$this->getAge($request->birthdate)->age,
            'address'=>$request->address,
            'image'=>$this->upload($request,Patient::$uploadPath) ?? '',
            'doctor_id'=>Auth::guard('doctor')->user()->id
        ]);
        toast('patient added successfully','success');
        return redirect()->back();
    }

    // public function edit(Patient $patient)
    // {
    //     return view('Doctor.pages.Patients.edit',['patient'=>$patient]);
    // }

    // public function update(PatientUpdateRequest $request,Patient $patient)
    // {
    //     $patient->update([
    //         'name'=>$request->name,
    //         'password'=>$request->password,
    //         'phone'=>$request->phone,
    //         'birthdate'=>$request->birthdate,
    //         'age'=>$this->getAge($request->birthdate)->age,
    //         'address'=>$request->address,
    //         'image'=>$this->upload($request,Patient::$uploadPath,$patient->image),
    //         'doctor_id'=>$request->doctor
    //     ]);
    //     toast('patient updated successfully','success');
    //     return redirect()->back();
    // }

    public function destroy(Patient $patient)
    {
        $this->remove(Patient::$uploadPath,$patient->image);
        $patient->delete();
        toast('patient deleted successfully','success');
        return redirect()->back();
    }
}
