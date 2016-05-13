<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class JobController extends Controller {

    function getIndex() {
        $jobs = \App\Job::orderBy('updated_at','desc')->get();
        $sub_title = 'All Jobs';

        return view('jobs.index')->with([
            'jobs' => $jobs,
            'this' => $sub_title
        ]);
    }

    public function getShow($id = null) {
        #return 'Show me an individual job: '.$id;
        $job = \App\Job::find($id);
        $location = \App\Location::find($job->location_id);

        return view('jobs.show',[
            'job' => $job,
            'location' => $location,
            'id' => $id
        ]);
    }

    public function getShowTag($id = null) {
        #return 'Show me an individual job: '.$id;
        $jobs = \App\Tag::find($id)->jobs()->get();
        $tag_in_focus = \App\Tag::find($id);
        $sub_title = $tag_in_focus->name.' Jobs';

        return view('jobs.index')->with([
            'jobs' => $jobs,
            'this' => $sub_title
        ]);
    }

    public function getShowLocation($id = null) {
        #return 'Show me an individual job: '.$id;
        $jobs = \App\Job::where('location_id','=',$id)
            ->orderBy('updated_at','desc')
            ->get();
        $location_in_focus = \App\Location::find($id);
        $sub_title = $location_in_focus->name.' Jobs';

        return view('jobs.index')->with([
            'jobs' => $jobs,
            'this' => $sub_title
        ]);
    }

    public function getCreate() {
        $recruiters_for_dropdown = \App\Recruiter::recruitersForDropdown();
        $jobtypes_for_dropdown = \App\JobType::jobtypesForDropdown();
        $locations_for_dropdown = \App\Location::locationsForDropdown();
        $tags_for_checkboxes = \App\Tag::getTagsForCheckboxes();

        return view('jobs.create')->with([
            'recruiters_for_dropdown' => $recruiters_for_dropdown,
            'jobtypes_for_dropdown' => $jobtypes_for_dropdown,
            'locations_for_dropdown' => $locations_for_dropdown,
            'tags_for_checkboxes' => $tags_for_checkboxes
        ]);    
    }

    public function postCreate(Request $request) {
        $this->validate($request,[
            'title'=>'required|min:3',
            'recruiter_id' => 'not_in:0',
            'job_type_id' => 'not_in:0',
            'location_id' => 'not_in:0',
            'description'=>'required'
        ]);

        $job = new \App\Job();
        $job->expired_at = \Carbon\Carbon::now()->addMonths(1);
        $job->title = $request->title;
        $job->recruiter_id = $request->recruiter_id;
        $job->job_type_id = $request->job_type_id;
        $job->location_id = $request->location_id;
        $job->description = $request->description;
        $job->author_id = $request->author_id;
        $job->save();

        \Session::flash('message',$job->title.' has been added.');

        # Save Tags
        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }

        $job->tags()->sync($tags);
        $job->save();

        return redirect('/');
    }

    public function getEdit($id = null) {
        $job = \App\Job::find($id);
        $recruiters_for_dropdown = \App\Recruiter::recruitersForDropdown();
        $jobtypes_for_dropdown = \App\JobType::jobtypesForDropdown();
        $locations_for_dropdown = \App\Location::locationsForDropdown();
        $tags_for_checkboxes = \App\Tag::getTagsForCheckboxes();
        $tags_for_this_job = [];
        foreach($job->tags as $tag) {
            $tags_for_this_job[] = $tag->name;
        }

        return view('jobs.edit',[
            'recruiters_for_dropdown' => $recruiters_for_dropdown,
            'jobtypes_for_dropdown' => $jobtypes_for_dropdown,
            'locations_for_dropdown' => $locations_for_dropdown,
            'tags_for_checkboxes' => $tags_for_checkboxes,
            'tags_for_this_job' => $tags_for_this_job,
            'job' => $job,
            'id' => $id
        ]);
    }

    public function postEdit(Request $request) {
        $this->validate($request,[
            'title'=>'required|min:3',
            'recruiter_id' => 'not_in:0',
            'job_type_id' => 'not_in:0',
            'location_id' => 'not_in:0',
            'description'=>'required'
        ]);

        $job = \App\Job::find($request->id);
        $job->title = $request->title;
        $job->recruiter_id = $request->recruiter_id;
        $job->job_type_id = $request->job_type_id;
        $job->location_id = $request->location_id;
        $job->description = $request->description;
        $job->save();

        \Session::flash('message',$job->title.' has been edited.');

        $location = \App\Location::find($job->location_id);

        # Save Tags
        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }

        $job->tags()->sync($tags);
        $job->save();

        return view('jobs.show',[
            'job' => $job,
            'location' => $location,
            'id' => $request->id
        ]);

        echo $request->id;
    }

    public function getDelete($id = null) {
        $job = \App\Job::find($id);

        if($job->tags()) {
            $job->tags()->detach();
        }

        $job->delete();

        \Session::flash('message',$job->title.' has been deleted.');
        return redirect('/');
    }

    public function getApply($id = null) {
        $user = \Auth::user();
        $candidates = \App\Candidate::where('user_id','=',$user->id)->orderBy('updated_at','desc')->get();

        return view('jobs.apply')->with([
            'id' => $id,
            'candidates' => $candidates
        ]);    
    }

    public function postApply(Request $request) {
        $user = \Auth::user();
        $candidate = \App\Candidate::where('user_id','=',$user->id)->first();

        $storagePath  = \Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        $pathToFile = $storagePath.$candidate->resume;
        
        $headers = array(
              'Content-Type: application/pdf',
            );
        return \Response::download($pathToFile, 'Resume.pdf', $headers);

    }

    public function getApplication($id = null) {
        $user = \Auth::user();
        if(!$user) return redirect()->guest('login');
        $job = \App\Job::find($id);
        $location = \App\Location::find($job->location_id);
        $candidate = \App\Candidate::where('user_id','=',$user->id)->first();
        //$pathToFile = 'C:/xampp/htdocs/p4/storage/app/'.$candidate->resume.'.pdf';
        //$file = \Storage::disk('local')->get($candidate->resume);
        //$extension = \File::extension($file);
        //echo $extension;
        //$storagePath  = \Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        //$storagePath = \Config::get('app.url').'/storage/app/';
        //$storagePath = \Config::get('app.storage_url');
        //$storagePath = public_path();
        //$storagePath = '128.199.155.224/storage/app/';
        //$pathToFile = $storagePath.$candidate->resume;

        //$pathToFile = Input::file('$candidate->resume')
        //dump($pathToFile);

        $data = array(
            'user' => $user,
            'job' => $job//,
            //'pathToFile' => $pathToFile
        );

        \Mail::send('jobs.application', $data, function($message) use ($user,$job) { //,$pathToFile) {
            $recipient_email = $user->email;
            $recipient_name  = $user->name;
            $subject = 'You have applied for '.$job->title.' in FinJob';
            $message
                ->to($recipient_email, $recipient_name)
                //->attach($pathToFile)
                ->subject($subject);
        });

        $exist = \DB::table('job_user')
            ->where('user_id','=',$user->id)
            ->where('job_id','=',$job->id)
            ->get();

        if(!$exist){
            \DB::table('job_user')->insert([
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'user_id' => $user->id,
                'job_id' => $job->id,
                'applied' => 1
            ]);
        }            
        else{
            \DB::table('job_user')
            ->where('user_id','=',$user->id)
            ->where('job_id','=',$job->id)
            ->update([
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'applied' => 1
            ]);
        }

        \Session::flash('message', 'You have applied for '.$job->title);

        $jobs = \App\User::find($user->id)
            ->jobs()
            ->where('applied','=', 1)
            ->orderBy('updated_at','desc')
            ->get();
        $sub_title = 'Applied Jobs';

        return view('jobs.index')->with([
            'jobs' => $jobs,
            'this' => $sub_title
        ]);
    }

    public function getAppliedJob($id = null) {
        $user = \App\User::find($id);
        if(!$user) return redirect()->guest('login');
        $jobs = \App\User::find($id)
            ->jobs()
            ->where('applied','=', 1)
            ->orderBy('updated_at','desc')
            ->get();
        $sub_title = 'Applied Jobs';

        return view('jobs.index')->with([
            'jobs' => $jobs,
            'this' => $sub_title
        ]);
    }

    public function getSave($id = null) {
        $user = \Auth::user();
        if(!$user) return redirect()->guest('login');
        $job = \App\Job::find($id);
        $location = \App\Location::find($job->location_id);

        $exist = \DB::table('job_user')
            ->where('user_id','=',$user->id)
            ->where('job_id','=',$job->id)
            ->get();

        if(!$exist){
            \DB::table('job_user')->insert([
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'user_id' => $user->id,
                'job_id' => $job->id,
                'saved' => 1
            ]);
        }            
        else{
            \DB::table('job_user')
            ->where('user_id','=',$user->id)
            ->where('job_id','=',$job->id)
            ->update([
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'saved' => 1
            ]);
        }

        \Session::flash('message', 'You have saved '.$job->title);

        $jobs = \App\User::find($user->id)->jobs()->where('saved','=', 1)->get();

        return view('jobs.saved_job')->with([
            'jobs' => $jobs
        ]);
    }

    public function getUnSave($id = null) {
        $user = \Auth::user();
        if(!$user) return redirect()->guest('login');
        $job = \App\Job::find($id);
        $location = \App\Location::find($job->location_id);

        \DB::table('job_user')
        ->where('user_id','=',$user->id)
        ->where('job_id','=',$job->id)
        ->update([
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'saved' => 0
        ]);

        \Session::flash('message', 'You have unsaved '.$job->title);

        $jobs = \App\User::find($user->id)->jobs()->where('saved','=', 1)->get();

        return view('jobs.saved_job')->with([
            'jobs' => $jobs
        ]);
    }

    public function getSavedJob($id = null) {
        $user = \App\User::find($id);
        if(!$user) return redirect()->guest('login');
        $jobs = \App\User::find($id)
            ->jobs()
            ->where('saved','=', 1)
            ->orderBy('updated_at','desc')
            ->get();

        return view('jobs.saved_job')->with([
            'jobs' => $jobs
        ]);
    }

    public function getViewedJob($id = null) {
        $user = \App\User::find($id);
        if(!$user) return redirect()->guest('login');
         
        $jobs = \App\User::find($id)->jobs()->where('viewed','=', 1)->get();

        $tags = \App\Tag::all();

        return view('jobs.index')->with([
            'jobs' => $jobs,
            'tags' => $tags
        ]);
    }

}