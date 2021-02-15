<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\Industry;
use Illuminate\Http\Request;
use stdClass;
use Illuminate\Support\Facades\Auth;
use Exception;

class ControlController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadministrator');
        
    }

    public function index($type = null){
        $types = array('industry','category','bprocess','bframework');
        if(in_array($type,$types)){
            $data = Control::where('type',$type)->get();
            $prop = new stdClass();
            if($type=='industry'){
                $prop->plural = 'industries';
                $prop->singular = 'industry';
                $prop->type = $type;
                $prop->icon = 'industry';
                
            }elseif($type=='category'){
                $prop->plural = 'categories';
                $prop->singular = 'category';
                $prop->type = $type;
                $prop->icon = 'list-alt';
                
            }elseif($type=='bframework'){
                $prop->plural = 'business frameworks';
                $prop->singular = 'business framework';
                $prop->type = $type;
                $prop->icon = 'chart-area';
                
            }elseif($type=='bprocess'){
                $prop->plural = 'business processes';
                $prop->singular = 'business process';
                $prop->type = $type;
                $prop->icon = 'sync-alt';
                
            }
            
            return view('controls.index',compact('data','prop'));
        }else{
            return back();
        }
        
    }

    public function create($type = null){
        $types = array('industry','category','bprocess','bframework');
        if(in_array($type,$types)){
            $data = Control::where('type',$type)->get();
            $prop = new stdClass();
            if($type=='industry'){
                $prop->plural = 'industries';
                $prop->singular = 'industry';
                $prop->type = $type;
                $prop->icon = 'industry';
                
            }elseif($type=='category'){
                $prop->plural = 'categories';
                $prop->singular = 'category';
                $prop->type = $type;
                $prop->icon = 'list-alt';
                
            }elseif($type=='bframework'){
                $prop->plural = 'business frameworks';
                $prop->singular = 'business framework';
                $prop->type = $type;
                $prop->icon = 'chart-area';
                
            }elseif($type=='bprocess'){
                $prop->plural = 'business processes';
                $prop->singular = 'business process';
                $prop->type = $type;
                $prop->icon = 'sync-alt';
                
            }
            
            return view('controls.create',compact('data','prop'));
        }else{
            return back();
        }
    }

    public function store($type = null,Request $request){

        $types = array('industry','category','bprocess','bframework');
        if(in_array($type,$types)){
            $prop = new stdClass();
            if($type=='industry'){
                $prop->plural = 'industries';
                $prop->singular = 'industry';
                $prop->type = $type;
                $prop->icon = 'industry';
                
            }elseif($type=='category'){
                $prop->plural = 'categories';
                $prop->singular = 'category';
                $prop->type = $type;
                $prop->icon = 'list-alt';
                
            }elseif($type=='bframework'){
                $prop->plural = 'business frameworks';
                $prop->singular = 'business framework';
                $prop->type = $type;
                $prop->icon = 'chart-area';
                
            }elseif($type=='bprocess'){
                $prop->plural = 'business processes';
                $prop->singular = 'business process';
                $prop->type = $type;
                $prop->icon = 'sync-alt';
                
            }

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
                'type'=>$type,
                'parent_id'=>$parent_id,
                'created_by'=>Auth::id(),
    
            );
    
            $dat = Control::create($data);
            if($dat){
                $request->session()->flash('success', ucfirst($prop->singular).' added successfully');
    
            }else{
                $request->session()->flash('error', 'Unable to add '.$prop->singular);
            }

            return redirect()->route('control.create',['type'=>$type]);
        }else{
            $request->session()->flash('error', 'Unable to add data');
            return back();
            
        }
    }

    public function show($type = null, $id = null){
        

        $types = array('industry','category','bprocess','bframework');
        if(in_array($type,$types)){
            $data = Control::where('id',$id)->first();
            $prop = new stdClass();
            if($type=='industry'){
                $prop->plural = 'industries';
                $prop->singular = 'industry';
                $prop->type = $type;
                $prop->icon = 'industry';
                
            }elseif($type=='category'){
                $prop->plural = 'categories';
                $prop->singular = 'category';
                $prop->type = $type;
                $prop->icon = 'list-alt';
                
            }elseif($type=='bframework'){
                $prop->plural = 'business frameworks';
                $prop->singular = 'business framework';
                $prop->type = $type;
                $prop->icon = 'chart-area';
                
            }elseif($type=='bprocess'){
                $prop->plural = 'business processes';
                $prop->singular = 'business process';
                $prop->type = $type;
                $prop->icon = 'sync-alt';
                
            }
            
            return view('controls.show',compact('data','prop'));
        }else{
            return back();
        }
    }

    public function edit($type = null, $id = null){
        $types = array('industry','category','bprocess','bframework');
        if(in_array($type,$types)){
            $data = Control::where('id',$id)->first();
            $datas = Control::all()->where('type',$type)->where('status',1)->whereNotIn('id',$id);
            $prop = new stdClass();
            if($type=='industry'){
                $prop->plural = 'industries';
                $prop->singular = 'industry';
                $prop->type = $type;
                $prop->icon = 'industry';
                
            }elseif($type=='category'){
                $prop->plural = 'categories';
                $prop->singular = 'category';
                $prop->type = $type;
                $prop->icon = 'list-alt';
                
            }elseif($type=='bframework'){
                $prop->plural = 'business frameworks';
                $prop->singular = 'business framework';
                $prop->type = $type;
                $prop->icon = 'chart-area';
                
            }elseif($type=='bprocess'){
                $prop->plural = 'business processes';
                $prop->singular = 'business process';
                $prop->type = $type;
                $prop->icon = 'sync-alt';
                
            }
            
            return view('controls.edit',compact('data','prop','datas'));
        }else{
            return back();
        }
    }

    public function update($type=null, $id=null,Request $request){
        $types = array('industry','category','bprocess','bframework');
        if(in_array($type,$types)){
            $prop = new stdClass();
            if($type=='industry'){
                $prop->plural = 'industries';
                $prop->singular = 'industry';
                $prop->type = $type;
                $prop->icon = 'industry';
                
            }elseif($type=='category'){
                $prop->plural = 'categories';
                $prop->singular = 'category';
                $prop->type = $type;
                $prop->icon = 'list-alt';
                
            }elseif($type=='bframework'){
                $prop->plural = 'business frameworks';
                $prop->singular = 'business framework';
                $prop->type = $type;
                $prop->icon = 'chart-area';
                
            }elseif($type=='bprocess'){
                $prop->plural = 'business processes';
                $prop->singular = 'business process';
                $prop->type = $type;
                $prop->icon = 'sync-alt';
                
            }
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
                'type'=>$type,
                'parent_id'=>$parent_id,
                'created_by'=>Auth::id(),
    
            );
            
            $cont = Control::where('id',$id)->update($data);
            if($cont){
                $request->session()->flash('success', ucfirst($prop->singular).' updated successfully');
    
            }else{
                $request->session()->flash('error', 'Unable to update '.$prop->singular);
            }
            return redirect()->route('control.show',['type'=>$type,'id'=>$id]);
            
        }else{
            return back();
        }
    }

    public function destroy($type = null, $id =null){
        $types = array('industry','category','bprocess','bframework');
        if(in_array($type,$types)){
        $prop = new stdClass();
        if($type=='industry'){
            $prop->plural = 'industries';
            $prop->singular = 'industry';
            $prop->type = $type;
            $prop->icon = 'industry';
            
        }elseif($type=='category'){
            $prop->plural = 'categories';
            $prop->singular = 'category';
            $prop->type = $type;
            $prop->icon = 'list-alt';
            
        }elseif($type=='bframework'){
            $prop->plural = 'business frameworks';
            $prop->singular = 'business framework';
            $prop->type = $type;
            $prop->icon = 'chart-area';
            
        }elseif($type=='bprocess'){
            $prop->plural = 'business processes';
            $prop->singular = 'business process';
            $prop->type = $type;
            $prop->icon = 'sync-alt';
            
        }
        try{
            $dat = Control::where('id',$id)->where('type',$type)->delete();
            if($dat){
                session()->flash('success', ucfirst($prop->singular).' deleted successfully');
            }else{
                session()->flash('error', 'Unable to delete '.$prop->singular);
            }
            
        }catch(Exception $ex){
            session()->flash('error', 'Unable to delete '.$prop->singular);
            }
            return redirect()->route('control.index',['type'=>$type]);
        }else{
            return back();
        }
    }
}
