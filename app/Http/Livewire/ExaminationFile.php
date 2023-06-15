<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ExaminationFile extends Component
{
    public $uploadFile = false;


    public function render()
    {
        return view('livewire.examination-file');
    }
    public function toggle()
    {
        $this->uploadFile = !$this->uploadFile;
    }

    public function updated($property)
    {
        if($property == 'uploadFile')
        {
            $this->resetPage();
        }
    }
}
