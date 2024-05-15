<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use App\Models\Investment;
use App\Mail\CreditMail;
use App\Mail\DebitMail;


class AdminController extends Controller
{
    public function login(){
        return view('control.index');
    }

    public function create_admin(){
        return view('control.register');
    }

    public function new_admin(Request $request){
    if(User::where('email',$request->email)->exists()){
            $message = "Your Email has been used already. Try another one!";
            return back()->with('message',$message);
     }else{
         $user = new User;
         $user->fullname = $request->firstname;
         $user->email = $request->email;
         $user->phone = $request->phone;
         $user->password = Hash::make($request->password);
         $user->user_type = "Admin";
         $user->status = 0;
         
         if ($user->save()) {
            $message = "your registration is complete!";
            return back()->with('message',$message);

         }else{
             $message = "Something went wrong. Try Again!";
             return back()->with('message',$message);
         }

     }

        
    }

    public function login_user(Request $request){
        
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'user_type'=>'Admin'])) {
            $request->session()->regenerate();
            $user = Auth::user();

            $otp= substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"),0,7);
            $user->otp = $otp;
            $user->save();
            return view('control.dashboard');
        }
        else{
            $message = "Wrong Email or Password!";
            return back()->with('message',$message);
        }
    }

    public function dashboard(){
        $users_count = User::where('user_type','User')->count();
        $users = User::where('user_type','User')->get();
        // $transactions = Transaction::where('status',0)->orderBy('id','desc')->take(5)->get();
        return redirect("control.dashboard",compact("users_count","users"));
    }




    public function approve_funding(Request $request,$id){
        $transaction = Transaction::find($id);

        $user_id = $transaction->user_id;
        $rwallet_type = $transaction->rwallet_type;
        $transaction->description = $request->description;
        $transaction->swallet_type= $request->swallet_type;
        $transaction->swallet_address= $request->swallet_address;
        $transaction->status= 1;

        $wallet = Wallet::where('user_id',$user_id)->where('type',$rwallet_type)->first();
        $wallet->balance += $request->amount;
        $transaction->balance = $wallet->balance + $request->amount;
        $transaction->save();
        $wallet->save();
        $user = User::find($user_id);
        Mail::to($user->email)->send(new CreditMail($user,$transaction));
        return back();


}
    public function edit_transaction(Request $request){
            $transaction = Transaction::find($request->id);
            $transaction->description = $request->description;
            $transaction->user_id = $request->user_id;
            $transaction->swallet_type= $request->swallet_type;
            $transaction->swallet_address= $request->swallet_address;
            // $transaction->rwallet_type= $request->rwallet_type;
            // $transaction->rwallet_address= $request->rwallet_address;
            $transaction->status= 1;

            $wallet = Wallet::where('user_id',$request->user_id)->where('type',$request->rwallet_type)->first();
            
            $transaction->balance = $wallet->balance + $request->amount;
            $wallet->balance += $request->amount;
            $transaction->save();
            $wallet->save();
            $user = User::find($request->user_id);
            Mail::to($user->email)->send(new CreditMail($user,$transaction));
            return back();


    }
    public function fund_wallet(Request $request){
        $transaction = new Transaction;
        $transaction->type = "Credit";
        $transaction->amount = $request->amount;
        $transaction->description = $request->description;
        $transaction->user_id = $request->user_id;

        if (Wallet::where('user_id',$request->user_id)->where('type',$request->rwallet_type)->exists()) {
            $wallet = Wallet::where('user_id',$request->user_id)->where('type',$request->rwallet_type)->first();
        
            $transaction->balance = $wallet->balance + $request->amount;
            $wallet->balance += $request->amount;
            $transaction->rwallet_type = $request->rwallet_type;
            $transaction->rwallet_address = $wallet->address;
            $transaction->status= 1;
            
            $transaction->save();
            $wallet->save();
            $user = User::find($request->user_id);
            Mail::to($user->email)->send(new CreditMail($user,$transaction));
            return back()->with("message","Transaction Successful");;
        }else{
            return back()->with("message","Transaction Failed Wallet not found");
        }





}


public function fetchwallets($id){
    $wallets = Wallet::where("user_id",$id)->select('type','balance')->get();
    return response()->json($wallets);;
}
    public function approve_transfer($id){
        $transaction = Transaction::find($id);

        $user_id = $transaction->user_id;
        $wallet_type = $transaction->swallet_type;        

        $wallet = Wallet::where('user_id',$user_id)->where('type',$wallet_type)->first();
        $wallet->balance -= $transaction->amount;
        $transaction->balance = $wallet->balance - $transaction->amount;
        $transaction->status = 1;
        $transaction->save();
        $wallet->save();
        $user = User::find($user_id);
        Mail::to($user->email)->send(new DebitMail($user,$transaction));
        return back();
    }

    public function deny_transfer(Request $request,$id){
        $transaction = Transaction::find($id);
        $transaction->status = 0;
        $transaction->save();
        return back();
    }

    public function transactions(){
            $transactions = Transaction::all();
            return view("control.transactions",compact("transactions"));

    }

    public function clients(){
        $users = User::all()->where('user_type','Customer');
        return view("control.clients",compact("users"));

    }


    public function investments(){
        $investments = Investment::all();
        return view("control.investments",compact("investments"));
    }    
    


}
