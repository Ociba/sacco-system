<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use DB;

class ProjectController extends Controller
{
    //
    public function displayProjects(){
        $display_mails_received_inbox = DB::table('mails')
        ->join('users','mails.user_id','users.id')
        ->where('mails.status','active')
        ->select('mails.message','mails.name','mails.created_at')->get();
        return view('front.projects',compact('display_mails_received_inbox'));
    }

    public function createProject(Request $request){
        if(empty($request->project_title)){
            return Redirect()->back()->withInput()->withErrors("Project was created successfully");
        }
        if($request->hasFile('image')) {

            $files = $request->file('image');
            $extension = $files->getClientOriginalExtension();
            $file_name = $files->getClientOriginalName();
            $folderpath =public_path().'/images/profile_pictures/';
            $files->move($folderpath, $file_name);

            Project::create(array(
                'user_id'=>Auth::user()->id,
                'project_title'=>$request->project_title,
                'image'=>$file_name
            ));
            return Redirect()->back()->withError("You have add Item to the Cart Successfully");
        }
        else {
            return Redirect()->back()->withErrors("Error, seems like the file wasn't uploaded");
    }
}
public function displayProjectForm(){
    $display_mails_received_inbox = DB::table('mails')
    ->join('users','mails.user_id','users.id')
    ->where('mails.status','active')
    ->select('mails.message','mails.name','mails.created_at')->get();
    return view('after_login.add-project', compact('display_mails_received_inbox'));
}
public function displayProjectsOnDashbord(){
    $display_all_projects =Project::join('users','projects.user_id','users.id')
    ->where('projects.status','active')
    ->select('projects.project_title','projects.image','users.name')
    ->paginate('10');
    $display_mails_received_inbox = DB::table('mails')
    ->join('users','mails.user_id','users.id')
    ->where('mails.status','active')
    ->select('mails.message','mails.name','mails.created_at')->get();
    return view('after_login.project-table',compact('display_all_projects','display_mails_received_inbox'));
}
public function displayProjectsOnHome(){
    $display_all_projects =Project::join('users','projects.user_id','users.id')
    ->where('projects.status','active')
    ->select('projects.project_title','projects.image')
    ->get();
    $display_mails_received_inbox = DB::table('mails')
    ->join('users','mails.user_id','users.id')
    ->where('mails.status','active')
    ->select('mails.message','mails.name','mails.created_at')->get();
    return view('after_login.project-table',compact('display_all_projects','display_mails_received_inbox'));
}
}
