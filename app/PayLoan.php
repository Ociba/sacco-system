<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayLoan extends Model
{
    //
    protected $table ="pay_loans";
    protected $fillable =['user_id','repayment_amount'];
}
