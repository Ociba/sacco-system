<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    //
    protected $fillable =['user_id','name','date_of_issuing','amount','balance','repayment_amount'];
}
