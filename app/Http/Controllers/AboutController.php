<?php

namespace App\Http\Controllers;
use App\History;
use App\Award;
use App\Testimony;
use App\Profile;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    //
    public function addHistoryForm(){
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('after_login.add-history', compact('display_mails_received_inbox'));
    }
    public function displayOurHistory(){
        $display_history_details =History::join('users','histories.user_id','users.id')
        ->where('histories.status','active')->get();
        return view('front.history', compact('display_history_details'));
    }
    public function displayOurCompany(){
        return view('front.about-us');
    }
    public function dispayCareer(){
        return view('front.career');
    }
    public function displayHonorAward(){
        $display_testimony =Testimony::where('status','active')->get();
        $shows_awards_details =Award::where('status','active')->get();
        return view('front.award', compact('shows_awards_details','display_testimony'));
    }
    public function displayOurTeam(){
        $display_testimony =Testimony::where('status','active')->get();
        $shows_profile_details =Profile::join('users','profiles.user_id','users.id')
        ->join('roles','profiles.role_id','roles.id')
        ->where('profiles.status','active')
        ->select('profiles.image','profiles.work','profiles.id','users.name','roles.role')
        ->get();
        return view('front.team',compact('display_testimony','shows_profile_details'));
    }
    public function displayFaq(){
        return view('front.faq');
    }
    public function createHistory(Request $request){
        if($request->hasFile('image')) {

            $files = $request->file('image');
            $extension = $files->getClientOriginalExtension();
            $file_name = $files->getClientOriginalName();
            $folderpath =public_path().'/images/profile_pictures/';
            $files->move($folderpath, $file_name);

        History::create(array(
            'user_id'=>Auth::user()->id,
            'year'=>$request->year,
            'statement'=>$request->statement,
            'image'=>$file_name
        ));
        return Redirect()->back()->withErrors("History details has been created successfully");
    }
    else {
        return Redirect()->back()->withErrors("Error, seems like the file wasn't uploaded");
    }
}
public function displayHistory(){
    $display_history=History::join('users','histories.user_id','users.id')
    ->where('histories.status','active')
    ->select('histories.image','histories.statement','histories.year')
    ->paginate('10');
    $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
    return view('after_login.history-table',compact('display_history','display_mails_received_inbox'));
}
public function deleteHistory($id){
    History::where('id',$id)->update(array('status'=>'deleted'));
    return Redirect()->back()->withErrors('History has been deleted successfully');
}
public function addAwardsForm(){
    $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
    return view('after_login.awards-form','display_mails_received_inbox');
}
public function createAwards(Request $request){
    if($request->hasFile('image')) {

        $files = $request->file('image');
        $extension = $files->getClientOriginalExtension();
        $file_name = $files->getClientOriginalName();
        $folderpath =public_path().'/images/profile_pictures/';
        $files->move($folderpath, $file_name);

    Award::create(array(
        'title'=>$request->title,
        'year'=>$request->year,
        'award'=>$request->award,
        'image'=>$file_name
    ));
    return Redirect()->back()->withErrors("History details has been created successfully");
}
else {
    return Redirect()->back()->withErrors("Error, seems like the file wasn't uploaded");
} 
}
public function displayAwrds(){
    $display_awards_inside =Award::where('status','active')
    ->paginate('10');
    $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
     return view('after_login.award-table', compact('display_awards_inside','display_mails_received_inbox'));
}
public function editAwardForm($id){
    $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
    $edit_awards_details =Award::where('id',$id)->get();
    return view('after_login.edit-award',compact('edit_awards_details','display_mails_received_inbox'));
}
public function updateAwardsInformation($id, Request $request){
    Award::where('id',$id)->update(array(
        'title'=>$request->title,
        'year'=>$request->year,
        'award'=>$request->award,
        'image'=>$request->image
    ));
    return Redirect()->back()->withErrors("You have successfully upadated award(s)");
}
public function deleteAward($id){
    Award::where('id',$id)->update(array('status'=>'deleted'));
}
}
