<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PatientImage extends Component
{

    public $uploadImage = false;

    public function render()
    {
        return view('livewire.patient-image');
    }

    public function toggle()
    {
        $this->uploadImage = !$this->uploadImage;
    }

    public function updated($property)
    {
        if($property == true)
        {
            $this->resetPage();
        }
    }

}
