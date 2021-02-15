<?php

namespace App\Http\Controllers;

use App\Models\Bframework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BframeworkController extends Controller
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
        $bframeworks = Bframework::all();
        return view('controls.bFramework.index',compact('bframeworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bframeworks = Bframework::all()->where('status',1);
        return view('controls.bFramework.create',compact('bframeworks'));
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

        $bf = Bframework::create($data);
        if($bf){
            $request->session()->flash('success', 'Business framework added successfully');

        }else{
            $request->session()->flash('error', 'Unable to add business framework');
        }
        return redirect()->route('bframework.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bframework  $bframework
     * @return \Illuminate\Http\Response
     */
    public function show(Bframework $bframework)
    {
        //
        return view('controls.bFramework.show',compact('bframework'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bframework  $bframework
     * @return \Illuminate\Http\Response
     */
    public function edit(Bframework $bframework)
    {
        //
        $bframeworks = Bframework::all()->where('status',1)->whereNotIn('id',$bframework->id);
        return view('controls.bFramework.update',compact('bframeworks','bframework'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bframework  $bframework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bframework $bframework)
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
        
        $bf = $bframework->update($request->all());
        if($bf){
            $request->session()->flash('success', 'Business framework updated successfully');

        }else{
            $request->session()->flash('error', 'Unable to update business framework');
        }
        return redirect()->route('bframework.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bframework  $bframework
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bframework $bframework)
    {
        //
        $bf = $bframework->delete();

        if($bf){
            session()->flash('success', 'Business framework deleted successfully');

        }else{
            session()->flash('error', 'Unable to delete business framework');
        }
        return redirect()->route('bframework.index');
    }
}
