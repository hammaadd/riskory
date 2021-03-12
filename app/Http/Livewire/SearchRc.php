<?php

namespace App\Http\Livewire;

use App\Models\Control;
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
        if(!empty($this->search)):
            $riskcontrol = RiskControl::query();

            $riskcontrol->whereNotIn('status',['P','R']);
            $riskcontrol->where('title', 'like','%'.$this->search.'%');
            $riskcontrol->orWhere('title', 'like',$this->search.'%');
            $riskcontrol->orWhere('description', 'like', '%'.$this->search.'%');
            $riskcontrol->orWhere('objective', 'like', '%'.$this->search.'%');
            $riskcontrol->orWhere('business_impact', 'like', '%'.$this->search.'%');
            $rcs = $riskcontrol->orWhereHas('controls',function ($query1){
                return $query1->whereHas('control', function ($query11){
                    return $query11->where('name','like',$this->search.'%')
                    ->orWhere('name','like','%'.$this->search.'%');
                });
            })->take(5)->get();
            // $rcs = $riskcontrol->where('title', 'like',$this->search.'%')->take(5)->get();
            // $rcs = $riskcontrol->whereNotIn('status',['P','R'])

            // ->when(!empty($this->search), function ($query){
            //     return $query->where('title', 'like',$this->search.'%')
            //     ->orWhere('title', 'like','%'.$this->search.'%')
            //     ->orWhereHas('controls',function ($query1){
            //         return $query1->whereHas('control', function ($query11){
            //             return $query11->where('name','like',$this->search.'%')
            //             ->orWhere('name','like','%'.$this->search.'%');
            //         });
            //     })
            //     ->orWhere('description', 'like', '%'.$this->search.'%')->limit(8)->get();});

            $controls = Control::select('name','status','id','type')
                        ->where('status','=','1')
                        ->where('name','like',$this->search.'%')
                        ->orWhere('name','like','%'.$this->search.'%')
                        ->take(8)
                        ->get();



            return view('livewire.search-rc',compact('rcs','controls'));
        endif;

        return view('livewire.search-rc');

    //     RiskControl::wherehas('controls',function ($query) use ($control){
    //         $query->where('control_id','=',$control->id);
    //    })->whereNotIn('status',['R'])->paginate(10);

    }
}
