<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    //
    protected $fillable =['name','subject','message','attachment','user_id'];
}
