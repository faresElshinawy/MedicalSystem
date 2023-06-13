<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Requests\SpecialtyStoreRequest;
use App\Http\Requests\SpecialtyUpdateRequest;

class SpecialtyController extends Controller
{

    use ImageUpload;

    public function index()
    {
        return view('Admin.pages.specialties.index');
    }

    public function create()
    {
        return view('Admin.pages.specialties.create');
    }

    public function store(SpecialtyStoreRequest $request)
    {
        Specialty::create([
            'name'=>$request->name,
            'image'=>$this->upload($request,Specialty::$uploadPath)
        ]);
        toast('specialty added successfully','success');
        return redirect()->back();
    }

    public function edit(Specialty $specialty)
    {
        return view('Admin.pages.specialties.edit',compact('specialty'));
    }

    public function update(SpecialtyUpdateRequest $request,Specialty $specialty)
    {
        $specialty->update([
            'name'=>$request->name,
            'image'=>$this->upload($request,Specialty::$uploadPath,$specialty->image)
        ]);
        toast('specialty updated successfully','success');
        return redirect()->back();
    }

    public function destroy(Specialty $specialty)
    {
        $this->remove(Specialty::$uploadPath,$specialty->image);
        $specialty->delete();
        toast('specialty deleted successfully','success');
        return redirect()->back();
    }
}
