<html lang="en">

@extends('master')

@section('title')
    Add a new candidate profile
@stop

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('main')

    <h1>Add a new candidate profile</h1><br>

    <form method='POST' action='/candidates/create'>

        {{ csrf_field() }}
        
        <!--<div class='form-group'>
            <label>Name:</label>
            {{ $user->name }}
            <div class='error'>
              {{ $errors->first('title') }}
            </div>
        </div>-->

        <div class='form-group'>
            <label>* Resume:</label>
            <input type='file' id='resume' name='resume' value=' ' class="form-control">
            <div class='error'>
              {{ $errors->first('resume') }}
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add Resume</button>

		{{--<ul class=''>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>--}}

		<div class='error'>
			@if(count($errors)>0)
				Please corect the error above and re-submit.
			@endif
		</div>

    </form>
@stop