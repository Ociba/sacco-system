<?php

namespace App\Http\Controllers;

use App\Role;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    //
    public function addRoleForm(){
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        if(in_array('Can add role', auth()->user()->getUserPermisions())){
            return view('after_login.add_role_form', compact('display_mails_received_inbox'));
        }
        else{
            return redirect()->back();
        }
    }
    public function getAllRoles(){
        $get_all_roles = Role::paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        if(in_array('Can user accounts setting', auth()->user()->getUserPermisions())){
            return view('after_login.roles_table',compact('get_all_roles','display_mails_received_inbox'));
        }else{
            return redirect()->back();
        }
}

    public function searchRoles(Request $request){
        if(Role::where('role', $request->role)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Role doesnot exists, please check your spelling or it is not there');

        }
        $get_all_roles = Role::Where('role', 'like', '%'.$request->role. '%')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.roles_table',compact('get_all_roles','display_mails_received_inbox'));
    }

public function createRoles(Request $request){
    if(empty($request->role)){
        return Redirect()->back()->withInput()->withErrors("Role cannot be empty");
    }
    if(Role::where('role', $request->role)->exists())
    {
        return Redirect()->back()->withInput()->withErrors('Role already exists, please enter a new role');

    }

    Role::create(array(
    'role' =>$request->role, 
    
    ));
    return Redirect()->back()->withErrors("Role has been added successfully");
}
public function editRoles(Request $request){
    Role::update(array(
    'updated_by'=>Auth::user()->id,
    'role' =>$request->role
    ));
        return Redirect()->back()->withErrors("Status have been changed");
}
public function deleteRoles($id){
    Role::Where('id',$id)->update(array(
    'status'=>'deleted',
    'updated_by'=>Auth::user()->id
    ));
    return Redirect()->back()->withErrors("Status have been deleted successfully");
}
}
