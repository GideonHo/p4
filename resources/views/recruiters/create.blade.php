@extends('master')

@section('title')
    Add a new recruiter
@stop

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('main')

    <h1 style='margin-bottom: 1em;'>Add Recruiter profile</h1>

    <form method='POST' action='/recruiters/create'>

        {{ csrf_field() }}

        <div class='form-group'>
           	<label>* Company Name:</label>
           	<input type='text' id='name' name='name' value='{{ old('name') }}' class="form-control">
           	<div class='error'>
           		{{ $errors->first('name') }}
           	</div>
        </div>

        <div class='form-group'>
           	<label>* Address:</label>
           	<input type='text' id='address' name='address' value='{{ old('address') }}' class="form-control">
           	<div class='error'>
           		{{ $errors->first('address') }}
           	</div>
        </div>

        <div class='form-group'>
            <label>* Email:</label>
            <input type='text' id='email' name='email' value='{{ old('email') }}' class="form-control">
            <div class='error'>
              {{ $errors->first('email') }}
            </div>
        </div>

        <div class='form-group'>
            <label>* Website:</label>
            <input type='text' id='website' name='website' value='{{ old('website') }}' class="form-control">
            <div class='error'>
              {{ $errors->first('website') }}
            </div>
        </div>  

        <div class='form-group'>
            <label>* Logo Link:</label>
            <input type='text' id='logo' name='logo' value='{{ old('logo') }}' class="form-control">
            <div class='error'>
              {{ $errors->first('logo') }}
            </div>
        </div>  

        <button type="submit" class="btn btn-primary">Add Recruiter</button>

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