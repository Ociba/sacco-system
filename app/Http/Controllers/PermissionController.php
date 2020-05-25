<?php

namespace App\Http\Controllers;

use App\Permission;
use App\PermissionRole;
use App\Role;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    //
    public function getAllPermissionsForARole($id){
        $get_selected_role = Role::where('id',$id)->get();
        $get_all_permissions = PermissionRole::join('roles','permission_roles.role_id','roles.id')
        ->join('permissions','permission_roles.permission_id','permissions.id')
        ->where('roles.id',$id)
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.permission-table',compact('get_all_permissions','get_selected_role','display_mails_received_inbox'));
    }

    public function addPermissionForm(){
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.add_permission_form',compact('display_mails_received_inbox'));
    }

    public function pickAllPermissionsCheckBox(){
        $select_all_permissions = Permission::paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.checkboxes_permission_table',compact('select_all_permissions','display_mails_received_inbox'));
    }
    

    public function assign_roles($id, Request $request){
        if(empty($request->user_permisions)){
            return redirect()->back()->withErrors("No updates were made, you didn't select any permision");
        }
        $permissions = $request->user_permisions;
            foreach($permissions as $permission){
                if(PermissionRole::where('role_id',$id)->where('permission_id',$permission)->exists()){
                    continue;
                }
                else{
                    PermissionRole::create(array(
                        'role_id' => $id,
                        'permission_id' => $permission,
                        'created_by'     => Auth::user()->id
                    ));
                }
            }
        return Redirect()->back()->withErrors("Permission(s) added Successfully");
    }
    public function searchPermission(Request $request){
        if(Permission::where('permission', $request->permission)->doesntExist())
        {
            return Redirect()->back()->with('Message','permission doesnot exists, please check your spelling or it is not there');
            
        }
        $get_all_permissions = Permission::where('permission','like', '%'.$request->permission. '%') 
        ->paginate(10);
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.permission_table',compact('get_all_permissions','display_mails_received_inbox'));
    }
    public function unsignPermission($id){
        PermissionRole::where('permission_id',$id)->delete();
        return redirect()->back()->with('Message','Permission has been unsigned successfully');
    }
}
