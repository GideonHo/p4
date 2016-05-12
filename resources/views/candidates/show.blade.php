@extends('master')

@section('title')
    Edit candidate profile
@stop

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('main')

    <h1>Edit candidate profile</h1><br>

    <form method='POST' action='/candidates/show/{id?}'>

        {{ csrf_field() }}

        <div class='form-group'>
            <label>* Resume:</label>
            <!--<input type='text' id='resume' name='resume' value='{{ $candidates->resume or ' ' }}'>-->
            <select id='resume' name='resume' class="form-control">
                @foreach($candidates as $candidate)
                     <option value='{{$candidate->id}}'>
                         {{$candidate->resume}}
                     </option>
                 @endforeach
            </select>
            <div class='error'>
              {{ $errors->first('resume') }}
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Remove Resume</button>

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