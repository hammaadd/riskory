<?php

namespace App\Http\Controllers;

use App\Models\Benchmark;
use App\Models\RiskControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BenchmarkController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function create(RiskControl $riskcontrol,Request $request){
        if($riskcontrol->benchmarkedBy($request->user())){
            $request->session()->flash('error','You already have done benchmark for this riskcontrol.');
            return back();
        }
        return view('user.benchmark.createBenchmark',compact('riskcontrol'));
    }

    public function store(Request $request,RiskControl $riskcontrol){

        $request->validate([
            'benchmark'=>'required',
            'benchmarkDate'=>'required|date',
        ]);

        $data = array(
            'rc_id'=>$riskcontrol->id,
            'user_id'=>Auth::id(),
            'benchmark'=>$request->input('benchmark'),
            'benchmark_date'=>$request->input('benchmarkDate'),
            'description'=>$request->input('description'),
            'reason'=>$request->input('reason'),
            'response'=>$request->input('response'),
            'note'=>$request->input('note')
        );

        $bm = Benchmark::create($data);
        if($bm){
            $request->session()->flash('success','Benchmark created successfully');
        }else{
            $request->session()->flash('error','Unable to create benchmark. Try again later.');
        }
        return redirect()->route('rc.view',$riskcontrol->id); 
    }

    public function view(Request $request,Benchmark $benchmark){
        $ben = $benchmark;
        return view('user.benchmark.view',compact('ben'));
    }
}
