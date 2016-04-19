<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class CandidateController extends Controller {

    public function getShow($id = null) {
        #return 'Show me an individual job: '.$id;
        return view('candidates.show')->with('id', $id);
    }

    public function getCreate() {
        return view('candidates.create');    
    }

    public function postCreate(Request $request) {
        $this->validate($request,[
            'title'=>'required|min:3',
            'author'=>'required|min:3'
        ]);

        return 'Add a candidate profile: '.$request->input('title');
        #return redirect('/books');
    }

    public function getEdit($id = null) {
        return view('candidates.edit')->with('id',$id);    
    }

    public function postEdit(Request $request) {
        $this->validate($request,[
            'title'=>'required|min:3',
            'author'=>'required|min:3'
        ]);

        return 'Candidate profile edited: '.$request->input('title').' by '.$request->input('author');
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
