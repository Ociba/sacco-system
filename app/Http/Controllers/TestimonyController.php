<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimony;
use DB;

class TestimonyController extends Controller
{
    //
    public function displayTestimony(){
    $display_mails_received_inbox = DB::table('mails')
    ->join('users','mails.user_id','users.id')
    ->where('mails.status','active')
    ->select('mails.message','mails.name','mails.created_at')->get();
        return view('front.testimony', compact('display_mails_received_inbox'));
    }
    public function createTestimony(Request $request){
        if(empty($request->name)){
            return redirect()->back()->withInput()->withErrors("Name can not be empty");
        }
        if(empty($request->email)){
            return Redirect()->back()->withInput()->withErrors("Email can not be empty");
        }
        if(empty($request->phone_number)){
            return Redirect()->back()->withInput()->withErrors("Phone number can not be empty");
        }
        if(empty($request->message)){
            return Redirect()->back()->withInput()->withErrors("Message can not be empty");
        }
        if($request->hasFile('image')) {

            $files = $request->file('image');
            $extension = $files->getClientOriginalExtension();
            $file_name = $files->getClientOriginalName();
            $folderpath =public_path().'/images/profile_pictures/';
            $files->move($folderpath, $file_name);

            Testimony::create(array(
                'name'=>$request->name,
                'email'=>$request->email,
                'phone_number'=>$request->phone_number,
                'message'=>$request->message,
                'image'=>$file_name
            ));
            return Redirect()->back()->withError("You have add Item to the Cart Successfully");
        }
        else {
            return Redirect()->back()->withErrors("Error, seems like the file wasn't uploaded");
    }
}

public function displayNotApprovedMessages(){
    $not_approved_messages =Testimony::where('status','approve')
    ->paginate('10');
    $display_mails_received_inbox = DB::table('mails')
    ->join('users','mails.user_id','users.id')
    ->where('mails.status','active')
    ->select('mails.message','mails.name','mails.created_at')->get();
    return view('after_login.approve-testimony',compact('not_approved_messages','display_mails_received_inbox'));
}
public function approveTestimony($id){
    Testimony::where('id',$id)->update(array('status'=>'active'));
    return Redirect()->back()->withErrors("The Testimony has been approved Successfully");
}
public function deleteTestimony($id){
    Testimony::where('id',$id)->update(array('status'=>'deleted'));
    return Redirect()->back()->withErrors("The Testimony has been deleted Successfully");
}
}
