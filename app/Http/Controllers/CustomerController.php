<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Document;
use App\Models\Transaction;
use App\Models\Investment;
use Illuminate\Support\Facades\Mail;
use App\Mail\SigninMail;
use App\Mail\DocumentMail;
use App\Mail\PasswordMail;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
class CustomerController extends Controller
{

    public function create_account(Request $request){
        if(User::where('email',$request->email)->exists()){
               $message = "Your Email has been used already. Try another one!";
               return back()->with('message',$message);
        }else{
            $user = new User;
            $user->fullname = $request->fullname;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->designation = $request->designation;
            $user->password = Hash::make($request->phone);
            $user->user_type = $request->user_type;
            $user->status = 0;
            
            if ($user->save()) {
            //    $usr = User::where('email',$user->email)->first();
               
               
            //    Mail::to($user->email)->send(new RegMail($usr,$strval));
               $message = "Staff Account has been created!";
               return back()->with('message',$message);

            }else{
                $message = "Something went wrong. Try Again!";
                return back()->with('message',$message);
            }

        }
    }

    public function authuser(Request $request){
        
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            $user = Auth::user();

            echo $otp= substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"),0,7);
            $user->otp = $otp;
            $user->save();
            // Mail::to($user->email)->send(new OtpMail($user,$otp));
            return redirect('mydesk.me/home');
        }
        else{
            $message = "Wrong Email or Password!";
            return back()->with('message',$message);
        }
    }



    public function dashboard(){
        $users_no = User::all()->count();
        $users = User::where('user_type','User')->orwhere('user_type','Secretary')->orwhere('user_type','Registry')->get();
        $documents = Document::where('receiver_id',Auth::user()->id)->where('status',0)->where('mandate',0)->get();
        $m_documents = Document::where('receiver_id',Auth::user()->id)->where('status',0)->where('mandate',1)->get();
        $documents_no = Document::where('receiver_id',Auth::user()->id)->count();
        $all_documents = Document::where('mandate',0)->where('status',0)->paginate(10);
        $mandate_documents = Document::where('mandate',1)->where('status',0)->paginate(10);
        $transactions = Transaction::all();
        return view("mydesk.index",compact("users_no","transactions","users","documents","documents_no","all_documents","mandate_documents","m_documents"));
    }

    public function profile(){
        return view("mydesk.profile");
    }

    public function selfservice(){
        $user = User::find(Auth::user()->id);
        return view("mydesk.selfservice",compact("user"));
    }
    public function upload_doc(){
        $documents = Document::where('status',0)->where('mandate',0)->get();
        return view("mydesk.upload_doc",compact("documents"));
    }
    public function upload_man(){
        $documents = Document::where('status',0)->where('mandate',1)->get();
        return view("mydesk.upload_mandate",compact("documents"));
    }
    public function signature_upload(){
        return view("mydesk.signature_upload");
    }



    public function newprofile(){
        $users = User::all();
        return view("mydesk.create_accounts",compact("users"));
    }


    public function transactions(){
        $transactions = Transaction::where('user_id',Auth::user()->id)->get();
        return view("mydesk.transactions",compact("transactions"));
    }

    public function archived_documents(){
        $documents = Document::where('status',1)->paginate(10);
        return view("mydesk.archived_documents",compact("documents"));
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function my_kyc(){

        return view("mydesk.kyc");
    }

    public function settings(){
        
        return view("mydesk.settings");
    }


    //CRUDS

    public function update_profile(Request $request){
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('photo')) {
        $imageName = Auth::user()->fullname."_".time()."_profile_".Auth::user()->id.'.'.$request->photo->extension();
        $request->photo->move(public_path('profile_images'), $imageName);

        $user->photo = $imageName;
        }

        
        if($user->save()){
            $message = "Update Successful";
            return back()->with('message',$message);
        }else{
            $message = "Error";
            return back()->with('message',$message);
        }

        
    }

    public function edit_user(Request $request){
        $user = User::find($request->user_id);
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_type = $request->user_type;
        $user->designation = $request->designation;
        if($user->save()){
            $message = "Update Successful";
            return back()->with('message',$message);
        }else{
            $message = "Error";
            return back()->with('message',$message);
        }

        
    }
    
    public function delete_user($id){
        $user = User::find($request->user_id);
        if($user->delete()){
            $message = "Delete Successful";
            return back()->with('message',$message);
        }else{
            $message = "Error";
            return back()->with('message',$message);
        }

        
    }
    
    public function delete_doc($id){
        $document = Document::find($id);
        if($document->delete()){
            $message = "Delete Successful";
            return back()->with('message',$message);
        }else{
            $message = "Error";
            return back()->with('message',$message);
        }
    }

    public function upload_document(Request $request){
        $document = new Document;
        if ($request->hasFile('document')) {
        $imageName = $request->title."_".time().'.'.$request->document->extension();
        $request->document->move(public_path('document'), $imageName);

        $document->doc_image = $imageName;
        

        }

        $document->title = $request->title;
        $document->sender_id = Auth::user()->id;
        $document->receiver_id = Auth::user()->id;
        $document->mandate = 0;
        $document->uploaded_by = "user_".Auth::user()->id."_".Auth::user()->fullname."_".Auth::user()->designation;
        
        if($document->save()){
            $message = "Update Successful";
            return back()->with('message',$message);
        }else{
            $message = "Error";
            return back()->with('message',$message);
        }

        
    }
    
    public function upload_mandate(Request $request){
        $document = new Document;
        if ($request->hasFile('document')) {
        $imageName = "MANDATE_".$request->title."_".time().'.'.$request->document->extension();
        $request->document->move(public_path('document'), $imageName);

        $document->doc_image = $imageName;
        

        }

        $document->title = $request->title;
        $document->sender_id = Auth::user()->id;
        $document->receiver_id = Auth::user()->id;
        $document->mandate = 1;
        $document->uploaded_by = "user_".Auth::user()->id."_".Auth::user()->fullname."_".Auth::user()->designation;
        
        if($document->save()){
            $message = "Update Successful";
            return back()->with('message',$message);
        }else{
            $message = "Error";
            return back()->with('message',$message);
        }

        
    }

    public function upload_signature(Request $request){
        $user = User::find(Auth::user()->id);
            if ($request->hasFile('signature')) {
                $signatureName = Auth::user()->fullname."_".time()."_sign".'.'.$request->signature->extension();
                $request->signature->move(public_path('profile_signatures'), $signatureName);
        
                $user->signature = $signatureName;
            }
            
    
            
    
            if($user->save()){
                $message = "Update Successful";
                return back()->with('message',$message);
            }else{
                $message = "Error";
                return back()->with('message',$message);
            }

        
    }

    public function forward_doc(Request $request){
        $document = Document::find($request->document_id);
        $document->sender_id = Auth::user()->id;
        $document->receiver_id = $request->receiver_id;
        
        $user = User::find($request->receiver_id);
        if($document->save()){
            $message = "Sent";
            
            Mail::to($user->email)->send(new DocumentMail($user));
            return back()->with('message',$message);
        }else{
            $message = "Error";
            return back()->with('message',$message);
        }

        
    }

    public function view_doc($id){
        $document = Document::find($id);
        $transactions = Transaction::where('document_id',$id)->get();
        return view('mydesk.view_document',compact('document','transactions'));
    }
    public function print_doc($id){
        $document = Document::find($id);
        $transactions = Transaction::where('document_id',$id)->get();
        return view('mydesk.document',compact('document','transactions'));
    }

    public function my_history(){
        $transactions = Transaction::where('user_id',Auth::user()->id)->get();
        return view('mydesk.transactions',compact('transactions'));
    }

    public function archive($id){
        $document = Document::find($id);
        $document->status = 1;
        $document->save();
        return back();        
    }

    public function unarchive($id){
        $document = Document::find($id);
        $document->status = 0;
        $document->save();
        return back(); 
    }
    public function input_comment(Request $request){
        $document = Document::find($request->document_id);
        $transaction = new transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->document_id = $document->id;
        $transaction->comment = $request->comment;
       if(Transaction::where('user_id',Auth::user()->id)->where('document_id',$document->id)->exists()){

              return back()->with('message','You have Minuted on this document before');

       }else{
        
           if($transaction->save()){
                return back();
            }else{
                return back();
            }
       }


    }


    public function create_document(){
        return view('mydesk.create_document');
    }


    public function change_password(Request $request){
        $id = Auth::user()->id;
        $email = Auth::user()->email; 
        $cpass = $request->input('cpass') ;
        $npass = $request->input('npass') ;
        $vpass = $request->input('vpass') ;

        if(Hash::check($cpass,Auth::user()->password)){
            if($npass == $vpass){
                User::where('id', $id)
               ->update(['password' => Hash::make($npass)]);
               Mail::to(Auth::user()->email)->send(new PasswordMail(Auth::user()));
                $message = "Password has been Updated!";
                return back()->with('message',$message);
           }else{
            $message = "Passwords are not the same!";
            return back()->with('message',$message);
           }
        }else{
            $message = "Curent Password is wrong..Try again!";
            return back()->with('message',$message);
        }

    }




}
