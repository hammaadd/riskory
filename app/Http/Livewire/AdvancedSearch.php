<?php
namespace App\Http\Livewire;

use App\Models\Control;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class AdvancedSearch extends Component
{


    public $controls , $tags , $users;
    public $industry = [];

    public function mount(){
        $this->controls = Control::where('status','1')->with('rccontrols')->withCount('rccontrols')->orderBy('rccontrols_count','DESC')->having('rccontrols_count','>',0)->get();
        $this->tags = Tag::where('status','=','1')->with('followers')->with('rctags')->withCount('rctags')->orderBy('rctags_count','DESC')->having('rctags_count','>',0)->get();
        $this->users = User::whereNotIn('id',[2])->with('rcs')->withCount('rcs')->orderBy('rcs_count')->having('rcs_count','>',0)->get();
    }
    public function industry($industry){
        $this->$industry = $industry;
    }

    public function render()
    {
        return view('livewire.advanced-search');
    }
}
