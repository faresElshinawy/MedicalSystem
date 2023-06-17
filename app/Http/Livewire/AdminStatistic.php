<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;
use App\Models\Examination;
use Livewire\WithPagination;

class AdminStatistic extends Component
{
    use WithPagination;

    protected $doctorsQuery;
    protected $patientsQuery;
    protected $examinationsQuery;
    protected $doctorsCountQuery;
    protected $patientsCountQuery;
    protected $examinationsCountQuery;
    protected $totalRevenueQuery;
    public $timeStarts;
    public $timeEnds;

    public function render()
    {

            $this->doctorsQuery = Doctor::query()->with('specialty')->orderBy('created_at','DESC');
            $this->patientsQuery = Patient::query()->with('doctor')->orderBy('created_at','DESC');
            $this->examinationsQuery = Examination::query()->with('doctor','patient')->orderBy('time','DESC');
            $this->doctorsCountQuery = Doctor::query();
            $this->patientsCountQuery = Patient::query();
            $this->examinationsCountQuery = Examination::query();
            $this->totalRevenueQuery = Examination::query();

            if($this->timeStarts && $this->timeEnds)
            {
                $this->patientsQuery->whereBetween('time',[$this->timeStarts,$this->timeEnds]);
                $this->examinationsQuery->whereBetween('time',[$this->timeStarts,$this->timeEnds]);
                $this->patientsCountQuery->whereBetween('time',[$this->timeStarts,$this->timeEnds]);
                $this->examinationsCountQuery->whereBetween('time',[$this->timeStarts,$this->timeEnds]);
                $this->totalRevenueQuery = Examination::whereBetween('time',[$this->timeStarts,$this->timeEnds])->sum('price') - Examination::whereBetween('time',[$this->timeStarts,$this->timeEnds])->sum('offer');
            }
            else
            {
                $this->totalRevenueQuery = Examination::sum('price') - Examination::sum('offer');
            }

        return view('livewire.admin-statistic',[
            'doctors'=>$this->doctorsQuery->paginate(10),
            'patients'=>$this->patientsQuery->paginate(10),
            'examinations'=>$this->examinationsQuery->paginate(10),
            'doctorsCount'=>$this->doctorsQuery->count(),
            'patientsCount'=>$this->patientsCountQuery->count(),
            'examinationsCount'=>$this->examinationsCountQuery->count(),
            'totalRevenue'=>(int) $this->totalRevenueQuery,
        ]);
    }

}
