<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use Livewire\Component;
use App\Models\Examination;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PatientExamination extends Component
{
    use WithPagination;

    public $search = '';
    protected $query;
    protected $queryString = ['search'];
    public $doctor_id;
    public $doctors;


    public function mount()
    {
        $this->doctors = Doctor::select('id','name')->get();
    }

    public function render()
    {
        $patient_id = Auth::guard('patient')->user()->id;

        $this->query = Examination::query();

        if($this->search)
        {
            $this->query->where('title','like',"%{$this->search}%")->orWhere('description','like',"%{$this->search}%");
        }
        elseif($this->doctor_id)
        {
            $this->query->where('doctor_id',$this->doctor_id);
        }

        // $query = $this->results();
        return view('livewire.patient-examination',['results'=>$this->query->where('patient_id',$patient_id)->with('doctor')->paginate(15)]);
    }

    public function updated($property)
    {
        if($property == 'search')
        {
            $this->resetPage();
        }
    }


        // public function results()
    // {
    //     if($this->selectedFilter)
    //     {
    //         if($this->selectedFilter == '1')
    //         {
    //             $this->query->Where('doctor_id',$this->secondFilterValue);
    //         }
    //         elseif($this->selectedFilter == '2')
    //         {
    //                 $this->query->Where('patient_id',$this->secondFilterValue);
    //         }
    //     }
    //     if(Auth::guard('doctor')->check()){
    //         return Examination::query()->where('doctor_id',Auth::guard('doctor')->user()->id);
    //     }
    //     else
    //     {
    //         return Examination::query();
    //     }
    // }
}
