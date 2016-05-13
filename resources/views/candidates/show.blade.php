@extends('master')

@section('title')
    Select a resume for your application
@stop

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('main')

    <h1>View Application</h1><br>

    <form method='POST' action='/jobs/apply/{id?}'>

        <input type='hidden' id='id' name='id' value='{{$id}}'>

        {{ csrf_field() }}

        <div class='form-group'>
            <label>* Resume:</label>
              <select class="form-control">
                  @foreach($candidates as $candidate)
                  echo $candidate->resume;
                       <option id='resume' name='resume' value='{{$candidate->resume}}'>
                           {{$candidate->resume}}
                       </option>
                   @endforeach
              </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Download Resume
        </button>
    </form>

@stop