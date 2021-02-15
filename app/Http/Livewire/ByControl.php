<?php

namespace App\Http\Livewire;

use App\Models\Control;
use Livewire\Component;

class ByControl extends Component
{


    public $page;
    public $perPage;
    public $control;

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
       
            $rows = Control::where('parent_id',$this->control->id)->paginate($this->perPage, ['*'], null, $this->page);

            return view('livewire.by-control', [
                'childs' => $rows,
                'page' => $this->page
            ]);
    }
}
