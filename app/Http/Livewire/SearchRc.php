<?php

namespace App\Http\Livewire;

use App\Models\RiskControl;
use App\Models\User;
use Livewire\Component;

class SearchRc extends Component
{
    public $search;

    // protected $queryString = ['search'];

    public function mount()
    {
        $this->reset('search');
    }

  
    public function render()
    {
        // $users = false;
        $rcs = RiskControl::whereNotIn('status',['P','R'])->when(!empty($this->search), function ($query){
            return $query->where('title', 'like', '%'.$this->search.'%')
            ->orWhere('description', 'like', '%'.$this->search.'%')->limit(5)->get();});
        // if(!empty($this->search)){
        //     $users = User::where('name', 'like', '%'.$this->search.'%')
        //             ->orWhere('fname', 'like', '%'.$this->search.'%')
        //             ->orWhere('lname', 'like', '%'.$this->search.'%')
        //             ->limit(4)->get();
        // }
        return view('livewire.search-rc',compact('rcs'));
        
    }
}

// ->with(['controls.control'=>function($query2){
//     $query2->where('name','like', '%'.$this->search.'%');
// }])
// ->with('controls'=>[function($query2){
                
// }])}