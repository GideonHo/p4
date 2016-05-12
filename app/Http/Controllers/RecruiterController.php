<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class RecruiterController extends Controller {

    function getIndex() {
        $recruiters = \App\Recruiter::orderBy('name','asc')->get();
        $tags = \App\Tag::all();
        return view('recruiters.index')->with([
            'recruiters' => $recruiters,
            'tags' => $tags
        ]);
    }

    public function getShow($id = null) {
        $recruiter = \App\Recruiter::find($id);
        return view('recruiters.show',[
            'recruiter' => $recruiter,
            'id' => $id
        ]);
    }

    public function getCreate() {
        return view('recruiters.create');    
    }

    public function postCreate(Request $request) {
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'website'=>'required',
            'logo'=>'required'
        ]);

        $recruiter = new \App\Recruiter();
        $recruiter->name = $request->input('name');
        $recruiter->address = $request->input('address');
        $recruiter->email = $request->input('email');
        $recruiter->website = $request->input('website');
        $recruiter->logo = $request->input('logo');
        $recruiter->save();

        \Session::flash('message',$recruiter->name.' has been added.');

        $id = $recruiter->id;

        return view('recruiters.show',[
            'recruiter' => $recruiter,
            'id' => $id
        ]);
    }

    public function getEdit($id = null) {
        $recruiter = \App\Recruiter::find($id);

        return view('recruiters.edit',[
            'recruiter' => $recruiter
        ]);
    }

    public function postEdit(Request $request) {
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'website'=>'required',
            'logo'=>'required'
        ]);

        //echo $request->input('name');

        $recruiter = \App\Recruiter::find($request->input('id'));
        $recruiter->name = $request->input('name');
        $recruiter->address = $request->input('address');
        $recruiter->email = $request->input('email');
        $recruiter->website = $request->input('website');
        $recruiter->logo = $request->input('logo');
        $recruiter->save();

        \Session::flash('message',$recruiter->name.' has been edited.');

        return view('recruiters.show',[
            'recruiter' => $recruiter,
            'id' => $request->input('id')
        ]);

        #return 'Recruiter edited: '.$request->input('title').' by '.$request->input('author');
        #return redirect('/jobs/edit/{$id}');
    }

    public function getDelete($id = null) {
        $recruiter = \App\Recruiter::find($id);
        \Session::flash('message',$recruiter->name.' has been deleted.');
        $recruiter->delete();
        return redirect('/recruiters/show');
    }

}
