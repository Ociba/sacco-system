<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member_detail extends Model
{
    //
    protected $table ="members";
    protected $fillable =['id','user_id','town','county','residence','occupation','phone_number','account_number',
                        'account_name','date_of_joining','avatar','status','account_id'];
}
