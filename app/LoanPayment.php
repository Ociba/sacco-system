<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanPayment extends Model
{
    //
    protected $table ="loan_payments";
    protected $fillable =['user_id','account_id','repayment_amount'];
}
