@extends('master')

@section('title')
    Delete job
@stop

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('main')

    <h1>Delete job</h1>

    <form method='POST' action='/jobs/delete/{id?}'>

        {{ csrf_field() }}

        <div class='form-group'>
           	<label>* Title:</label>
           	<input type='text' id='title' name='title' value='{{ old('title') }}'>
           	<div class='error'>
           		{{ $errors->first('title') }}
           	</div>
        </div>

        <div class='form-group'>
           	<label>* Author:</label>
           	<input type='text' id='author' name='author'value='{{ old('author') }}'>
           	<div class='error'>
           		{{ $errors->first('author') }}
           	</div>
        </div>

        <button type="submit" class="btn btn-primary">Delete Job</button>

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