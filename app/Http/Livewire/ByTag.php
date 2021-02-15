<?php

namespace App\Http\Livewire;

use App\Models\Control;
use App\Models\Tag;
use Livewire\Component;

class ByTag extends Component
{

    // public $control;
    // public $amount = 2;
    // public function render()
    // {
    //     $childs = Control::take($this->amount)->where('parent_id',$this->control->id)->get();
    //     return view('livewire.by-control',compact('childs'));
    // }

    // public function load(){
    //     $this->amount += 2;
    // }

    public $page;
    public $perPage;
    public $tag;

    public function mount($page, $perPage)
    {
        $this->page = $page ? $page : 1;
        $this->perPage = $perPage ? $perPage : 1;
    }

    public function loadMore()
    {
        $this->loadMore = true;
    }

    public function render()
    {
       
            $rows = Tag::where('status','=','1')->paginate($this->perPage, ['*'], null, $this->page);

            return view('livewire.by-tag', [
                'childs' => $rows,
                'page' => $this->page
            ]);
    }
}
