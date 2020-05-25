<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Messages;
use App\Subscribe;
use App\Soon;
use DB;

class MessagesController extends Controller
{
    //
    public function createMessage(Request $request){
        if(empty($request->name)){
            return Redirect()->back()->withInput()->withErrors("Name ca not be Empty");
        }
        if(empty($request->emai)){
            return Redirect()->back()->withInput()->withErrors("Email can not be empty");
        }
        if(empty($request->phone_number)){
            return Redirect()->back()->withInput()->withErrors("Phone number can not be empty");
        }
        if(empty($request->message)){
            return Redirect()->back()->withInput()->withErrors("Message can not be empty");
        }
        Messages::create(array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'message'=>$request->message
        ));
        return Redirect()->back()->withErrors("Message has been Created Successfully");
    }
    public function displayMessages(){
        $display_messages =Messages::where('status','active')->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.messages-table', compact('display_messages','display_mails_received_inbox'));
    }
    public function deleteMessage($id){
      Messages::where('id',$id)->update(array('status'=>'deleted'));
      return Redirect()->back()->withErrors("Message has been deleted Successfully");
    }
    public function createSubscription(Request $request){
        if(empty($request->email)){
            return Redirect()->back()->withInput()->withErrors("Email can not be Empty");
        }
        Subscribe::create(array(
        'email'=>$request->email
        ));
        return Redirect()->back()->withErrors("You have Subscribed Successfully");
    }
    public function displaySubscription(){
        $display_subscription =Subscribe::where('status','active')
        ->orderBy('created_at','desc')
        ->paginate('10');
         $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.subscription-table', compact('display_subscription','display_mails_received_inbox'));
    }
    public function deleteSubscription($id){
        Subscribe::where('id',$id)->update(array('status'=>'delete'));
        return Redirect()->back()->withErrors("Your email has been deleted successfully");
    }
    public function ComingSoonForm(){
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.coming-soon-form', compact('display_mails_received_inbox'));
    }
    public function createComingSoon(Request $request){
        if(empty($request->message)){
            return Redirect()->back()->withInput()->withErrors("Message can not be empty");
        }
        if(empty($request->expected_date)){
            return Redirect()->back()->withInput()->withErrors("Expected date can not be empty");
        }
        Soon::create(array(
            'user_id'=>Auth::user()->id,
            'message'=>$request->message,
            'expected_date'=>$request->expected_date
        ));
        return Redirect()->back()->withErrors("Coming soon has been created Successfully");
    }
    public function displayComing(){
        $display_coming_soon_message =Soon::join('users','soons.user_id','users.id')
        ->where('soons.status','active')
        ->select('users.name','soons.message','soons.id','soons.expected_date')
        ->orderBy('soons.created_at','desc')
        ->limit(1)
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.coming-soon-table', compact('display_coming_soon_message','display_mails_received_inbox'));
    }
    public function editComingSoonForm($id){
        $display_coming_soon =Soon::where('id',$id)->get();
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.edit-coming-soon', compact('display_coming_soon','display_mails_received_inbox'));
    }
    public function updateComingSoon(Request $request, $id){
        Soon::where('id',$id)->update(array(
            'user_id'=>Auth::user()->id,
            'message'=>$request->message,
            'expected_date'=>$request->expected_date
        ));
        return Redirect()->back()->withErrors("Coming soon details has been update successfully");
    }
    public function deleteComingSoon($id){
        Soon::where('id',$id)->update(array('status' =>'deleted'));
        return Redirect()->back()->withErrors("Coming soon details has been deleted successfully");
    }
}
