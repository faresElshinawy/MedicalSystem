<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Traits\GetAge;
use App\Traits\ImageUpload;

class PatientController extends Controller
{

    use GetAge;
    use ImageUpload;

    public function index()
    {
        return view("Admin.pages.Patients.index");
    }

    public function create()
    {
        return view('Admin.pages.Patients.create',['doctors'=>Doctor::get()]);
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
            'doctor_id'=>$request->doctor
        ]);
        toast('patient added successfully','success');
        return redirect()->back();
    }

    public function edit(Patient $patient)
    {
        return view('Admin.pages.Patients.edit',['patient'=>$patient,'doctors'=>Doctor::get()]);
    }

    public function update(PatientUpdateRequest $request,Patient $patient)
    {
        $patient->update([
            'name'=>$request->name,
            'password'=>$request->password,
            'phone'=>$request->phone,
            'birthdate'=>$request->birthdate,
            'age'=>$this->getAge($request->birthdate)->age,
            'address'=>$request->address,
            'image'=>$this->upload($request,Patient::$uploadPath,$patient->image),
            'doctor_id'=>$request->doctor
        ]);
        toast('patient updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Patient $patient)
    {
        $this->remove(Patient::$uploadPath,$patient->image);
        $patient->delete();
        toast('patient deleted successfully','success');
        return redirect()->back();
    }
}
