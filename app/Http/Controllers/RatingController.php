<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\RiskControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    
    public function doRating(Request $request){
        //dd($request->input());

        if($request->ajax()){
            $request->validate([
                'rating'=>'required|numeric'
            ]);
    
            $res = Rating::updateOrCreate(
                ['rc_id'=>$request->input('rc'),'user_id'=>Auth::id()],
                ['rc_id'=>$request->input('rc'),'user_id'=>Auth::id(),'rating'=>$request->input('rating')],
            );
    
            if($res){
                return ['type'=>'success','message'=>'Rating submitted successfully.'];
            }else{
                return ['type'=>'error','message'=>'Unable to do rating try again later'];
            }
        }

    }

    public function updateRating(Request $request){
        if($request->ajax()){
            $rc_id = $request->input('rc_id');
            $rc = RiskControl::where('id','=',$rc_id)->with('ratings')->first();

            return view('user.sections.showRating',compact('rc'))->render();
        }
    }
}
