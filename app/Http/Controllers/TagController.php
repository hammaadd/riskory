<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
        //
        $tags = Tag::where('status','=','1')->with('user')->get();
        return view('controls.tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('controls.tag.create');

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

        $data = array(
            'name'=>$request->input('name'),
            'status'=>$request->input('status'),
            'user_id'=>Auth::id(),

        );

        $ta = Tag::create($data);
        if($ta){
            $request->session()->flash('success', 'New tag added successfully');

        }else{
            $request->session()->flash('error', 'Unable to add new tag');
        }
        return redirect()->route('tag.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
        return view('controls.tag.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        $tags = Tag::all()->where('status',1)->whereNotIn('id',$tag->id);
        return view('controls.tag.update',compact('tags','tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //

        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $request->merge(['user_id',$tag->user->id]);
        
        $tg = $tag->update($request->all());
        if($tg){
            $request->session()->flash('success', 'Tag updated successfully');

        }else{
            $request->session()->flash('error', 'Unable to update tag');
        }
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        $tg = $tag->delete();

        if($tg){
            session()->flash('success', 'Tag deleted successfully');

        }else{
            session()->flash('error', 'Unable to delete tag');
        }
        return redirect()->route('tag.index');
    }
}
