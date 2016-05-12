@extends('master')

@section('title')
    Edit job
@stop

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('main')

    <h1 style='margin-bottom: 1em;'>Edit {{$job->title}} </h1>

    <form method='POST' action='/jobs/edit/{id?}'>

        <input type='hidden' name='id' value='{{$job->id}}'>

        {{ csrf_field() }}

        <div class='form-group'>
            <label>* Title:</label>
            <input type='text' id='title' name='title' value='{{$job->title}}' class="form-control">
            <div class='error'>
              {{ $errors->first('title') }}
            </div>
        </div>

        <div class='form-group'>
            <label>* Recruiter:</label>
            <select id='recruiter_id' name='recruiter_id' class="form-control">
                @foreach($recruiters_for_dropdown as $recruiter_id => $recruiter_name)
                     <option value='{{$recruiter_id}}' {{ ($job->recruiter_id == $recruiter_id) ? 'SELECTED' : '' }}>
                         {{$recruiter_name}}
                     </option>
                 @endforeach
            </select>
            <div class='error'>
              {{ $errors->first('recruiter_id') }}
            </div>
        </div>

        <div class='form-group'>
            <label>* Job Type:</label>
            <select id='job_type_id' name='job_type_id' class="form-control">
                @foreach($jobtypes_for_dropdown as $job_type_id => $job_type_name)
                     <option value='{{$job_type_id}}' {{ ($job->job_type_id == $job_type_id) ? 'SELECTED' : '' }}>
                         {{$job_type_name}}
                     </option>
                 @endforeach
            </select>
            <div class='error'>
              {{ $errors->first('job_type_id') }}
            </div>
        </div>

        <div class='form-group'>
            <label>* Location:</label>
            <select id='location_id' name='location_id' class="form-control">
                @foreach($locations_for_dropdown as $location_id => $location_name)
                     <option value='{{$location_id}}' {{ ($job->location_id == $location_id) ? 'SELECTED' : '' }}>
                         {{$location_name}}
                     </option>
                 @endforeach
            </select>
            <div class='error'>
              {{ $errors->first('location_id') }}
            </div>
        </div>

        <div class='form-group'>
            <label>* Description:</label><br>
            <textarea 
              id='description' 
              name='description' 
              style='text-align: left; vertical-align: top'
              class='form-control' rows='10'>
              
              {{$job->description}}
            
            </textarea>
            <div class='error'>
              {{ $errors->first('description') }}
            </div>
        </div>

        <label>* Tags:</label><br>
          <div class='form-group' style='margin-left: 1em;'>
            <fieldset>
                  @foreach($tags_for_checkboxes as $tag_id => $tag_name)
                    <label class="checkbox" style='width: 100%;'>
                      <input
                          type='checkbox'
                          value='{{ $tag_id }}'
                          name='tags[]'
                          {{ (in_array($tag_name, $tags_for_this_job)) ? 'CHECKED' : '' }}>
                          {{$tag_name}}
                    </label>
                  @endforeach
            </fieldset>
          </div>

        <button type="submit" class="btn btn-primary">Save Job</button>
        <button type="submit" class="btn btn-primary">
          <a href="/jobs/delete/{{$id}}" style='color: white;'>
            Delete Job
          </a>
        </button>

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

@section('sidebar')

@stop