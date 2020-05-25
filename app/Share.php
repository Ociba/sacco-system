<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    //
    protected $table="shares";
    protected $fillable =['user_id','share'];
}
