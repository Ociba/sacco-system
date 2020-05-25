<?php

namespace App\Http\Controllers;

use App\Expenses;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    //
    public function displayExpensesForm(){
        if(in_array('Can add expenses', auth()->user()->getUserPermisions())){
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.create-expenses', compact('display_mails_received_inbox'));
        }else{
            abort(404);
        }
    }
    public function createExpenses(Expenses $expenses,Request $request){
        Expenses::create(array(
            'user_id'   =>Auth::user()->id,
            'date'  =>$request->date,
            'reason' =>$request->reason,
            'amount' =>$request->amount
        ));
        return Redirect()->back()->withErrors("Expenses was has been added successfully");
    }
    public function displayExpenses(){
        $display_all_expenses =Expenses::join('users','expenses.user_id','users.id')
        ->where('expenses.status','active')
        ->select('users.name','expenses.amount','expenses.date','expenses.reason')
        ->orderBy('expenses.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        if(in_array('Can view expenses', auth()->user()->getUserPermisions())){
        return view('after_login.expenses-table',compact('display_all_expenses','display_mails_received_inbox'));
      }else{
          return redirect()->back();
      }
    }
    public function searchExpenses(Request $request){
        $display_all_expenses =Expenses::join('users','expenses.user_id','users.id')
        ->where('expenses.status','active')
        ->orwhere('users.name',$request->reason)
        ->orwhere('expenses.amount',$request->reason)
        ->orwhere('expenses.date',$request->reason)
        ->orwhere('expenses.reason',$request->reason)
        ->orwhere('expenses.created_at',$request->reason)
        ->select('users.name','expenses.amount','expenses.date','expenses.reason','expenses.created_at')
        ->orderBy('expenses.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.expenses-table',compact('display_all_expenses','display_mails_received_inbox'));
    }
    public function editExpenses($id){
        Expenses::where('id',$id)->update(array(
            'amount' =>'250000',
            'reason'=>'Yaka'
        ));
        return Redirect()->back()->withErrors("Expenses was has been updated successfully");
    }
    public function deleteExpenses($id){
        Expenses::where('id',$id)->update(array( 'status' => 'done'));
        return Redirect()->back()->withErrors("Expenses has been deleted successfully");
    }
    protected function ValidateExpenses(){
        return request()->validate([
            'user_id'=>'required',
            'amount' =>'required',
            'reason' =>'required',
            'date'  =>'required',
            'status' =>'required'
          ]);
    }
}
