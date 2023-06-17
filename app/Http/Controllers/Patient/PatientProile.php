<?php

namespace App\Http\Controllers\Patient;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PatientUpdateRequest;
use App\Traits\GetAge;
use App\Traits\ImageUpload;

class PatientProile extends Controller
{

    use GetAge;
    use ImageUpload;

    public function index(Patient $patient)
    {
        return view('Patient.Pages.profile.index',[
            'patient'=>$patient,
            'active'=>'active'
        ]);
    }

    public function update(PatientUpdateRequest $request,Patient $patient)
    {
        $patient->update([
            'name'=>$request->name,
            'password'=>$request->password ? Hash::make($request->password) : $patient->password,
            'phone'=>$request->phone,
            'birthdate'=>$request->birthdate,
            'age'=>$this->getAge($request->birthdate)->age,
            'address'=>$request->address,
            'image'=>$this->upload($request,Patient::$uploadPath,$patient->image),
        ]);
        toast('patient updated successfully','success');
        return redirect()->back();
    }
}
