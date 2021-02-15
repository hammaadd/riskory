<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class IndustryController extends Controller
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
        $industries = Industry::all();
        return view('controls.industry.index',compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $industries = Industry::all()->where('status',1);
        return view('controls.industry.create',compact('industries'));
       
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

        $ind = Industry::create($data);
        if($ind){
            $request->session()->flash('success', 'Industry added successfully');

        }else{
            $request->session()->flash('error', 'Unable to add industry');
        }
        return redirect()->route('industry.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function show(Industry $industry)
    {
        //

        return view('controls.industry.show',compact('industry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function edit(Industry $industry)
    {
        //
        $industries = Industry::all()->where('status',1)->whereNotIn('id',$industry->id);
        return view('controls.industry.update',compact('industries','industry'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Industry $industry)
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
        
        $ind = $industry->update($request->all());
        if($ind){
            $request->session()->flash('success', 'Industry updated successfully');

        }else{
            $request->session()->flash('error', 'Unable to update industry !');
        }
        return redirect()->route('industry.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Industry $industry)
    {
        //
        try{
            $ind = $industry->delete();
            session()->flash('success', 'Industry deleted successfully');
        }catch(Exception $ex){
            session()->flash('error', 'Unable to delete industry');
        }
        return redirect()->route('industry.index');

    }
}
