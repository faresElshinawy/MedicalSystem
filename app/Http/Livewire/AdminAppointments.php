<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AppointmentBook;

class AdminAppointments extends Component
{

    use WithPagination;

    public $search = '';
    protected $queryString = ['search'];
    protected $query;
    public $timeStarts;
    public $timeEnds;



    public function render()
    {
        $this->query = AppointmentBook::query();
        if($this->search)
        {
            $this->query->where('name','like',"%{$this->search}%");
        }
        if($this->timeStarts && $this->timeEnds)
        {
            $this->query->whereBetween('date',[$this->timeStarts,$this->timeEnds]);
        }
        return view('livewire.admin-appointments',['appointments'=>$this->query->with('doctor')->paginate(10)]);
    }


    public function updated($property)
    {
        if($property == 'search')
        {
            $this->resetPage();
        }
    }
}
