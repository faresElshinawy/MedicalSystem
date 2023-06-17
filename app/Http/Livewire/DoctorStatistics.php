<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;
use App\Models\Examination;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class DoctorStatistics extends Component
{
    use WithPagination;

    protected $patientsCountQuery;
    protected $examinationsCountQuery;
    protected $totalRevenueQuery;
    protected $patientAverageAgeQuery;
    protected $patientsQuery;
    protected $examinationsQuery;
    public $timeStarts;
    public $timeEnds;


    public function render()
    {
        $doctor_id = Auth::guard('doctor')->user()->id;
        $this->patientsQuery = Patient::query();
        $this->examinationsQuery = Examination::query();
        if($this->timeStarts && $this->timeEnds)
        {
            $this->patientsQuery->whereBetween('time',[$this->timeStarts,$this->timeEnds])->get();
            $this->examinationsQuery->whereBetween('time',[$this->timeStarts,$this->timeEnds]);
            $this->patientsCountQuery = Patient::whereBetween('time',[$this->timeStarts,$this->timeEnds]);
            $this->patientAverageAgeQuery = Patient::where('doctor_id',$doctor_id)->whereBetween('time',[$this->timeStarts,$this->timeEnds])->avg("age");
            $this->examinationsCountQuery = Examination::whereBetween('time',[$this->timeStarts,$this->timeEnds]);
            $this->totalRevenueQuery = Examination::where('doctor_id',$doctor_id)->whereBetween('time',[$this->timeStarts,$this->timeEnds])->sum('price') - Examination::where('doctor_id',$doctor_id)->whereBetween('time',[$this->timeStarts,$this->timeEnds])->sum('offer');
        }
        else
        {
            $this->patientsCountQuery = Patient::query();
            $this->patientAverageAgeQuery = Patient::where('doctor_id',$doctor_id)->avg("age");;
            $this->examinationsCountQuery = Examination::query();
            $this->totalRevenueQuery = Examination::where('doctor_id',$doctor_id)->sum('price') - Examination::where('doctor_id',$doctor_id)->sum('offer');
        }

        return view('livewire.doctor-statistics',[
            'patients'=>$this->patientsQuery->where('doctor_id',$doctor_id)->with('doctor')->orderBy('time','DESC')->paginate(10),
            'examinations'=>$this->examinationsQuery->where('doctor_id',$doctor_id)->with('doctor','patient')->orderBy('time','DESC')->paginate(10),
            'patientAverageAge'=>(int) $this->patientAverageAgeQuery,
            'patientsCount'=>$this->patientsCountQuery->where('doctor_id',$doctor_id)->count(),
            'examinationsCount'=>$this->examinationsCountQuery->where('doctor_id',$doctor_id)->count(),
            'totalRevenue'=>$this->totalRevenueQuery
        ]);
    }

    public function updated($property)
    {
        if($property == 'timeEnds'){
            $this->resetPage();
        }
    }
}
