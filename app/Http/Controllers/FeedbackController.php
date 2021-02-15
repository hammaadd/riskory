<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(Request $request){
        
        return view('user.feedback.index');
    }

    public function doFeedback(Request $request){
        //dd($request->input());
        $feedback = new Feedback;
        $feedback->type = $request->input('type');
        $feedback->feedback = $request->input('feedback');
        $feedback->user_id = Auth::id();

        $res = $feedback->save();

        if($res){
            $request->session()->flash('success', 'Feedback submitted successfully.');

        }else{
            $request->session()->flash('error', 'Unable to submit feedback.');
        }

        return back();


    }
}
