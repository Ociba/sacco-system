<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(in_array('Can view dashboard', auth()->user()->getUserPermisions())){
     $display_mails_received_inbox = Mail::where('status','active');
     return view('after_login.dashboard',compact('display_mails_received_inbox'));
        }
        else{
            return redirect('/all_users');
        }
    }
}
