<?php

namespace App\Http\Controllers;

use App\Benefit;
use App\Member_detail;
use App\Saving;
use App\Account;
use DB;
use App\User;
use App\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class BenefitController extends Controller
{
    //
    public function displayBenefitForm(){
        if(in_array('Can create benefit', auth()->user()->getUserPermisions())){
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.create-benefit',compact('display_mails_received_inbox'));
        }else{
            abort(404);
        }
    }
    public function createBenefit(Benefit $benefit,Request $request){

        Benefit::create(array(
            'user_id'   =>Auth::user()->id,
            'benefit'  =>$request->benefit
        ));
        return Redirect()->back()->withErrors("Thanks Benefit has been created successfully");
    }
    public function viewAllBenefit(){
        $show_all_benefit =Benefit::join('users','benefits.user_id','users.id')
        ->where('benefits.status','allowed')
        ->orwhere('benefits.status','not allowed')
        ->select('benefits.id','users.name','benefits.benefit')
        ->orderBy('benefits.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.all-benefit-table', compact('show_all_benefit','display_mails_received_inbox'));
    }
    
    public function displayacceptedBenefit(){
        
        $show_benefit =Benefit::join('users','benefits.user_id','users.id')
        ->where('benefits.status','allowed')
        ->select('benefits.id','users.name','benefits.benefit')
        ->orderBy('benefits.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.accepted-benefit-table', compact('show_benefit','display_mails_received_inbox'));
    }
    public function displayUnacceptedBenefit(){
        $shows_unaccepted_benefit =Benefit::join('users','benefits.user_id','users.id')
        ->where('benefits.status','not allowed')
        ->select('benefits.id','users.name','benefits.benefit')
        ->orderBy('benefits.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.unaccepted-benefit', compact('shows_unaccepted_benefit','display_mails_received_inbox'));
    }
    public function updateBenefit($id){
        Benefit::where('id',$id)->update(array('status'=>'not allowed'));
        return Redirect()->back()->withErrors("Benefit details has been deleted successfully");
    }
    protected function ValidateBenefit(){
        return request()->validate([
            'user_id' =>'required',
            'account_id' =>'required',
            'benefit' =>'required'
        ]);
    }
    public function shareBenefitForm(){
        if(in_array('Can add shares', auth()->user()->getUserPermisions())){
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.share-benefit-form', compact('display_mails_received_inbox'));
        }else{
            abort(404);
        }
    }
    public function createShareBenefit(Request $request){
        //counting number of members
        $members = Member_detail::join('users','users.id','members.user_id')
        ->where('members.status','active')->count();
        //Totalling all the benefits
        $all_benefits = DB::table('benefits')->sum('benefit');
        //Dividing per member
        $each_person = ($all_benefits/$members);
        //saving shares
        Share::create(array(
            'user_id'=>Auth::user()->id,
            'share'=>$each_person
        ));
        //pick the amount from account
        $get_total_amount =Saving::join('users','savings.user_id','users.id')
        ->where('user_id', Auth::user()->id)->sum('savings.saving')->pluck();
    //    // $get_account_amount=Account::where('status','active')->select('accounts.total')->pluck();
    //     //pick share from share table
    //     $get_share=Share::where('status','active')->select('shares.share')->first();
    //     //add account with what each person will get
    //     $add_to_account= $get_share->share + $get_account_amount->total;
    //     Account::where('id',1)->update(['total' =>$add_to_account]);
        
        return Redirect()->back()->withErrors("Thanks Benefit has been created successfully");
    }
    public function updateAccountTotal($id,Request $request){

    }
}
