@extends('master')

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('title')
    Saved Jobs
@stop

@section('main')

    <h1>Saved Jobs</h1>

    @if(sizeof($jobs) == 0)
        <br><pre>No job is available in this category.</pre>
    @else
        <div id='jobs' class='cf'>
            @foreach($jobs as $job)
                <section class='job'>
                    <a href='/jobs/show/{{$job->id}}'><h2>{{ $job->title }}</h2></a>
                    {{$job->recruiter->name}} |
                    {{$job->location->name}} |
                    {{$job->job_type->name}} |
                    Updated at: {{$job->updated_at}}
                    <br>
                    <a href='/jobs/apply/{{$job->id}}'>Apply</a> |
                    <a href='/jobs/edit/{{$job->id}}'>Edit</a> |
                    <a href="/jobs/delete/{{$job->id}}">Delete</a> |
                    <a href="/jobs/unsave/{{$job->id}}">Unsave</a><br>
                </section>
            @endforeach
        </div>
    @endif
@stop

@section('sidebar')

@stop