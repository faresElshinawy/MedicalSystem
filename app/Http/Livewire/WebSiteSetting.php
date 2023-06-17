<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class WebSiteSetting extends Component
{

    use WithPagination;

    public $search = '';
    protected $query;
    protected $queryString = ['search'];

    public function render()
    {
        $this->query = Setting::query();

        if($this->search)
        {
            $this->query->where('name','like',"%{$this->search}%");
        }

        return view('livewire.web-site-setting',[
            'settings'=>$this->query->paginate(10)
        ]);
    }

    public function updated($property)
    {
        if($property == 'search')
        {
            $this->resetPage();
        }
    }
}
