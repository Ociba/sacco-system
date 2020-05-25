<?php

namespace App\Http\Controllers;

use App\loan;
use App\PayLoan;
use App\Benefit;
use App\LoanPayment;
use App\User;
use App\Saving;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    //
    public function payLoanForm($id){
        $edit_loan_details =loan::where('id',$id)->get();
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.pay-loan-form',compact('edit_loan_details','display_mails_received_inbox'));
    }
    public function displayLoanForm(){
        $display_users_name =User::select("name","id")->get();
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.create-loan',compact('display_users_name','display_mails_received_inbox'));
    }
    public function createLoan(Request $request){
        if(loan::where('balance', $request->balance != 0)->exists())
        {
            return Redirect()->back()->withInput()->withErrors('You still have unpaid Loan');

        }
        $total_saving = Saving::join('users','savings.user_id','users.id')
        ->where('savings.user_id',$request->name)->sum('savings.saving');
        $loan = ($total_saving * 0.5);
        $loan_amount =$request->amount;
        $interest = $loan_amount * 0.2;
        $loan_balance = $interest + $loan_amount;
        if($loan_amount <= $loan){
                loan::create(array(
                    'user_id'   =>$request->name,
                    'date_of_issuing'  =>$request->date_of_issuing,
                    'amount' =>$loan_amount,
                    'balance'=>$loan_balance
                ));

        return Redirect()->back()->withErrors("Thanks Loan has been created successfully");
        }else{
            return redirect()->back()->withErrors("You have Insufficient Account Balance");
        }
    }
    public function updateLoanInformation($id, Request $request){
        $balance_from_db = loan::where('id',$id)
        ->select('loans.balance', 'loans.amount')
        ->first();

        $paid = loan::where('id',$id)
        ->select('loans.repayment_amount')
        ->first();

        $balance;
        $loan_id = $id;

        if($balance_from_db->balance > 0) {
            $balance= $balance_from_db->balance - $request->repayment_amount;  
        }
        else {
            $balance= $balance_from_db->amount - $request->repayment_amount;
        }
        
        loan::where('id',$id)->update(array(
            'repayment_amount'=>$request->repayment_amount,
            'balance'=>$balance
        ));

        $balance_from_database = loan::where('id',$id)
        ->select('loans.balance', 'loans.amount')
        ->first();

        

        if($balance_from_database->balance == 0) {
            $benefits = $balance_from_database->amount * 0.2;

            Benefit::create(array(
                'user_id'   =>Auth::user()->id,
                'benefit'  =>$benefits
            ));

            loan::where('id',$id)->update(array('status'=>'cleared'));
        }
        LoanPayment::create(array(
            'user_id'=>Auth::user()->id,
            'repayment_amount'=>$request->repayment_amount
        ));

        return redirect('/loan-active')->withErrors("Loan Details have been updated successfully");
    }
    public function displayLoanDetails(){
        $display_active_loan =loan::join('users','loans.user_id','users.id')
        ->where('loans.user_id',Auth::user()->id)
        ->select('loans.id','users.name','loans.date_of_issuing','loans.amount','loans.repayment_amount','loans.created_at','loans.balance')
        ->orderBy('loans.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.active-loan', compact('display_active_loan','display_mails_received_inbox'));
    }
    public function displayAllLoans(){
        $display_all_loan =loan::join('users','loans.user_id','users.id')
        ->where('loans.status','active')
        ->orwhere('loans.status','cleared')
        ->select('users.name','loans.id','loans.date_of_issuing','loans.amount','loans.repayment_amount','loans.created_at','loans.balance')
        ->orderBy('loans.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.all-loan', compact('display_all_loan','display_mails_received_inbox'));
    }
    public function searchActiveLoan(Request $request){
        $display_all_loan=loan::join('users','loans.user_id','users.id')
        ->join('accounts','loans.account_id','accounts.id')
        ->where('loans.status','active')
        ->where('users.name',$request->name)
        ->orWhere('loans.date_of_issuing',$request->name)
        ->orWhere('loans.amount',$request->name)
        ->orWhere('loans.repayment_amount',$request->name)
        ->orWhere('loans.created_at',$request->name)
        ->orWhere('loans.balance',$request->name)
        ->select('users.name','loans.id',
        'loans.date_of_issuing','loans.amount','loans.repayment_amount','loans.created_at','loans.balance')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.all-loan', compact('display_all_loan','display_mails_received_inbox'));
    }
    public function displayLoanCleared(){
        $display_cleared_loan =loan::join('users','loans.user_id','users.id')
        ->where('loans.status','cleared')
        ->select('users.name','loans.date_of_issuing','loans.amount'
        ,'loans.repayment_amount','loans.created_at','loans.balance')
        ->orderBy('loans.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.cleared-loan', compact('display_cleared_loan','display_mails_received_inbox'));
    }
    public function updateLoan($id){
        loan::where('id',$id)->update(array('status'=>'cleared'));
        return Redirect()->back()->withErrors("Loan details has been deleted successfully");
    }
    public function displayLoanPayments(){
        $show_loan_payments_details =LoanPayment::join('users','loan_payments.user_id','users.id')
        ->where('loan_payments.user_id',Auth::user()->id)
        ->select('loan_payments.id','loan_payments.repayment_amount','users.name','loan_payments.created_at')
        ->orderBy('loan_payments.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.loan_payment', compact('show_loan_payments_details','display_mails_received_inbox'));
    }
    public function displayAllLoanPayments(){
        $show_all_loan_payments =LoanPayment::join('users','loan_payments.user_id','users.id')
        ->where('loan_payments.status','active')
        ->select('loan_payments.id','loan_payments.repayment_amount','users.name','loan_payments.created_at')
        ->orderBy('loan_payments.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.all-loan-payment', compact('show_all_loan_payments','display_mails_received_inbox'));
    }
    public function searchLoanPayments(Request $request){
        $show_all_loan_payments =LoanPayment::join('users','loan_payments.user_id','users.id')
        ->where('loan_payments.status','active')
        ->where('users.name',$request->name)
        ->orwhere('loan_payments.repayment_amount',$request->name)
        ->orwhere('loan_payments.created_at',$request->name)
        ->select('loan_payments.id','loan_payments.repayment_amount','users.name','loan_payments.created_at')
        ->orderBy('loan_payments.created_at','desc')
        ->paginate('10');
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.all-loan-payment', compact('show_all_loan_payments','display_mails_received_inbox'));
    }
    protected function ValidateLoan(){
        return request()->validate([
            'user_id'=>'required',
            'date_of_issuing' =>'required',
            'amount' =>'required',
            'status' =>'required'
        ]);
    }
}
