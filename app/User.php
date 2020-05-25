<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Member_detail;
use App\Expemses;
use App\Benefit;
use App\Saving;
use App\Mail;
use App\Reply;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role_id', 'contact', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    public function getUsersRole(){
        $user_role = DB::table('users')->join('roles','users.role_id','roles.id')->where('users.id',Auth::user()->id)
        ->value('role');
        return $user_role;
    }
    public function getLoggedInUserLogo(){
        $user_logo = Member_detail::where('user_id', '=', $this->id)->value('avatar');
        if(empty($user_logo)){
            $user_logo = 'product-big-2.jpg';
        }
        return $user_logo;
        
}
public function getUserPermisions(){
    $empty_permissions_array = [];
    $permissions_array = DB::table('permission_roles')
    ->join('permissions','permissions.id','permission_roles.permission_id')
    ->where('role_id',Auth::user()->role_id)
    ->select('permissions.permission')->get();
    foreach(json_decode($permissions_array,true) as $permissions){
            array_push($empty_permissions_array,$permissions["permission"]);
    }
    return $empty_permissions_array;
}
public function displayMailBarMessage(){
    $display_mails_received_inbox = DB::table('mails')
    ->join('profiles','mails.profile_id','profiles.id')
    ->join('users','mails.user_id','users.id')
    ->where('mails.status','active')
    ->select('mails.message','mails.name','mails.created_at','profiles.image')->get();
    return $display_mails_received_inbox;
    }
public function addBenefit(){
    $show_benefit = DB::table('benefits')->sum('benefit');
    return $show_benefit;
}
public function calculateSharesForEachMember(){
    //counting number of members
    $members = Member_detail::join('users','users.id','members.user_id')
    ->where('members.status','active')->count();
    //Totalling all the benefits
    $all_benefits = DB::table('benefits')->sum('benefit');
    //Dividing per member
    $each_person = ($all_benefits/$members);
    return $each_person;
}
public function getNumberOfMembers(){
    $display_all_members_details = User::join('roles','users.role_id','roles.id')
        ->where('users.role_id',5)->count();
    return $display_all_members_details;
}
public function getNumberOfLoans(){
    $show_active_loans =loan::where('Loans.status','active')->count();
    return $show_active_loans;
}
public function getTotalExpensesAmount(){
    $total_amount_on_expenses =Expenses::where('status','active')->sum('amount');
    return $total_amount_on_expenses;
}
//Benefits Each Month
    public function getTotalBenefitPerMonth(){
        $months_array = [];
        $benefits = benefit::whereYear('created_at', date('Y'))
        ->select(DB::raw('MONTHNAME(created_at) month'))
        ->orderBy('month', 'Asc')
        ->groupBy('month')
        ->get();
        foreach($benefits as $benefit){
            array_push($months_array, $benefit->month);
        }
        $months_array = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        return $months_array;
    }
    //loans for the whole Year for every month
    public function getLoansBorrowedMonths(){
        $months_array = [];
        $loans = loan::whereYear('created_at', date('Y'))
        ->select(DB::raw('MONTHNAME(created_at) month'))
        ->orderBy('month', 'Asc')
        ->groupBy('month')
        ->get();
        foreach($loans as $loan){
            array_push($months_array, $loan->month);
        }
        $months_array = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        return $months_array;
    }

    public function getJanuaryLoans(){
        $count = loan::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"January")->get()->count();
        return $count;
    }
    public function getFebrauryLoans(){
        $count = loan::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"February")->get()->count();
        return $count;
    }
    public function getMarchLoans(){
        $count = loan::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"March")->get()->count();
        return $count;
    }
    public function getAprilLoans(){
        $count = loan::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"April")->get()->count();
        return $count;
    }
    public function getMayLoans(){
        $count = loan::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"May")->get()->count();
        return $count;
    }
    public function getJuneLoans(){
        $count = loan::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"June")->get()->count();
        return $count;
    }
    public function getJulyLoans(){
        $count = loan::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"July")->get()->count();
        return $count;
    }
    public function getAugustLoans(){
        $count = loan::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"August")->get()->count();
        return $count;
    }
    public function getSeptemberLoans(){
        $count = loan::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"September")->get()->count();
        return $count;
    }
    public function getOctoberLoans(){
        $count = loan::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"October")->get()->count();
        return $count;
    }
    public function getNovemberLoans(){
        $count = loan::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"November")->get()->count();
        return $count;
    }
    public function getDecemberLoans(){
        $count = loan::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"December")->get()->count();
        return $count;
    }

   //Benefits for whole Year

    public function getBenefitInJanuary(){
        $count = Benefit::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"January")
        ->where('status','allowed')
        ->get()->sum('benefit');
        return $count;
    }
    public function getBenefitInFebruary(){
        $count = Benefit::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"February")
        ->where('status','allowed')
        ->get()->sum('benefit');
        return $count;
    }
    public function getBenefitInMarch(){
        $count = Benefit::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"March")
        ->where('status','allowed')
        ->get()->sum('benefit');
        return $count;
    }
    public function getBenefitInApril(){
        $count = Benefit::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"April")
        ->where('status','allowed')
        ->get()->sum('benefit');
        return $count;
    }
    public function getBenefitInMay(){
        $count = Benefit::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"May")
        ->where('status','allowed')
        ->get()->sum('benefit');
        return $count;
    }
    public function getBenefitInJune(){
        $count = Benefit::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"June")
        ->where('status','allowed')
        ->get()->sum('benefit');
        return $count;
    }
    public function getBenefitInjuly(){
        $count = Benefit::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"July")
        ->where('status','allowed')
        ->get()->sum('benefit');
        return $count;
    }
    public function getBenefitInAugust(){
        $count = Benefit::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"August")
        ->where('status','allowed')
        ->get()->sum('benefit');
        return $count;
    }
    public function getBenefitInSeptember(){
        $count = Benefit::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"September")
        ->where('status','allowed')
        ->get()->sum('benefit');
        return $count;
    }
    public function getBenefitInOctober(){
        $count = Benefit::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"October")
        ->where('status','allowed')
        ->get()->sum('benefit');
        return $count;
    }
    public function getBenefitInNovember(){
        $count = Benefit::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"November")
        ->where('status','allowed')
        ->get()->sum('benefit');
        return $count;
    }
    public function getBenefitInDecember(){
        $count = Benefit::whereYear('created_at', date('Y'))->where(DB::raw("(MONTHNAME(created_at))"),"December")
        ->where('status','allowed')
        ->get()->sum('benefit');
        return $count;
    }

    //Pie Chart for Benefits,Savings,Expenses and Amount in the accounts Comparison
    public function getTotalBenefits(){
        $all_interest =Benefit::join('users','benefits.user_id','users.id')
        ->where('benefits.status','allowed')
         ->get()->sum('benefit');
        return $all_interest;
    }

    public function getTotalLoanAmountBorrowed(){
        $all_loans = loan::join('users','loans.user_id','users.id')
        ->where('loans.status','active')
         ->get()->sum('balance');
        return $all_loans;
    }
    public function getTotalExpenses(){
        $all_expenses =Expenses::join('users','expenses.user_id','users.id')
        ->where('expenses.status','active')
        ->get()->sum('amount');
        return $all_expenses;
    }
    public function getTotalAmountInSavingss(){
        $all_savings = Saving::join('users','savings.user_id','users.id')
        ->where('savings.status','active')->get()->sum('saving');
        return $all_savings;
    }
    public function getTotalMoneyInSavingsAccount(){

        $members = Member_detail::join('users','users.id','members.user_id')
        ->where('members.status','active')->count();
        //Totalling all the benefits
        $all_benefits = DB::table('benefits')->sum('benefit');
        //Dividing per member
        $each_person = ($all_benefits/$members);

        $all_savings = Saving::join('users','savings.user_id','users.id')
        ->where('user_id',Auth::user()->id)->get()->sum('saving');
        $total_amount =$each_person + $all_savings;
        return $total_amount;
    }
    //Comparing number of Sacco Staff And Register Members
    public function getStaffInSacco(){
        $all_sacco_staff_members=User::join('roles','users.role_id','roles.id')
        ->where('users.role_id',"!=","5")->count();
        return $all_sacco_staff_members;
    }
    public function getRegisteredSaccoMembers(){
        $all_members = User::join('roles','users.role_id','roles.id')
        ->where('users.role_id',5)->count();
        return $all_members;
    }
    public function displayRoleInSidebar(){ 
        $user_role = DB::table('users')->join('roles','users.role_id','roles.id')->where('users.id',Auth::user()->id)
        ->value('role');
        return $user_role;
    }
    public function addTotalInCart(){
        $all_total = Shop::where('status','active')->get()->sum('total');
        return $all_total;
    }
    public function countReceivedMails(){
        $all_received =Mail::where('status','received')->count();
        return $all_received;
    }
    public function countSentMails(){
        $all_received =Mail::where('status','sent')->count();
        return $all_received;
    }
    public function countDraftMails(){
        $all_received =Draft::where('status','active')->count();
        return $all_received;
    }
    public function countJunkMails(){
        $all_received =Mail::where('status','read')->count();
        return $all_received;
    }
    public function countTrashMails(){
        $all_received =Mail::where('status','deleted')->count();
        return $all_received;
    }
    public function countreplyMails(){
        $all_replies =Reply::where('status','active')->count();
        return $all_replies;
    }
}
