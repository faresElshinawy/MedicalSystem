<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Specialty;
use Livewire\WithPagination;

class SpecialtySearch extends Component
{
    use WithPagination;

    public string $search = '';
    protected $queryString = ['search'];

    public function render()
    {
        $query = Specialty::query();
        if($this->search)
        {
            $query->where('name','like',"%{$this->search}%");
        }
        return view('livewire.specialty-search',['specialties'=>$query->paginate(15)]);
    }

    public function updated($property)
    {
        if($property = 'search')
        {
            $this->resetPage();
        }
    }
}
