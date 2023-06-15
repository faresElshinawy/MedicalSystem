<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Patient;
use App\Models\Examination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExaminationStoreRequest;
use App\Http\Requests\ExaminationUpdateRequest;
use App\Traits\FileUpload;

class DoctorExaminationController extends Controller
{

    use FileUpload;

    public function index()
    {
        return view('Doctor.pages.Examination.index');
    }

    public function create()
    {
        return view('Doctor.pages.Examination.create',['patients'=>Patient::get()]);
    }

    public function store(ExaminationStoreRequest $request)
    {
        Examination::create([
            'doctor_id'=>Auth::guard('doctor')->user()->id,
            'patient_id'=>$request->patient,
            'price'=>$request->price,
            'offer'=>$request->offer,
            'file'=>$this->upload($request,Examination::$uploadPath),
            'title'=>$request->title,
            'description'=>$request->description,
            'time'=>$request->time
        ]);

        toast('Examination Added Successfully','success');
        return redirect()->back();
    }

    public function edit(Examination $examination)
    {
        return view('Doctor.pages.Examination.edit',['examination'=>$examination,'patients'=>Patient::get(),'statusOptions'=>['pending','cancel','success']]);
    }

    public function update(ExaminationUpdateRequest $request,Examination $examination)
    {
        $examination->update([
            'doctor_id'=>Auth::guard('doctor')->user()->id,
            'patient_id'=>$request->patient,
            'price'=>$request->price,
            'offer'=>$request->offer,
            'file'=>$this->upload($request,Examination::$uploadPath,$examination->file),
            'title'=>$request->title,
            'description'=>$request->description,
            'time'=>$request->time
        ]);

        toast('Examination Updated Successfully','success');
        return redirect()->back();
    }

    public function destroy(Examination $examination)
    {
        $this->remove(Examination::$uploadPath,$examination->file);
        $examination->delete();
        toast('Examination Deleted Successfully','success');
        return redirect()->back();
    }
}
