<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class RecruiterController extends Controller {

    public function getShow($id = null) {
        #return 'Show me an individual recruiter: '.$id;
        return view('recruiters.show')->with('id', $id);
    }

    public function getCreate() {
        return view('recruiters.create');    
    }

    public function postCreate(Request $request) {
        $this->validate($request,[
            'title'=>'required|min:3',
            'author'=>'required|min:3'
        ]);

        return 'Recruiter added: '.$request->input('title');
    }

    public function getEdit($id = null) {
        return view('recruiters.edit')->with('id',$id);    
    }

    public function postEdit(Request $request) {
        $this->validate($request,[
            'title'=>'required|min:3',
            'author'=>'required|min:3'
        ]);

        return 'Recruiter edited: '.$request->input('title').' by '.$request->input('author');
        #return redirect('/jobs/edit/{$id}');
    }

    public function getDelete($id = null) {
        return view('recruiters.delete')->with('id',$id);    
    }

    public function postDelete(Request $request) {
        $this->validate($request,[
            'title'=>'required|min:3',
            'author'=>'required|min:3'
        ]);

        return 'Recruiter deleted: '.$request->input('title').' by '.$request->input('author');
        #return redirect('/jobs/edit/{$id}');
    }

}
