<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function registerUsers(Request $request){
        User::create([
            'name'=>$request->name,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
            ]);
            return Redirect()->back()->with('message', 'User has been created Successfully');
    }
    public function getAllRegisteredUsers(){
        $all_users = DB::table('users')->join('roles','users.role_id','roles.id')
        ->select('roles.role','users.*')->where('users.id',Auth::user()->id)->orderBy('id','Desc')
        ->paginate('10');
        // if(in_array('Can view client', auth()->user()->getUserPermisions())){
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.users',compact('all_users','display_mails_received_inbox'));
        // }else{
        //     abort(404);
        // }
    }
    public function displayAllUsers(){
        $display_all_users =User::join('roles','users.role_id','roles.id')
        ->where('users.status','active')
        ->select('users.name','roles.role','users.contact','users.email','users.id')
        ->orderBy('users.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.all-users', compact('display_all_users','display_mails_received_inbox'));
    }
    public function searchUser(Request $request){
        $display_all_users=User::join('roles','users.role_id','roles.id')
        ->where('users.status','active')
        ->where('users.contact',$request->contact)
        ->orWhere('roles.role',$request->contact)
        ->orWhere('users.email',$request->contact)
        ->orWhere('users.name',$request->contact)
        ->orWhere('users.created_at',$request->contact)
        ->select('roles.role','users.id','users.email','users.contact','users.email','users.name')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.all-users', compact('display_all_users','display_mails_received_inbox'));
    }
    public function editUsersForm($id){
        if(DB::table('users')->where('id',$id)->where('status','Suspended')->exists()){
            return Redirect()->back()->withErrors("You cant Edit a suspended member");
        }
        $pick_user_id_role=Role::select("role", "id")->get();
        $edit_user_view = DB::table('users')->where('id',$id)->get();
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.edit-user-form',compact('edit_user_view','pick_user_id_role','display_mails_received_inbox'));
    }
    public function updateUserInformation($id, Request $request){
        if(DB::table('users')->where('id',$id)->where('status','Suspended')->exists()){
            return Redirect()->back()->withErrors("You cant Edit a suspended member");
        }
        DB::table('users')->where('id',$id)->update(array(
            'name' => $request->name,
            'email' => $request->email,
            'contact'=>$request->contact,
            'role_id'=>$request->role
        ));
        return Redirect()->back()->withErrors("User Details have been updated successfully");
    }
    public function SuspendUserInformation($id, Request $request){
        DB::table('users')->where('id',$id)->update(array(
            'status' => 'suspended'
        ));
        return Redirect()->back()->withErrors("User has Successfully been Suspended");
    }
    
}
