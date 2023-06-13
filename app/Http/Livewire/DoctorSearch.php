<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use Livewire\Component;
use Livewire\WithPagination;

class DoctorSearch extends Component
{

    use WithPagination;

    public $search = '';
    protected $queryString = ['search'];

    public function render()
    {
        $query = Doctor::query();
        if($this->search)
        {
            $query->where('name','like',"%{$this->search}%")->orWhere('phone','like',"%{$this->search}%");
        }
        return view('livewire.doctor-search',['doctors'=>$query->with('Specialty')->paginate(15)]);
    }

    public function updated($property)
    {
        if($property == 'search')
        {
            $this->resetPage();
        }
    }
}
