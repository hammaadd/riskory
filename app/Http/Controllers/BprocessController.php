<?php

namespace App\Http\Controllers;

use App\Models\Bprocess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BprocessController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bprocesses = Bprocess::all();
        return view('controls.bProcess.index',compact('bprocesses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bprocesses = Bprocess::all()->where('status',1);
        return view('controls.bProcess.create',compact('bprocesses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        if($request->input('parent_id')==0){
            $parent_id = null;
        }else{
            $parent_id = $request->input('parent_id');
        }
        
        $data = array(
            'name'=>$request->input('name'),
            'status'=>$request->input('status'),
            'note'=>$request->input('note'),
            'parent_id'=>$parent_id,
            'created_by'=>Auth::id(),

        );

        $bp = Bprocess::create($data);
        if($bp){
            $request->session()->flash('success', 'Business process added successfully');

        }else{
            $request->session()->flash('error', 'Unable to add business process');
        }
        return redirect()->route('bprocess.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bprocess  $bprocess
     * @return \Illuminate\Http\Response
     */
    public function show(Bprocess $bprocess)
    {
        //

        return view('controls.bProcess.show',compact('bprocess'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bprocess  $bprocess
     * @return \Illuminate\Http\Response
     */
    public function edit(Bprocess $bprocess)
    {
        //

        $bprocesses = Bprocess::all()->where('status',1)->whereNotIn('id',$bprocess->id);
        return view('controls.bProcess.update',compact('bprocesses','bprocess'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bprocess  $bprocess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bprocess $bprocess)
    {
        //
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        if($request->input('parent_id')==0){
            $parent_id = null;
        }else{
            $parent_id = $request->input('parent_id');
        }

        $request->merge(['parent_id',$parent_id]);
        $request->merge(['created_by',Auth::id()]);
        
        $bp = $bprocess->update($request->all());
        if($bp){
            $request->session()->flash('success', 'Business process updated successfully');

        }else{
            $request->session()->flash('error', 'Unable to update business process');
        }
        return redirect()->route('bprocess.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bprocess  $bprocess
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bprocess $bprocess)
    {
        //

        $bp = $bprocess->delete();

        if($bp){
            session()->flash('success', 'Business process deleted successfully');

        }else{
            session()->flash('error', 'Unable to delete business process');
        }
        return redirect()->route('bprocess.index');
    }
}
