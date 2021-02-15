<?php

namespace App\Http\Livewire;

use App\Models\Control;
use App\Models\Tag;
use Livewire\Component;

class LoadMoreTags extends Component
{

    public $page;
    public $perPage;
    public $loadMore;
    public $tag;

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
            $rows = Tag::where('status','=','1')->paginate($this->perPage, ['*'], null, $this->page);

            return view('livewire.by-tag', [
                'childs' => $rows
            ]);
        } else {
            return view('livewire.load-more-tags');
        }
    }
    // public function render()
    // {
    //     return view('livewire.load-more-button');
    // }
}
