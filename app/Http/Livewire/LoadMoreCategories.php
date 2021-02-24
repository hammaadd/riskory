<?php

namespace App\Http\Livewire;

use App\Models\Control;
use Livewire\Component;

class LoadMoreCategories extends Component
{
    public $page;
    public $perPage;
    public $loadMore;
    public $req;

    public function mount($page = 1, $perPage = 1)
    {
        $this->page = $page + 1; //increment the page
        $this->perPage = $perPage;
        $this->loadMore = false; //show the button
    }

    public function loadMore()
    {
        $this->loadMore = true;
    }

    public function render()
    {
        if ($this->loadMore) {
            if($this->req == 'industries'){
                $controls = Control::where('status','=','1')->where('type','industry')->where('parent_id','=',null)->with('parent')->with('followers')->paginate($this->perPage, ['*'], null, $this->page);

            }elseif($this->req == 'bframeworks'){
                $controls = Control::where('status','=','1')->where('type','bframework')->where('parent_id','=',null)->with('parent')->with('followers')->paginate($this->perPage, ['*'], null, $this->page);

            }elseif($this->req == 'bprocesses'){
                $controls = Control::where('status','=','1')->where('type','bprocess')->where('parent_id','=',null)->with('parent')->with('followers')->paginate($this->perPage, ['*'], null, $this->page);
            }
            return view('livewire.categories',['data'=>$controls]);
        } else {
            return view('livewire.load-more-categories');
        }
    }
}
