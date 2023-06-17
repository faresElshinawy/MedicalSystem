<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\Specialty;
use Livewire\Component;

class AppointmentBook extends Component
{
    public $specialties;
    public $specialty_id;
    protected $query;

    public function mount()
    {
        $this->specialties = Specialty::get();
    }

    public function render()
    {
        $this->query = Doctor::query();
        if($this->specialty_id)
        {
            $this->query->where('specialty_id',$this->specialty_id);
        }
        return view('livewire.appointment-book',['doctors'=> $this->query->get()]);
    }
}
