<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    //
    protected $fillable =['user_id','name','message','subject','attachment'];
}
