<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
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
        $categories = Category::all();
        return view('controls.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all()->where('status',1);
        return view('controls.category.create',compact('categories'));
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

        $cat = Category::create($data);
        if($cat){
            $request->session()->flash('success', 'New category added successfully');

        }else{
            $request->session()->flash('error', 'Unable to add category');
        }
        return redirect()->route('category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return view('controls.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        $categories = Category::all()->where('status',1)->whereNotIn('id',$category->id);
        return view('controls.category.update',compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
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
        
        $cat = $category->update($request->all());
        if($cat){
            $request->session()->flash('success', 'Category updated successfully');

        }else{
            $request->session()->flash('error', 'Unable to update category');
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $cat = $category->delete();

        if($cat){
            session()->flash('success', 'Category deleted successfully');

        }else{
            session()->flash('error', 'Unable to delete business process');
        }
        return redirect()->route('category.index');
    
    }
}
