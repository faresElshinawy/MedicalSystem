<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSearch extends Component
{

    use WithPagination;

    public $search = '';
    protected $queryString = ['search'];

    protected $rules = [
        'search' => ['min:3','max:255']
    ];


    public function render()
    {
        $query = Admin::query();
        if($this->search)
        {
            $query->where('name','like',"%{$this->search}%")->orWhere('email','like',"%{$this->search}%");
        }
        return view('livewire.admin-search',['admins'=>$query->paginate(15)]);
    }

    public function updated($property)
    {
        if($property == 'search')
        {
            $this->resetPage();
        }
    }

}
