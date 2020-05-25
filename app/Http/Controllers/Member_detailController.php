<?php

namespace App\Http\Controllers;
use App\Member_detail;
use App\User;
use App\Role;
use App\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class Member_detailController extends Controller
{
    //
  
    public function membersDetails(){
        if(in_array('Can add member details', auth()->user()->getUserPermisions())){
        $display_mails_received_inbox = Mail::where('status','active');
        return view('after_login.add-members',compact('display_mails_received_inbox'));
        }else{
            abort(404);
        }
    }
    public function addUsers(){
        if(in_array('Can add user', auth()->user()->getUserPermisions())){
        $display_mails_received_inbox = Mail::where('status','active');
        return view('after_login.add-users-form',compact('display_mails_received_inbox'));
        }else{
            abort(404);
        }
    }
    public function saveMembersDetails(Request $request){
        if(empty($request->avatar)){
            return Redirect()->back()->withInput()->withErrors("Group cannot be empty");
        }
        if(Member_detail::where('avatar', $request->avatar)->exists())
        {
            return Redirect()->back()->withInput()->withErrors('avatar already exists, please enter a new avatar');

        }
        if($request->hasFile('avatar')) {

            $files = $request->file('avatar');
            $extension = $files->getClientOriginalExtension();
            $file_name = $files->getClientOriginalName();
            $folderpath =public_path().'/images/profile_pictures/';
            $files->move($folderpath, $file_name);

            Member_detail::create(array(
                'user_id' => Auth::user()->id,
                'town' => $request->town,
                'county' => $request->county,
                'residence' =>$request->residence,
                'occupation'=>$request->occupation,
                'date_of_joining' => $request->date_of_joining,
                'avatar'=>$file_name
            ));
            
            return Redirect()->back()->withErrors("Thanks Member details has been created successfully");
        }
        else {
            return Redirect()->back()->withErrors("Error, seems like the file wasn't uploaded");
        }
    
    }
    public function showStaff(){
        $show_staff = User::join('roles','users.role_id','roles.id')
        ->where('users.status','active')
        ->where('users.role_id',1)
        ->orwhere('users.role_id',2)
        ->orwhere('users.role_id',3)
        ->orwhere('users.role_id',4)
        ->select('roles.role','users.name','users.contact','users.email')
        ->orderBy('users.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = Mail::where('status','active');
        return view('after_login.staff', compact('show_staff','display_mails_received_inbox'));
    }
    public function searchStaff(Request $request){
        $show_staff=User::join('roles','users.role_id','roles.id')
        ->where('users.status','active')
        ->where('users.contact',$request->email)
        ->orWhere('roles.role',$request->email)
        ->orWhere('users.name',$request->email)
        ->orWhere('users.email',$request->email)
        ->select('roles.role','users.name','users.contact','users.email')
        ->paginate('10');
        $display_mails_received_inbox = Mail::where('status','active');
        return view('after_login.staff', compact('show_staff','display_mails_received_inbox'));
    }
    public function showMemberDetails(){
        $display_all_members_details = Member_detail::join('users','members.user_id','users.id')
        ->where('members.status','active')
        ->select('users.contact','members.town','members.county','residence',
                 'members.occupation','members.date_of_joining','avatar')
        ->orderBy('members.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = Mail::where('status','active');
        return view('after_login.member-details-table',compact('display_all_members_details','display_mails_received_inbox'));
    }
    public function searchMember(Request $request){
        $display_all_members_details=Member_detail::join('users','members.user_id','users.id')
        ->where('members.status','active')
        ->where('users.contact',$request->contact)
        ->orWhere('members.town',$request->contact)
        ->orWhere('members.county',$request->contact)
        ->orWhere('members.residence',$request->contact)
        ->orWhere('members.occupation',$request->contact)
        ->orWhere('members.date_of_joining',$request->contact)
        ->orWhere('members.avatar',$request->contact)
        ->select('users.contact','members.town','members.county','residence',
        'members.occupation','members.date_of_joining','avatar')
        ->paginate('10');
        $display_mails_received_inbox = Mail::where('status','active');
        return view('after_login.member-details-table', compact('display_all_members_details','display_mails_received_inbox'));
    }
    
    public function editUsersForm($id){
       
        $pick_user_id_role=Role::select("role", "id")->get();
        $edit_user_view = User::where('id',$id)->get();
        $display_mails_received_inbox = Mail::where('status','active');
        return view('after_login.edit-registered-user',compact('edit_user_view','pick_user_id_role','display_mails_received_inbox'));
    }
    public function updateUserInformation($id, Request $request){
        User::where('id',$id)->update(array(
            'name' => $request->name,
            'email' => $request->email,
            'contact'=>$request->contact,
            'role_id'=>$request->role
        ));
        return redirect('/all_users')->withErrors("User Details have been updated successfully");
    }
    public function deleteUser($id){
        User::where('id',$id)->update(array('status' => 'deleted'));
        Member_detail::where('id',$id)->update(array('status' => 'deleted'));
        return Redirect()->back()->withErrors("Members details has been deleted successfully");
    }
    public function updateMembersDetailTable($id){
        Member_detail::where('id',$id)->update(array('status' => 'inactive'));
        return Redirect()->back()->withErrors("Members status updated");
    }
    public function deleteMembersDetails($id){
        Member_detail::where('id',$id)->update(array('status' => 'deleted'));
        return Redirect()->back()->withErrors("Members details has been deleted successfully");
    }
    public function displayChangePasswordForm(){
        if(in_array('Can change password', auth()->user()->getUserPermisions())){
        $display_mails_received_inbox = Mail::where('status','active');
        return view('after_login.change-password',compact('display_mails_received_inbox'));
        }else{
            return redirect()->back();
        }
    }
    public function store_users_password(Request $request) {
        $get_users_current_password = User::find(Auth::user()->id)->password;
        $current_password = $request->current_password;
        if ($request->new_password == $request->confirm_password) {
            if (Hash::check($current_password, $get_users_current_password)) {
                User::where("id", Auth::user()->id)->update(array('password' => Hash::make($request->new_password)));
                Auth::logout();
                return Redirect()->back()->with('message', 'Password was Updated successfully');
            } else {
                return Redirect()->back()->withInput()->withErrors("Incorrect password has been supplied");
            }
        } else {
            return Redirect()->back()->withInput()->withErrors("Make sure the two new passwords match");
        }
    }
    public function registerUser(){
        if(in_array('Can view register user', auth()->user()->getUserPermisions())){
        $display_mails_received_inbox = Mail::where('status','active');
        return view('after_login.register-user',compact('display_mails_received_inbox'));
        }else{
            return redirect()->back();
        }
    }
    protected function ValidateMember(){
        return request()->validate([
            'user_id'   =>'required',
            'account_id' =>'required',
            'town'   =>'required',
            'county'  =>'required',
            'residence' =>'required',
            'occupation' =>'required',
            'date_of_joining' =>'required',
            'avatar' =>'required',
            'status' =>'required'

        ]);
    }
}