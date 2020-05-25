<?php

namespace App\Http\Controllers;

use App\Saving;
use App\User;
use App\Account;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavingController extends Controller
{
    public function getTotalSavings(){
        $get_total_amount =Saving::join('users','savings.user_id','users.id')
        ->where('user_id', Auth::user()->id)->sum('savings.saving');
        return $get_total_amount;
    }
    public function showSavingsForm(){
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.save-money',compact('display_mails_received_inbox'));
    }
    public function saveSavings(Request $request){
        Saving::create(array(
            'user_id'   =>Auth::user()->id,
            'saving' =>$request->saving,
            'date_of_saving' =>$request->date_of_saving
            
        ));
       
        return Redirect()->back()->withErrors("Saving details has been done successfully");
    }

    public function showSavings(){
        $display_my_savings = Saving::join('users','savings.user_id','users.id')
        ->where('savings.user_id',Auth::user()->id)
        ->select('users.name','savings.saving','savings.created_at','savings.date_of_saving')
        ->orderBy('savings.created_at','desc')
        ->paginate('10');
        $get_total_amount =Saving::join('users','savings.user_id','users.id')
        ->where('user_id', Auth::user()->id)->sum('savings.saving');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.saving-table', compact('display_my_savings','get_total_amount','display_mails_received_inbox'));
    }
    public function displayAllSavings(){
        $display_all_savings = Saving::join('users','savings.user_id','users.id')
        ->where('savings.status','active')
        ->orwhere('savings.status','deleted')
        ->orwhere('savings.status','suspended')
        ->select('users.name','savings.saving','savings.date_of_saving')
        ->orderBy('savings.created_at','desc')
        ->paginate('10');
        $get_all_total_amount =Saving::join('users','savings.user_id','users.id')
        ->where('savings.status','active')->sum('savings.saving');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.all-saving-table', compact('display_all_savings','get_all_total_amount','display_mails_received_inbox'));
    }
    public function searchSavings(Request $request){
        $display_all_savings=Saving::join('users','savings.user_id','users.id')
        ->where('savings.status','active')
        ->where('users.name',$request->name)
        ->orWhere('savings.date_of_saving',$request->name)
        ->orWhere('savings.saving',$request->name)
        ->orWhere('savings.created_at',$request->name)
        ->select('users.name','savings.saving','savings.date_of_saving','savings.created_at')
        ->paginate('10');
        $get_all_total_amount =Saving::join('users','savings.user_id','users.id')
        ->where('users.name',$request->name)->sum('savings.saving');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.all-saving-table', compact('display_all_savings','get_all_total_amount','display_mails_received_inbox'));
    }
    public function searchMySavings(Request $request){
        $display_my_savings=Saving::join('users','savings.user_id','users.id')
        ->join('accounts','savings.account_id','accounts.id')
        ->where('savings.user_id',Auth::user()->id)
        ->where('users.name',$request->date_of_saving)
        ->orWhere('accounts.account_number',$request->date_of_saving)
        ->orWhere('accounts.account_name',$request->date_of_saving)
        ->orWhere('savings.date_of_saving',$request->date_of_saving)
        ->orWhere('savings.saving',$request->date_of_saving)
        ->orWhere('savings.created_at',$request->date_of_saving)
        ->select('users.name','accounts.account_number','accounts.account_name','savings.saving','savings.date_of_saving','savings.created_at')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.saving-table', compact('display_my_savings','display_mails_received_inbox'));
    }
    public function updateSavings($id){
        Saving::where('id',$id)->update(array('status' => 'inactive'));
        return Redirect()->back()->withErrors("Savings status updated");
    }
    public function deleteSavings($id){
        Saving::where('id',$id)->update(array('status' => 'deleted'));
        return Redirect()->back()->withErrors("Saving details has been deleted successfully");
    }
    protected function ValidateSave(){
        return request()->validate([
            'user_id'   =>'required',
            'saving' =>'required',
            'date_of_saving' =>'required',
            'status' =>'required'

        ]);
    }
}
