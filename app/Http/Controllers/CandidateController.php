<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class CandidateController extends Controller {

    public function getShow($id = null) {
        $candidates = \App\Candidate::where('user_id','=',$id)->orderBy('updated_at','desc')->get();

        return view('candidates.show')->with([
            'id' => $id,
            'candidates' => $candidates
        ]);     
    }

    public function getCreate() {
        return view('candidates.create');    
    }

    public function postCreate(Request $request) {
        $this->validate($request,[
            'resume'=>'required'
        ]);

        \Storage::disk('local')->put($request->resume, 'Resume');

        $user = \Auth::user();
        $candidate = new \App\Candidate();
        $candidate->user_id = $user->id;
        $candidate->resume = $request->resume;
        $candidate->save();
        \Session::flash('message',$candidate->resume.' has been added.');

        $candidates = \App\Candidate::where('user_id','=',$user->id)->orderBy('updated_at','desc')->get();

        return redirect('/candidates/edit/'.$user->id)->with([
            'id' => $user->id,
            'candidates' => $candidates
        ]);

    }

    public function getEdit($id = null) {
        $candidates = \App\Candidate::where('user_id','=',$id)->orderBy('updated_at','desc')->get();

        return view('candidates.edit')->with([
            'id' => $id,
            'candidates' => $candidates
        ]);    
    }

    public function postEdit(Request $request) {
        $this->validate($request,[
            'resume'=>'required'
        ]);

        $candidate = \App\Candidate::find($request->resume);
        \Storage::disk('local')->delete($candidate->resume);
        $candidate->delete();
        \Session::flash('message',$candidate->resume.' has been removed.');

        $user = \Auth::user();
        $candidates = \App\Candidate::where('user_id','=',$user->id)->orderBy('updated_at','desc')->get();
        return redirect('/candidates/edit/'.$user->id)->with([
            'id' => $user->id,
            'candidates' => $candidates
        ]);

        //return 'Candidate profile edited: '.$request->input('name').' by '.$request->input('author');
        #return redirect('/jobs/edit/{$id}');
    }

    public function getDelete($id = null) {
        return view('candidates.delete')->with('id',$id);    
    }

    public function postDelete(Request $request) {
        $this->validate($request,[
            'title'=>'required|min:3',
            'author'=>'required|min:3'
        ]);

        return 'Candidate profile deleted: '.$request->input('title').' by '.$request->input('author');
        #return redirect('/jobs/edit/{$id}');
    }

}
