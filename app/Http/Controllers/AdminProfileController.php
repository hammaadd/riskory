<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
class AdminProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }
    

    public function index()
    {
        $user = User::find(Auth::id());
        // //$user = User::with('getCountry')->get();
        //dd($user->country->id);
        return view('admin.profileView',compact('user'));
    }

    public function edit(){
        $user = User::find(Auth::id());
        $countries = Country::all();
        
        return view('admin.editProfile',compact('user','countries'));
    }

    public function update(Request $request){
        $data = array(
            'name' =>$request->input('username'),
            'gender' =>$request->input('gender'),
            'fname'=>$request->input('fname'),
            'lname'=>$request->input('lname'),
            'country_id'=>$request->input('country'),
            'dob'=>$request->input('dob'),
        );

        $user = User::where('id',Auth::id())->update($data);

        // dd($user);
        if($user==1){
            $request->session()->flash('success', 'Profile updated successfully!');
        }else{
            $request->session()->flash('error', 'Unable to update profile try later.');
        }

        return redirect()->route('adminProfile');
    }

    //Account edit and Update functionality will be developed when we will deploy it on live server

    public function editAccount(){
        $user = User::find(Auth::id());
        
        return view('admin.editAccount',compact('user'));
    }

    public function updateAccount(Request $request){
        $data = array(
            'email' =>$request->input('email')
        );

        $user = User::where('id',Auth::id())->update($data);

        // dd($user);
        if($user==1){
            $request->session()->flash('success', 'Profile updated successfully!');
        }else{
            $request->session()->flash('error', 'Unable to update profile try later.');
        }

        return redirect()->route('adminProfile');
    }

    public function editPassword(){
        
        
        return view('admin.editPassword');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        $user = User::find(Auth::id())->update(['password'=> Hash::make($request->new_password)]);
        if($user==1){
        $request->session()->flash('success', 'Password changed successfully!');
        return redirect()->route('adminProfile');
        }
        

    }

    public function editAvatar(){
        
        return view('admin.editAvatar');
    }

    public function uploadAvatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);
    
        $imageName = time().Auth::user()->name.'.'.$request->avatar->extension();
     
        $request->avatar->move(public_path('adminAvat'), $imageName);
        $contents = file_get_contents(asset('public/adminAvat/'.$imageName));
        //$request->avatar->move(public_path('userAvat'), $imageName);
        $file = 'public/userAvat/' .$imageName;
        file_put_contents($file, $contents);
        $user = User::find(Auth::user()->id)->update(['avatar'=>$imageName]);

        if($user){
        $request->session()->flash('success', 'Avatar updated successfully');
        }else{

        }
        return redirect()->route('admin.edit.avatar');
    }
}
