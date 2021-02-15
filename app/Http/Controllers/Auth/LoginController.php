<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    // protected $maxAttempts = 3;
    // protected $decayMinutes = 2;

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if($user->hasRole('superadministrator')){
            session()->flash('success', 'Welcome Back '.Auth::user()->name);
            return redirect('/admin');
        }
        
        if($user->hasRole('user')){
            session()->flash('success', 'Welcome Back '.Auth::user()->name);
            // if(session()->has('url.intended')){
            //      if(session('url.intented') == route('homePage')){
            //         return redirect()->route('user');
            //      }
            //     return redirect(session('url.intended'));
            //     //dd(session('url.intended'));
            // }
            return redirect('/dashboard');
        }

        return redirect('/dashboard');
    }

    protected function credentials(Request $request)
    {
        return [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'status' => 'A'
        ];
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'agree'=>'required',
        ]);
    }

    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email'           => 'required|max:255|email',
    //         'password'           => 'required|confirmed',
    //     ]);

    //     $email = $request->input('email');
    //     $password = $request->input('password');
    //     if (Auth::attempt(['email' => $email, 'password' => $password,'status'=>"A"])) {
    //         // Authentication passed...
    //         return redirect()->route('user');
    //     }else {
    //         // Go back on error (or do what you want)
    //         return back();
    //     }

    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    public function facebookRedirectToProvider(){
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookProviderCallback(){
        $user = Socialite::driver('facebook')->user();
        dd($user);
    }

    public function googleRedirectToProvider(){
        return Socialite::driver('google')->redirect();
    }

    public function googleProviderCallback(){
        $user = Socialite::driver('google')->user();

        $found_user = User::where('email',$user->getEmail())->first();
        
        if ($found_user) {

            Auth::login($found_user);
            session()->flash('success', 'Welcome Back '.Auth::user()->name);
            return redirect()->route('user');
        }
        else{
            $url = preg_replace('/\?sz=[\d]*$/', '', $user->getAvatar());
            $info = pathinfo($url);
            $contents = file_get_contents($url);
            $file = 'public/userAvat/' . $info['basename'].'.jpg';
            file_put_contents($file, $contents);
            $uploaded_file = new UploadedFile($file, $info['basename']);
            //dd($uploaded_file);

            $new_user = new User;
            
            $new_user->name  = $user->getName();
            $new_user->email = $user->getEmail();
            $new_user->avatar = $info['basename'].'.jpg';
            $new_user->fname = $user->user['given_name'];
            $new_user->lname = $user->user['family_name'];
            $new_user->email_verified_at = now();
            
            
            $password = rand(1000,1000000);
            $new_user->password = $password = Hash::make($password);
            
            if ($new_user->save()) {
                session()->flash('success', 'Profile Created successfully!');
                $new_user->attachRole('user');
                 Auth::login($new_user);
                 return redirect()->route('user');
             } 
        }
        
    }


    public function twitterRedirectToProvider(){
        return Socialite::driver('twitter')->redirect();
    }

    public function twitterProviderCallback(){
        $user = Socialite::driver('twitter')->user();
        //dd($user->getAvatar());
        $found_user = User::where('email',$user->getEmail())->first();
        
        if ($found_user) {

            Auth::login($found_user);
            session()->flash('success', 'Welcome Back '.Auth::user()->name);
            return redirect()->route('user');
        }
        else{
            $url = preg_replace('/\?sz=[\d]*$/', '', $user->getAvatar());
            $info = pathinfo($url);
            $contents = file_get_contents($url);
            $file = 'public/userAvat/' . $info['basename'].'.jpg';
            file_put_contents($file, $contents);
            $uploaded_file = new UploadedFile($file, $info['basename']);
            //dd($uploaded_file);

            $new_user = new User;
            
            $new_user->name  = $user->getName();
            $new_user->email = $user->getEmail();
            $new_user->avatar = $info['basename'].'.jpg';
            
            $password = rand(1000,1000000);
            $new_user->password = $password = Hash::make($password);

            if ($new_user->save()) {
                session()->flash('success', 'Profile Created successfully!');
                $new_user->attachRole('user');
                 Auth::login($new_user);
                 return redirect()->route('user');
             } 
        }
    }
}
