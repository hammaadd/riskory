<?php

namespace App\Http\Livewire;

use App\Models\Control;
use Livewire\Component;

class Categories extends Component
{

    public $page;
    public $perPage;
    public $req;


    public function mount($page, $perPage){
        $this->page = $page ? $page : 1;
        $this->perPage = $perPage ? $perPage : 1;
    }
    public function render()
    {
        if($this->req == 'industries'){
            $controls = Control::where('status','=','1')->where('type','industry')->with('parent')->with('followers')->paginate($this->perPage, ['*'], null, $this->page);
            
        }elseif($this->req == 'bframeworks'){
            $controls = Control::where('status','=','1')->where('type','bframework')->with('parent')->with('followers')->paginate($this->perPage, ['*'], null, $this->page);
           
        }elseif($this->req == 'bprocesses'){
            $controls = Control::where('status','=','1')->where('type','bprocess')->with('parent')->with('followers')->paginate($this->perPage, ['*'], null, $this->page);
        }
        return view('livewire.categories',['data'=>$controls,'page' => $this->page]);
    }
}
