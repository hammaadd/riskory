<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index(){
        
        $user = User::find(Auth::id());

        return view('user.notification.index',compact('user'));
    }

    public function markAsRead(Request $request, $notification){
       $not = Auth::user()->notifications->find($notification);
       if($not){
           $not->markAsRead();
           $request->session()->flash('success','Notication mark as read');
       }

       return back();
    }

    public function markAllAsRead(Request $request){
        Auth::user()->unreadNotifications->markAsRead();
        return back();
    }

    public function readNotifications(){

        $user = User::find(Auth::id());
        return view('user.notification.readNotifications',compact('user'));
    }

    public function deleteNotification(Request $request,$notification){
        $not = Auth::user()->notifications->find($notification);
        if($not){
            $not->delete();
            $request->session()->flash('success','Notication deleted successfully');
        }
 
        return back();
    }
}
