<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AppointmentBook;
use Illuminate\Support\Facades\Auth;

class DoctorAppointmentBooked extends Component
{

    use WithPagination;

    public $search = '';
    protected $queryString = ['search'];
    protected $query;
    public $timeStarts;
    public $timeEnds;



    public function render()
    {
        $doctor_id = Auth::guard('doctor')->user()->id;
        $this->query = AppointmentBook::query()->where('doctor_id',$doctor_id);
        if($this->search)
        {
            $this->query->where('name','like',"%{$this->search}%");
        }
        if($this->timeStarts && $this->timeEnds)
        {
            $this->query->whereBetween('date',[$this->timeStarts,$this->timeEnds]);
        }
        return view('livewire.doctor-appointment-booked',['appointments'=>$this->query->paginate(10)]);
    }


    public function updated($property)
    {
        if($property == 'search')
        {
            $this->resetPage();
        }
    }
}
