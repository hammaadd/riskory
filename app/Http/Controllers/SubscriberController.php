<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(Request $request){
        
        $request->validate([
            'subEmail' =>'required|email|unique:subscribers,email'
        ]);

        $subscriber = New Subscriber;
        $subscriber->email = $request->input('subEmail');
        $res = $subscriber->save();
        if($res){
            $request->session()->flash('success', 'Congratulations, You have successfully subscribed. ');
        }else{
            $request->session()->flash('error', 'Unable subscribe try later.');
        }

        return back();

    }
}
