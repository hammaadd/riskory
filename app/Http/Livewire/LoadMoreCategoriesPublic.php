<?php

namespace App\Http\Livewire;

use App\Models\Control;
use Livewire\Component;

class LoadMoreCategoriesPublic extends Component
{

    public $page;
    public $perPage;
    public $loadMore;
    public $control;

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
            $rows = Control::where('parent_id',$this->control->id)->paginate($this->perPage, ['*'], null, $this->page);

            return view('livewire.by-control-public', [
                'childs' => $rows
            ]);
        } else {
            return view('livewire.load-more-categories-public');
        }
    }
   
}

