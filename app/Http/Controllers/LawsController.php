<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LawsController extends Controller
{
    //
    public function displayLaws(){
        return view('front.laws');
    }
}
