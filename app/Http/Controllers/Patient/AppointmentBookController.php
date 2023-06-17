<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Models\AppointmentBook;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentbookStoreRequest;

class AppointmentBookController extends Controller
{
    public function store(AppointmentbookStoreRequest $request)
    {
        AppointmentBook::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'doctor_id'=>$request->doctor_id,
            'date'=>$request->date,
            'time'=>$request->time
        ]);
        toast('Appointment Has Been Set Successfully','success');
        return redirect()->back();
    }
}
