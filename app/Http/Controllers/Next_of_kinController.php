<?php

namespace App\Http\Controllers;

use App\User;
use App\Next_of_kin;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Next_of_kinController extends Controller
{
    //
    public function addNextOfKinDetailsForm(){
        $get_members_name = User::select('name','id')->get();
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        if(in_array('Can add next of kin', auth()->user()->getUserPermisions())){
        return view('after_login.add-nextofkin', compact('get_members_name','display_mails_received_inbox'));
        }else{
            abort(404);
        }
    }
    public function saveNextOfKinDetails(Request $request){
        if(empty($request->names)){
            return Redirect()->back()->withInput()->withErrors("Names cannot be empty");
        }
        if(Next_of_kin::where('names', $request->names)->exists())
        {
            return Redirect()->back()->withInput()->withErrors('Account number already exists, please enter a new name');

        }
        Next_of_kin::create(array(
            'user_id' =>$request->name,
            'names' => $request->names,
            'relationship' => $request->relationship
        ));
       return Redirect()->back()->WithErrors('Next of Kin details has been saved successfully');
    }

    public function displayNextOfKinDetails(){
        $display_nextofkin_details =Next_of_kin::join('users','next_of_kins.user_id','users.id')
        ->select('users.name','next_of_kins.id','next_of_kins.names','next_of_kins.relationship')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.nextofkin-table',compact('display_nextofkin_details','display_mails_received_inbox'));
    }
    public function searchNextOfKin(Request $request){
        $display_nextofkin_details=Next_of_kin::join('users','next_of_kins.user_id','users.id')
        ->where('users.name',$request->names)
        ->orWhere('next_of_kins.names',$request->names)
        ->orWhere('next_of_kins.relationship',$request->names)
        ->select('users.name','next_of_kins.id','next_of_kins.names','next_of_kins.relationship')

        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.nextofkin-table', compact('display_nextofkin_details','display_mails_received_inbox'));
    }
    public function editKin($id){
        $display_nextofkins =Next_of_kin::where('id',$id)->get();
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.edit-nextof-kin',compact('display_nextofkins', compact('display_mails_received_inbox')));
    }
    public function saveEditedNextOfKin(Request $request, $id){
        Next_of_kin::where('id',$id)->update(array(
            'user_id' =>Auth::user()->id,
            'names' => $request->names,
            'relationship' => $request->relationship
        ));
       return redirect('/display-next-of-kin-details');
    }
    public function updateNextOfKinDetailTable($id){
        Next_of_kin::where('id',$id)->update(array('status' => 'inactive'));
        return Redirect()->back()->withErrors("Next of Kin status updated");
    }
    public function deleteNextOfKinDetails($id){
        Next_of_kin::where('id',$id)->update(array('status' => 'deleted' ));
        return Redirect()->back()->withErrors("Next of Kin details has been deleted successfully");
    }
    protected function ValidateNextOfKin(){
        return request()->validate([
            'user_id' =>'required',
            'names'   =>'required',
            'relationship' =>'required',
            'status'       =>'required'
        ]);
    }
}
