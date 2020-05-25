<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Testimony;
use App\Call;
use App\Soon;
use App\User;
use DB;

class PagesController extends Controller
{
    //
    public function displayHome(){
        $display_all_testimonies =Testimony::where('status','active')->get();
        $display_all_projects =Project::join('users','projects.user_id','users.id')
        ->where('projects.status','active')
        ->select('projects.project_title','projects.image')
        ->get();
        $display_members_count =User::join('roles','users.role_id','roles.id')
        ->where('users.role_id',5)
        ->count();
        $display_other_users_count =User::join('roles','users.role_id','roles.id')
        ->where('users.status','active')
        ->where('users.role_id',1)
        ->orwhere('users.role_id',2)
        ->orwhere('users.role_id',3)
        ->orwhere('users.role_id',4)
        ->count();
        $display_users_count =User::join('roles','users.role_id','roles.id')
        ->where('users.status','active')
        ->count();
        return view('front.template',compact('display_all_projects','display_all_testimonies',
                  'display_members_count','display_users_count','display_other_users_count'));
    }
    public function displayContactUs(){
        return view('front.contact');
    }
    public function displayMaintenance(){
        return view('front.mantainance');
    }
    public function displayComingSoon(){
        $display_coming_soon_message =Soon::join('users','soons.user_id','users.id')
        ->where('soons.status','active')
        ->select('users.name','soons.message','soons.id','soons.expected_date')
        ->orderBy('soons.created_at','desc')
        ->limit(1)
        ->get();
        return view('front.coming-soon', compact('display_coming_soon_message'));
    }
    public function createCallBack(Request $request){
        if(empty($request->name)){
            return Redirect()->back()->withInput()->withErrors("Name cannot be empty");
        }
        if(empty($request->question)){
            return Redirect()->back()->withInput()->withErrors("Question cannot be empty");
        }
        if(empty($request->email)){
            return Redirect()->back()->withInput()->withErrors("Email cannot be empty");
        }
        if(empty($request->contact)){
            return Redirect()->back()->withInput()->withErrors("Contact cannot be empty");
        }
        Call::create(array(
            'name'=>$request->name,
            'question'=>$request->question,
            'email'=>$request->email,
            'contact'=>$request->contact
        ));
        return Redirect()->back()->withErrors("Call back details has been sent Successfully");
    }
    public function displayCallBack(){
        $display_call_backs_requests =Call::where('status','active')->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.call-backs', compact('display_call_backs_requests','display_mails_received_inbox'));
    }
    public function approveCallBackResponded($id){
      Call::where('id',$id)->update(array('status'=>'responded'));
      return Redirect()->back()->withErrors("Call back status updated Successsfully");
    }
}
