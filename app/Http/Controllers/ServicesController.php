<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Testimony;

class ServicesController extends Controller
{
    //
    public function displayAccount(){
        return view('front.accounts');
    }
    public function displayLoans(){
        return view('front.loans');
    }
    public function displayBenefits(){
        return view('front.benefits');
    }
    public function displayBusinessPlanning(){
        return view('front.business-planning');
    }
    public function displayRiskManagement(){
        return view('front.risk-management');
    }
    public function displaySaving(){
        return view('front.saving');
    }
    public function displayServices(){
        $display_testimony =Testimony::where('status','active')->get();
        return view('front.services',compact('display_testimony'));
    }
}
