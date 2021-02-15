<?php

namespace App\Http\Controllers;

use App\Models\Listrc;
use App\Models\RiskControl;
use App\Models\Rlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        return view('user.list.index');
    }

    public function create(Request $request){
        if($request->ajax()){
            $val = $request->validate([
                'name'=>'required',

            ]);

            $data = array(
                'name'=>$request->input('name'),
                'type'=>$request->input('listtype'),
                'description'=>$request->input('description'),
                'user_id'=>Auth::id()
            );

           $res =  Rlist::create($data);
           if($res){
             return ['type'=>'success','message'=>'List '.$data['name'].' created successfully'];
           }else{
            return ['type'=>'error','message'=>'Unable to create list try later!'];
           }


        }
    }

    public function getAllLists(){
        $lists = Rlist::where('user_id',Auth::id())->get();
        return view('user.sections.listView',compact('lists'))->render();

    }

    public function deleteList(Request $request){
        if($request->ajax()){
        $res = Rlist::where('id','=',$request->input('delId'))->where('user_id',Auth::id())->delete();
        // $res = $list->delete();
        if($res){
            return ['type'=>'success','message'=>'List deleted successfully'];
          }else{
           return ['type'=>'error','message'=>'Unable to delete list try later!'];
          }

        }

    }

    public function fetchUserLists(Request $request){
        if($request->ajax()){
            $rc_id = $request->input('rc_id');
            $user_id = Auth::id();

            $lists = Rlist::where('user_id',$user_id)->get();
            $rc = RiskControl::where('id','=',$rc_id)->first();
            return view('user.sections.listModalInc',compact('lists','rc'))->render();
        }
    }

    public function addRcToList(Request $request){
        if($request->ajax()){
            $rc_id = $request->input('rc_id');
            $list_id = $request->input('list_id');

            $list = Rlist::where('id','=',$list_id)->where('user_id',Auth::id())->first();
            if($list){
                $newListItem = new Listrc;
                $newListItem->rc_id = $rc_id;
                $newListItem->list_id = $list->id;
                $res = $newListItem->save();
                if($res){
                    return ['type'=>'success','message'=>'Riskcontrol added to list success fully'];
                }else{
                    return ['type'=>'error','message'=>'Unable to add to list try again later'];
                }

            }else{
                return ['type'=>'error','message'=>'Unable to add to list try again later'];
            }
            

            
            
        }
    }

    public function removeRcFromList(Request $request){
        if($request->ajax()){
            $rc_id = $request->input('rc_id');
            $list_id = $request->input('list_id');

           $list =  Rlist::where('id','=',$list_id)->where('user_id',Auth::id())->first();
           if($list){
                $res = Listrc::where('list_id',$list->id)->where('rc_id','=',$rc_id)->delete();
                if($res){
                    return ['type'=>'success','message'=>'Riskcontrol removed from list successfully'];
                }else{
                    return ['type'=>'error','message'=>'Unable to remove try again later'];
                }
            }else{
                return ['type'=>'error','message'=>'Unable to remove try again later'];
            }
            
        }
    }

    public function changeListType(Request $request){
        if($request->ajax()){
            $list_id = $request->input('list_id');
            $type = $request->input('type');
            if($type=='public'){
               // =  ->update(['type'=>1]);
               $data= Rlist::where('id','=',$list_id)->where('user_id',Auth::id())->first();
               $data->type = '1';
               $res = $data->save();
            }elseif($type=='private'){
                $data= Rlist::where('id','=',$list_id)->where('user_id',Auth::id())->first();
                $data->type = '0';
                $res = $data->save();
            }

            if($res){
                return ['type'=>'success','message'=>'List type changed to '.$type];
            }else{
                return ['type'=>'error','message'=>'Unable to change type try again later'];
            }
        }
    }

    public function rcByList(Request $request, Rlist $list){
        if($list->user_id == Auth::id()):
            $data = $list->listrcs;
            return view('user.list.rcByList',compact('data'));
        else:
            return back();
        endif;
    }


    // public function update(Request $request){
    //     if($request->ajax()){
    //         $val = $request->validate([
    //             'name'=>'required',

    //         ]);

    //         $data = array(
    //             'name'=>$request->input('name'),
    //             'type'=>$request->input('listtype'),
    //             'description'=>$request->input('description'),
    //             'user_id'=>Auth::id()
    //         );

    //        $res =  Rlist::where('id','=',$request->input('listId'))->where('user_id',Auth::id())->update($data);
    //        if($res){
    //          return ['type'=>'success','message'=>'List '.$data['name'].' updated successfully'];
    //        }else{
    //         return ['type'=>'error','message'=>'Unable to update list try later!'];
    //        }


    //     }
   // }


    




}
