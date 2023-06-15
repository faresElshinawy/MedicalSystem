<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Note;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoteStoreRequest;
use App\Http\Requests\NoteUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class NoteController extends Controller
{
    use WithPagination;
    public function index(Patient $patient)
    {
        return view('Doctor.pages.Note.index',['notes'=>Note::select('id','message')->where('patient_id',$patient->id,'&')->where('doctor_id',Auth::guard('doctor')->user()->id)->paginate(6),'patient'=>$patient]);
    }

    public function create(Patient $patient)
    {
        return view('Doctor.pages.Note.create',['patient'=>$patient]);
    }

    public function store(NoteStoreRequest $request,Patient $patient)
    {
        Note::create([
            'message'=>$request->message,
            'doctor_id'=>Auth::guard('doctor')->user()->id,
            'patient_id'=>$patient->id
        ]);

        toast('Note Added successfully','success');
        return redirect()->back();
    }

    public function edit(Patient $patient,Note $note)
    {
        return view('Doctor.pages.Note.edit',['patient'=>$patient,'note'=>$note]);
    }

    public function update(NoteUpdateRequest $request,Note $note)
    {
        $note->update([
            'message'=>$request->message,
        ]);

        toast('Note Upated successfully','success');
        return redirect()->back();
    }

    public function destroy(Note $note)
    {
        $note->delete();
        toast('Note Deleted successfully','success');
        return redirect()->back();
    }
}
