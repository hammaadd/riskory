<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\Followuser;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\FollowedYou;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function followControl(Control $control,Request $request){

        // dd($control);
        if($control->followedBy($request->user())){
            return response(null,409);
        }
        $control->followers()->create([
            'user_id'=>$request->user()->id,
        ]);

        return back();
    }

    public function unfollowControl(Control $control,Request $request){
        //dd($control);
        $request->user()->followers()->where('control_id',$control->id)->delete();
        return back();
    }

    public function followTag(Tag $tag,Request $request){

        // dd($control);
        if($tag->followedBy($request->user())){
            return response(null,409);
        }
        $tag->followers()->create([
            'user_id'=>$request->user()->id,
        ]);

        return back();
    }

    public function unfollowTag(Tag $tag,Request $request){
        //dd($control);
        $request->user()->tagFollowers()->where('tag_id',$tag->id)->delete();
        return back();
    }


    public function followUser(User $user,Request $request){
        if($user->followedBy($request->user())){
            $request->session()->flash('error', 'You are already following.');
            return back();
        }
        $us = $user->userFollowers()->create([
            'follower_id'=>$request->user()->id,
            'user_id'=>$user->id,
        ]);
        
        $user->notify((new FollowedYou())->delay([
            'mail' => now()->addMinutes(5),
            'database'=>now()->addMinutes(2),
        ]));
        if($us){
            $request->session()->flash('success', 'You are now following '.$user->name);
        }else{
            $request->session()->flash('error', 'Unable to follow try later.');
        }

        return back(); 
    }

    public function unfollowUser(User $user,Request $request){
        //dd($control);
        $us = Followuser::where('user_id',$user->id)->where('follower_id',$request->user()->id)->delete();
        
        if($us){
            $request->session()->flash('success', 'You unfollowed '.$user->name.' successfully');
        }else{
            $request->session()->flash('error', 'Unable to unfollow try later.');
        }
        return back();
    }
    
}
