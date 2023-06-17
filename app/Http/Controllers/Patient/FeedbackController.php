<?php

namespace App\Http\Controllers\Patient;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackStoreRequest;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('Patient.Pages.contact.index');
    }

    public function store(FeedbackStoreRequest $request)
    {
        Feedback::create([
            'name'=>$request->name,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'patient_id'=>Auth::guard('patient')->user()->id
        ]);
        toast('Feedback Has Been Sent','success');
        return redirect()->back();
    }
}
