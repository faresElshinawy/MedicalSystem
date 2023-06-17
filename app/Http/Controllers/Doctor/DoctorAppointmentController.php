<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Models\AppointmentBook;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentUpdateRequest;

class DoctorAppointmentController extends Controller
{
    public function index()
    {
        return view('Doctor.pages.Appointment.index');
    }

    public function update(AppointmentUpdateRequest $request,AppointmentBook $appointmentbook)
    {
        $appointmentbook->update([
            'status'=>$request->status
        ]);
        toast('status has been updated to '.$request->status,'success');
        return redirect()->back();
    }

    public function destroy(AppointmentBook $appointmentbook)
    {
        $appointmentbook->delete();
        toast('appointment has been deleted successfully','success');
        return redirect()->back();
    }
}
