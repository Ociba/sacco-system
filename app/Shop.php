<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected $table="carts";
    protected $fillable =['product','price','quqntity','total','image'];
}
