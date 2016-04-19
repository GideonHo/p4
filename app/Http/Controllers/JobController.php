<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class JobController extends Controller {

    public function getShow($id = null) {
        #return 'Show me an individual job: '.$id;
        return view('jobs.show')->with('id', $id);
    }

    public function getCreate() {
        return view('jobs.create');    
    }

    public function postCreate(Request $request) {
        $this->validate($request,[
            'title'=>'required|min:3',
            'author'=>'required|min:3'
        ]);

        return 'Add a Job: '.$request->input('title');
        #return redirect('/books');
    }

    public function getEdit($id = null) {
        return view('jobs.edit')->with('id',$id);    
    }

    public function postEdit(Request $request) {
        $this->validate($request,[
            'title'=>'required|min:3',
            'author'=>'required|min:3'
        ]);

        return 'Job edited: '.$request->input('title').' by '.$request->input('author');
        #return redirect('/jobs/edit/{$id}');
    }

    public function getDelete($id = null) {
        return view('jobs.delete')->with('id',$id);    
    }

    public function postDelete(Request $request) {
        $this->validate($request,[
            'title'=>'required|min:3',
            'author'=>'required|min:3'
        ]);

        return 'Job deleted: '.$request->input('title').' by '.$request->input('author');
        #return redirect('/jobs/edit/{$id}');
    }

}
