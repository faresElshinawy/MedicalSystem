<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PatientSearch extends Component
{

    use WithPagination;

    public $search = '';
    protected $queryString = ['search'];

    public function render()
    {
        if(Auth::guard('doctor')->check())
        {
            $query = Patient::where('doctor_id',Auth::guard('doctor')->user()->id);
        }
        else
        {
            $query = Patient::query();
        }
        if($this->search)
        {
            if(Auth::guard('doctor')->check())
            {
                $query->where('doctor_id',Auth::guard('doctor')->user()->id)->where('name','like',"%{$this->search}%")->orWhere('phone','like',"%{$this->search}%");
            }
            else
            {
                $query->where('name','like',"%{$this->search}%")->orWhere('phone','like',"%{$this->search}%");
            }
        }
        return view('livewire.patient-search',['patients'=>$query->with('doctor')->paginate(15)]);
    }
}
