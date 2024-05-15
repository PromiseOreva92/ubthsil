<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegMail;
use App\Mail\PasswordMail;
use App\Mail\ResetPasswordMail;
class PagesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function terms(){
        return view('terms');
    }

    public function policy(){
        return view('privacypolicy');
    }

    public function forgot_password(){
        return view('forgot-password');
    }

    public function recover_email(Request $request){
        $user = User::where('email',$request->email)->first();
        Mail::to($user->email)->send(new ResetPasswordMail($user));
        return redirect('login');
    }

    public function reset($id,$code){
        if (User::where('id',$id)->where('otp',$code)->exists()) {
            $user = User::find($id);
            return view('new-password')->with('user',$user);
        }else{
            return redirect('login')->with('message','Link to reset password not recognised. Try again'); 
        }
        
    }

    public function set_new_password(Request $request){
        $user = User::find($request->user_id);
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            Mail::to($user->email)->send(new PasswordMail($user));
            return back()->with("New Password has been set");
        }else{
            return back()->with("Could not reset password");

        }
    }

    public function login(){
        return view('login');
    }

    public function about(){
        return view('about');
    }
    public function signup(){
        return view('signup');
    }

    public function add_user(Request $request){
        if(User::where('email',$request->email)->exists()){
               $message = "Your Email has been used already. Try another one!";
               return back()->with('message',$message);
        }else{
            $user = new User;
            $user->fullname = $request->fullname;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->user_type = "Admin";
            $user->status = 0;
            
            if ($user->save()) {
            //    $usr = User::where('email',$user->email)->first();
               
               
            //    Mail::to($user->email)->send(new RegMail($usr,$strval));
               $message = "Account has been created!";
               return back()->with('message',$message);

            }else{
                $message = "Something went wrong. Try Again!";
                return back()->with('message',$message);
            }

        }
    }

    public function verifyme($id,$code){
        $user = User::find($id);
        $user->status = 1;
        $user->email_verified_at = now();
        $user->save();
        $message="Your email has been verified. Login!";
        return redirect('login')->with("message",$message);
    }



}
