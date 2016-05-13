@extends('master')

@section('title')
    Select a resume for your application
@stop

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('main')

    <h1>Select a resume for your application</h1><br>

    <form method='POST' action='/jobs/apply/{id?}'>

        <input type='hidden' id='id' name='id' value='{{$id}}'>

        {{ csrf_field() }}

        <div class='form-group'>
            <label>* Resume:</label>
            <!--<input type='text' id='resume' name='resume' value='{{ $candidates->resume or ' ' }}'>-->
            <select class="form-control">
                @foreach($candidates as $candidate)
                echo $candidate->resume;
                     <option id='resume' name='resume' value='{{$candidate->resume}}'>
                         {{$candidate->resume}}
                     </option>
                 @endforeach
            </select>
            <div class='error'>
              {{ $errors->first('resume') }}
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
          <a href="/candidates/create/" style='color: white;'>
            Add Resume
          </a>
        </button>
        
        <button type="submit" class="btn btn-primary">
          <a href="/jobs/application/{{$id}}" style='color: white;'>
            Send Resume
          </a>
        </button>

    </form>

@stop