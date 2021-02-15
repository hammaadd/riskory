<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUser extends Component
{
    public $search;

    // protected $queryString = ['search'];

    public function mount()
    {
        $this->reset('search');
    }

  
    public function render()
    {
        $users = false;
        if(!empty($this->search)){
            $users = User::where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('fname', 'like', '%'.$this->search.'%')
                    ->orWhere('lname', 'like', '%'.$this->search.'%')
                    ->limit(4)->get();
        }
        return view('livewire.search-user',compact('users'));
    }
}
