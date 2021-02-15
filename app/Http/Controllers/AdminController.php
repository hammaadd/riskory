<?php

namespace App\Http\Controllers;

use App\Models\Bframework;
use App\Models\Bprocess;
use App\Models\Category;
use App\Models\Control;
use App\Models\Feedback;
use App\Models\Industry;
use App\Models\RiskControl;
use App\Models\Subscriber;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\FollowedYou;
use App\Notifications\ProfileApproved;
use App\Notifications\ProfileDeactivated;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function index(){
       $indCount = Control::where('type','=','industry')->get()->count();
       $bpCount = Control::where('type','=','bprocess')->get()->count();
       $bfCount = Control::where('type','=','bframework')->get()->count();
       $tagCount = Tag::get()->count();
       //$catCount = Category::get()->count();
       //dd($indCount);
        return view('admin.index',compact('indCount','bpCount','bfCount','tagCount'));
    }

    public function allContributors(){
        $contributors = User::orderBy('created_at','DESC')->get();
        return view('controls.contributor.index',compact('contributors'));
    }

    public function viewContributor(Request $request,$id){
        
        $contributor = User::find($id);
        $rcs = RiskControl::where('user_id','=',$contributor->id)->paginate(1);
        return view('controls.contributor.view',compact('contributor','rcs'));
    }

    public function unverified(){
        $contributors = User::where('email_verified_at',Null)->get();

        return view('controls.contributor.unverified',compact('contributors'));
    }

    public function verifyEmail(Request $request,User $contributor){
        $contributor->email_verified_at = now() ;
        $contributor->save();
        return back();
    }

    public function updateStatus(Request $request,User $user){
        $user->status = $request->input('status');
        $res = $user->save();
        if($res){
            if($user->status == 'A'):
                $user->notify(new ProfileApproved());
            elseif($user->status == 'D'):
                $user->notify(new ProfileDeactivated());
            endif;
        }
        
        return back();
    }

    public function subscribers(Request $request){
        $subs = Subscriber::all();
        return view('controls.subscriber.index',compact('subs'));
    }

    public function destroySubscriber(Request $request , Subscriber $subscriber){
        if($subscriber){
            $res = $subscriber->delete();
            if($res){
                $request->session()->flash('success', 'Subscriber deleted successfully');
            }else{
                $request->session()->flash('error', 'Unable to delete subscriber try later.');
            }
        }else{
            $request->session()->flash('error', 'Unable to delete subscriber try later.');
        }

        return back();
    }

    public function feedback(Request $request){
        $feedback = Feedback::all();
        return view('controls.feedback.index',compact('feedback'));
    }


    public function destroyFeedback(Request $request , Feedback $feedback){
        if($feedback){
            $res = $feedback->delete();
            if($res){
                $request->session()->flash('success', 'Feedback deleted successfully');
            }else{
                $request->session()->flash('error', 'Unable to delete feedback try later.');
            }
        }else{
            $request->session()->flash('error', 'Unable to delete feedback try later.');
        }

        return back();
    }

    public function fetchContributorSettings(Request $request){
        if($request->ajax()){
            $id = $request->input('id');
            $user = User::find($id);
            return view('controls.contributor.settingsModal',compact('user'))->render();
        }

        else{
            echo json_encode('NO data received try later');
        }

    }

    public function updateUserRcStatus(Request $request){
        if($request->ajax()){
            $id = $request->input('user');
            $user = User::find($id);
            $user->rc_status = $request->input('rc_status');
            $res= $user->save();
            if($res){
                return ['type'=>'success','message'=>'User default risk control status updated successfully.'];
            }else{
                return ['type'=>'error','message'=>'Unable to update status try later.'];
            }

        }

        else{
            echo "Error";
        }
    }





}
