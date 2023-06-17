<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        return view('Admin.pages.Feedback.index');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        toast('Feedback Deleted Successfully','success');
        return redirect()->back();
    }
}
