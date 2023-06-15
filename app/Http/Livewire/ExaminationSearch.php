<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;
use App\Models\Examination;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ExaminationSearch extends Component
{

    use WithPagination;

    public $search = '';
    protected $query;
    protected $queryString = ['search'];
    public $filters;
    public $selectedFilter;
    public $secondFilterValue;
    public $timeStarts;
    public $timeEnds;
    public $selectedFilterResults;


    public function mount()
    {
        if(Auth::guard('doctor')->check())
        {
            $this->filters = ['2'=>'Patient','3'=>'time'];
        }
        else
        {
            $this->filters = ['1'=>'Doctor','2'=>'Patient','3'=>'time'];
        }
    }


    public function changeSelectedFilter()
    {
        sleep(0.7);
        if(array_key_exists($this->selectedFilter,$this->filters))
        {
                if($this->selectedFilter == '1')
                {
                    $query = Doctor::get();
                }elseif($this->selectedFilter == '2')
                {
                    if(Auth::guard('doctor')->check())
                    {
                        $query = Patient::select('id','name')->where('doctor_id',Auth::guard('doctor')->user()->id)->get();
                    }
                    else
                    {
                        $query = Patient::get();
                    }
                }
                elseif($this->selectedFilter == '3')
                {
                    $query = Examination::query()->select('time')->orderBy('time','ASC')->distinct()->with('doctor','patient')->get();
                }
              return  $this->selectedFilterResults = $query;
            }
            $this->selectedFilter = null;
    }

    public function render()
    {

        if(Auth::guard('doctor')->check())
        {
            $this->query = Examination::query()->where('doctor_id',Auth::guard('doctor')->user()->id);
        }
        else
        {
            $this->query = Examination::query();
        }

        if($this->search)
        {
            $this->query->where('title','like',"%{$this->search}%")->orWhere('description','like',"%{$this->search}%");
        }
        elseif($this->selectedFilter == '3')
        {
            $this->query->whereBetween('time',[$this->timeStarts,$this->timeEnds]);
        }
        elseif($this->selectedFilter)
        {
            if($this->selectedFilter == '1')
            {
                $this->query->Where('doctor_id',$this->secondFilterValue);
            }
            elseif($this->selectedFilter == '2')
            {
                    $this->query->Where('patient_id',$this->secondFilterValue);
            }
        }
        // $query = $this->results();
        return view('livewire.examination-search',['results'=>$this->query->with('doctor','patient')->paginate(15)]);
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
