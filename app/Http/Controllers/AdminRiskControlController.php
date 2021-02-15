<?php

namespace App\Http\Controllers;

use App\Models\RiskControl;
use Illuminate\Http\Request;

class AdminRiskControlController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function index(){
        $rcs = RiskControl::with('controls.control')->with('user')->with('views')->get();

        return view('riskcontrol.index',compact('rcs'));
    }

    public function pending(){
        $rcs = RiskControl::with('controls.control')->with('user')->with('views')->where('status','=','P')->get();

        return view('riskcontrol.pending',compact('rcs'));
    }

    public function updateStatus(Request $request,RiskControl $rc){
        $rc->status = $request->input('status');
        $res = $rc->save();
        if($res){
            $request->session()->flash('success', 'Status updated successfully');
        }else{
            $request->session()->flash('error', 'Unable to update status try later.');
        }

        return redirect('admin/riskcontrols/pending#rc'.$rc->id);
        
    }

    public function viewSpecific(Request $request , RiskControl $rc){
        
        return view('riskcontrol.rcView',compact('rc'));
    }
}
