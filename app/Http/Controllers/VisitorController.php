<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Content;
use App\Models\Control;
use App\Models\RiskControl;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VisitorController extends Controller
{
    //
    public function __construct()
    {
        
    }

    public function index(){
        
        if(Auth::user()){
            return redirect()->route('user');
        }
        return view('user.homepage');
    }

    public function about(){
        $con = Content::where('key','=','about-us')->get()->first();
        return view('user.aboutus',compact('con'));
    }

    public function contact(){
        $con = Content::where('key','=','contact-us')->get()->first();
        $addr = Content::where('key','=','contact-info')->get()->first();
        return view('user.contactus',compact('con','addr'));
    }

    public function terms(){
        $con = Content::where('key','=','terms-and-conditions')->get()->first();
        return view('user.termsAndConditions',compact('con'));
    }

    public function policy(){
        $con = Content::where('key','=','privacy-policy')->get()->first();
        return view('user.privacyPolicy',compact('con'));
    }

    public function signup(){
        if(Auth::user()){
            return redirect()->route('user');
        }

        return view('user.register');
    }

    public function register(Request $request){
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'captcha' => 'required|captcha',
            'agree'=>'required'
        ]);
        
        $user =  User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status'=>'A'
        ]);

        $user->attachRole('user');
        if($user){
            $request->session()->flash('success', 'Successfully registered to RISKORY email verfication link sent to your mail.');

        }else{
            $request->session()->flash('error', 'Unable to complete your request. Try Again later');
        }
        event(new Registered($user));
        
        return redirect()->route('userLogin');
        
    }

    public function loginForm(){
        if(Auth::user()){
            return redirect()->route('user');
        }else{
            if(!session()->has('url.intended'))
            {
                session(['url.intended' => url()->previous()]);
            }
            return view('user.login');
        }
        
    }

    // public function authenticate(Request $request){
    //     $email = $request->input('email');
    //     $password = $request->input('password');
    //     if (Auth::attempt(['email' => $email, 'password' => $password,'status'=>'A'])) {
    //         // Authentication passed...
    //         return redirect()->route('user');
    //     }
    //     return back();
    // }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email'           => 'required|max:255|email',
            'password'           => 'required|confirmed',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password,'status'=>'A'])) {
            // Authentication passed...
            return redirect()->route('user');
        }else {
            // Go back on error (or do what you want)
            return back();
        }

    }

    public function submission(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'type' =>'required|in:Inquiry,Feature Recommendation,Adding Industry/Business Process/Framework,Testimony,Issue',
            'message' => 'required',
            'captcha' => 'required|captcha'

        ]);

    //    $data = array(
    //     'name'=>$request->input('name'),
    //     'email'=>$request->input('email'),
    //     'message'=>$request->input('message'),
    //     'type'=>$request->input('type')
    //    );
       $contact = new Contact;
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->message=$request->input('message');
        $contact->type=$request->input('type');

        $con = $contact->save();
       if($con){
        $request->session()->flash('success', 'Submitted successfully');

        }else{
            $request->session()->flash('error', 'Unable to submit ! Try again later');
        }
        return redirect()->route('contactUs');
    }

    public function emailSubmit(){

    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function categories(){

        $industries = Control::where('status','=','1')->where('type','industry')->with('parent')->withCount('rccontrols')->orderBy('rccontrols_count','DESC')->skip(0)->take(8)->get();
        $bprocesses = Control::where('status','=','1')->where('type','bprocess')->with('parent')->skip(0)->take(8)->get();
        $bframeworks = Control::where('status','=','1')->where('type','bframework')->with('parent')->skip(0)->take(8)->get();

        return view('visitor.categories.index',compact('industries','bprocesses','bframeworks'));
    }

    public function byControl(Control $control ){
        $data =  $control->rccontrols->whereNotIn('rc.status',['P','R']);
        $childs = Control::where('parent_id',$control->id)->paginate(6);
        return view('visitor.categories.viewByControl',compact('data','control','childs'));
     }

     public function allRiskcontrols(Request $request){
        if(!isset($request->rcs)){
            $rcs = RiskControl::orderBy('created_at','desc')->whereNotIn('status',['P','R'])->paginate(10);
        }elseif(isset($request->rcs) && filter_var($request->rcs, FILTER_VALIDATE_INT) !== FALSE){
            $rcs = RiskControl::orderBy('created_at','desc')->whereNotIn('status',['P','R'])->paginate($request->rcs);
        }else{
            $rcs = RiskControl::orderBy('created_at','desc')->whereNotIn('status',['P','R'])->paginate(10);
        }
          
           return view('visitor.sections.allRcs',compact('rcs'));
     }

    

}
