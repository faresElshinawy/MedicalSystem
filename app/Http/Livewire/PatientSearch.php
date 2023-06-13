<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class PatientSearch extends Component
{

    use WithPagination;

    public $search = '';
    protected $queryString = ['search'];

    public function render()
    {
        $query = Patient::query();
        if($this->search)
        {
            $query->where('name','like',"%{$this->search}%")->orWhere('phone','like',"%{$this->search}%");
        }
        return view('livewire.patient-search',['patients'=>$query->with('doctor')->paginate(15)]);
    }
}
