@extends('master')

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('title')
    All jobs
@stop

@section('sub-title')
    <h1> {{ $this or 'All Jobs' }} </h1>
@stop

@section('main')

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
                    <a href="/jobs/save/{{$job->id}}">Save</a><br>
                    </p>
                </section>
            @endforeach
        </div>
    @endif
@stop

@section('sidebar')

@stop