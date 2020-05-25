<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable =['mail_id','reply','profile_id','user_id'];
}
