<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail;
use App\Reply;
use App\Draft;
use App\Profile;
use DB;

class MailsController extends Controller
{
    //
    public function displayMailBox(){
        $display_mails_received_inbox =Mail::where('status','received')
        ->select('mails.name','mails.id','mails.subject','mails.message','mails.attachment','mails.created_at')
        ->paginate('10');
        return view('after_login.mailbox', compact('display_mails_received_inbox'));
    }
    
    public function displayCompose(){
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.compose',compact('display_mails_received_inbox'));
    }
    public function displayReadMail($id){
        $read_mail =Mail::where('id',$id)->get();
        $display_replied_mails =Reply::join('mails','replies.mail_id','mails.id')
        ->join('profiles','replies.profile_id','profiles.id')
        ->join('users','replies.user_id','users.id')
        ->where('replies.mail_id', $id)
        ->select('users.name','mails.id','mails.subject','mails.message','profiles.image','replies.reply','mails.created_at')
        ->get();
        $display_mails_received_inbox = Mail::where('status','active');
        return view('after_login.read-mail', compact('read_mail','display_replied_mails', 'sent','display_mails_received_inbox'));
    }
    public function displaySentMail(){
        $display_mails_sent =Mail::where('status','sent')
        ->select('mails.id','mails.name','mails.subject','mails.message','mails.attachment','mails.created_at')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.sent-mail', compact('display_mails_sent','display_mails_received_inbox'));
    }
    public function displayDraftMail(){
        $display_mails_saved_indraft =Draft::join('users','drafts.user_id','users.id')
        ->where('drafts.status','active')
        ->select('drafts.id','drafts.name','drafts.subject','drafts.message','drafts.attachment','drafts.created_at')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.draft-mail', compact('display_mails_saved_indraft','display_mails_received_inbox'));
    }
    public function displayJunkMail(){
        $display_mails_read_injunk =Mail::where('status','read')
        ->select('mails.id','mails.name','mails.subject','mails.message','mails.attachment','mails.created_at')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.junk-mail', compact('display_mails_read_injunk','display_mails_received_inbox'));
    }
    public function displayTrashMail(){
        $display_mails_deleted_intrash =Mail::where('status','deleted')
        ->select('mails.id','mails.name','mails.subject','mails.message','mails.attachment','mails.created_at')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.trash-mail', compact('display_mails_deleted_intrash','display_mails_received_inbox'));
    }
    public function createMail(Request $request){
        if(empty($request->name)){
            return Redirect()->back()->withInput()->withErrors("Name can not be empty");
        }
        if(empty($request->subject)){
            return Redirect()->back()->withInput()->withErrors("Subject can not be empty");
        }
        if(empty($request->message)){
            return Redirect()->back()->withInput()->withErrors("Message can not be empty");
        }
        if($request->hasFile('attachment')) {

            $files = $request->file('attachment');
            $extension = $files->getClientOriginalExtension();
            $file_name = $files->getClientOriginalName();
            $folderpath =public_path().'/images';
            $files->move($folderpath, $file_name);
        Mail::create(array(
            'user_id'=>Auth::user()->id,
            'name'=>$request->name,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'attachment'=>$file_name
        ));
        return Redirect()->back()->withErrors("Message has been sent Succeessfull");
    }
    else {
        return Redirect()->back()->withErrors("Error, seems like the file wasn't uploaded");
    }
    }
    public function saveMail(Request $request){
        if(empty($request->name)){
            return Redirect()->back()->withInput()->withErrors("Name can not be empty");
        }
        if(empty($request->subject)){
            return Redirect()->back()->withInput()->withErrors("Subject can not be empty");
        }
        if(empty($request->message)){
            return Redirect()->back()->withInput()->withErrors("Message can not be empty");
        }
        if($request->hasFile('attachment')) {

            $files = $request->file('attachment');
            $extension = $files->getClientOriginalExtension();
            $file_name = $files->getClientOriginalName();
            $folderpath =public_path().'/forms';
            $files->move($folderpath, $file_name);
        Draft::create(array(
            'user_id'=>Auth::user()->id,
            'name'=>$request->name,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'attachment'=>$file_name
        ));
        return Redirect()->back()->withErrors("Message has been saved Succeessfull");
    }
    else {
        return Redirect()->back()->withErrors("Error, seems like the file wasn't uploaded");
    }
    }
    public function sendMail($id){
        Mail::where('id',$id)->update(array('status'=>'send'));
        return Redirect()->back()->withErrors("The message has been sent successfully");
    }
    public function deleteMail($id){
        Mail::where('id',$id)->update(array('status'=>'deleted'));
        return Redirect()->back()->withErrors("The message has been deleted successfully");
    }
    public function replyMailForm($id){
      $reply_mail =Mail::where('id',$id)->get();
      $pick_message =Mail::select('message','id')->get();
      $pick_profile =Profile::select('image','id')->get();
      $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
      return view('after_login.reply-mail-form', compact('reply_mail','pick_message','pick_profile','display_mails_received_inbox'));
    }
    public function createReplyMail(Request $request){
        if(empty($request->reply)){
            return Redirect()->back()->withInput()->withErrors("Reply can not be empty");
        }
        Reply::create(array(
            'user_id'=>Auth::user()->id,
            'profile_id'=>$request->image,
            'mail_id'=>$request->message,
            'reply'=>$request->reply
        ));
        return Redirect()->back()->withErrors("Message has been sent Succeessfull");
    }
    
    public function displayReplyMail(Request $id){
        $display_replied_mails =Reply::join('mails','replies.mail_id','mails.id')
        ->join('profiles','replies.profile_id','profiles.id')
        ->join('users','replies.user_id','users.id')
        ->where('replies.mail_id', $id)
        ->select('users.name','mails.id','mails.subject','mails.message','profiles.image','replies.reply','mails.created_at')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.reply-mail', compact('display_replied_mails','display_mails_received_inbox'));
    }
    public function displayReplyMails(){
        $display_replied_mails =Reply::join('mails','replies.mail_id','mails.id')
        ->join('profiles','replies.profile_id','profiles.id')
        ->join('users','replies.user_id','users.id')
        ->where('replies.status','active')
        ->select('users.name','mails.id','mails.subject','mails.message','profiles.image','replies.reply','mails.created_at')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.reply-mail', compact('display_replied_mails','display_mails_received_inbox'));
    }
}
