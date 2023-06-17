<?php

namespace App\Http\Livewire;

use App\Models\Feedback;
use Livewire\Component;
use Livewire\WithPagination;

class AdminFeedback extends Component
{

    use WithPagination;

    public $search = '';
    protected $queryString = ['search'];
    protected $query;

    public function render()
    {
        $this->query = Feedback::query();
        if($this->search)
        {
            $this->query->where('name','like',"%{$this->search}%");
        }
        return view('livewire.admin-feedback',['feedbacks'=>$this->query->paginate(10)]);
    }

    public function update($property)
    {
        if($property == 'search')
        {
            $this->resetPage();
        }
    }
}
