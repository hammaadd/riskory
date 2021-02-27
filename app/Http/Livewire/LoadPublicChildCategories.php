<?php

namespace App\Http\Livewire;

use App\Models\Control;
use Livewire\Component;

class LoadPublicChildCategories extends Component
{

    public $parent;
    public $loadMore;
    public $dat;

    public function mount($dat)
    {
        $this->dat = $dat;
        $this->parent =0;
        $this->loadMore = false; //show the button
    }

    public function loadMore($parent)
    {
        if($parent != $this->parent){
            $this->parent = $parent;
            $this->loadMore = true;
        }else{
            $this->parent = 0;
        }

    }

    public function render()
    {


            if($this->parent != 0){
                $data = Control::where('id','=',$this->parent)->first();
                return view('livewire.load-public-child-categories',['childs'=>$data]);
            }
            return view('livewire.load-public-child-categories');

    }
}
