<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Profile;
use App\Mail;
use DB;

class ProfileController extends Controller
{
    //
    public function addProfileForm(){
        $get_users_id =User::select('name','id')->get();
        $get_role_id =Role::select('role','id')->get();
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.profile-form',compact('get_users_id','get_role_id','display_mails_received_inbox'));
    }
    public function createProfile(Request $request){
        if(empty($request->work)){
            return Redirect()->back()->withInput()->withError("Profile can not be empty");
        }
        if($request->hasFile('image')) {

            $files = $request->file('image');
            $extension = $files->getClientOriginalExtension();
            $file_name = $files->getClientOriginalName();
            $folderpath =public_path().'/images/profile_pictures/';
            $files->move($folderpath, $file_name);

        Profile::create(array(
            'user_id'=>$request->name,
            'role_id'=>$request->role,
            'work'=>$request->work,
            'image'=>$file_name
        ));
        return Redirect()->back()->withErrors("Profile details has been created successfully");
    }
    else {
        return Redirect()->back()->withErrors("Error, seems like the file wasn't uploaded");
    }
    }
    public function displayProfile(){
        $display_profile =Profile::join('users','profiles.user_id','users.id')
        ->join('roles','profiles.role_id','roles.id')
        ->where('profiles.status','active')
        ->select('profiles.image','profiles.work','profiles.id','users.name','roles.role')
        ->paginate('10');
        $display_mails_received_inbox = Mail::where('status','active');
        return view('after_login.profile-table', compact('display_profile','display_mails_received_inbox'));
    }
    public function editProfileForm($id){
        $get_users_id =User::select('name','id')->get();
        $get_role_id =Role::select('role','id')->get();
        $edit_profile_details =Profile::where('id',$id)->get();
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.edit-profile',compact('edit_profile_details','get_users_id','get_role_id','display_mails_received_inbox'));
    }
    public function updateProfileInformation($id, Request $request){
        Profile::where('id',$id)->update(array(
            'user_id'=>$request->name,
            'role_id'=>$request->role,
            'work'=>$request->work,
            'image'=>$request->image
        ));
        return Redirect()->back()->withErrors("You have successfully upadated award(s)");
    }
    public function deleteProfile($id){
        Profile::where('id',$id)->update(array(
            'status'=>'deleted'
        ));
    }
}
