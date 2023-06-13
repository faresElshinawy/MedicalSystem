<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;
use App\Models\Examination;
use Livewire\WithPagination;

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
        $this->filters = ['1'=>'Doctor','2'=>'Patient','3'=>'time'];
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
                $query = Patient::get();
            }
            elseif($this->selectedFilter == '3')
            {
                $query = Examination::query()->select('time')->orderBy('time','ASC')->distinct()->get();
            }
            $this->selectedFilterResults = $query;
        }
        else
        {
            return null;
        }
    }

    public function results()
    {
        if($this->selectedFilter)
        {
            if($this->selectedFilter == '1')
            {
                $this->query->orWhere('doctor_id',$this->secondFilterValue);
            }
            elseif($this->selectedFilter == '2')
            {
                $this->query->orWhere('patient_id',$this->secondFilterValue);

            }
            // elseif($this->selectedFilter == '3')
            // {
            //     $this->query->whereBetween('created_at',[$this->timeStarts,$this->timeEnds]);
            // }
            return $this->query;
        }
        return null;
    }


    public function render()
    {
        $this->query = Examination::query();

        if($this->search)
        {
            $this->query->where('title','like',"%{$this->search}%")->orWhere('description','like',"%{$this->search}%");
        }
        elseif($this->selectedFilter == '3')
        {
            $this->query->whereBetween('time',[$this->timeStarts,$this->timeEnds]);
        }
        $query = $this->results() ?? $this->query;
        return view('livewire.examination-search',['results'=>$query->with('doctor','patient')->paginate(15)]);
    }

    public function updated($property)
    {
        if($property == 'search')
        {
            $this->resetPage();
        }
    }

}
