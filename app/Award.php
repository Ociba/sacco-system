<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    //
    protected $table ="awards";
    protected $fillable =['title','year','award','image'];
}
