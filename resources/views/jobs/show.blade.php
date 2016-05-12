@extends('master')

@section('title')
    <h1>Job {{ $id }}</h1>
@stop

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('main')
    <!-- <img style='width: 300px' src='{{ $job->recruiter->logo }}' alt='Logo for {{$job->recruiter->name}}'><br> -->
    @if($id)
        <h1>{{ $job->title }}</h1>
        
        <h2>Recruiter</h2>
        <p>{{ $job->recruiter->name }}</p>

        <h2>Job Type</h2>
        <p>{{ $job->job_type->name }}</p>

        <h2>Location</h2>
        <p>{{ $job->location->name }}</p>
        <!-- <p>{{ $location->name }}</p> -->

        <h2>Descritpion</h2>
        <p>{{ $job->description }}</p><br>
        
        <a href='/jobs/apply/{{$job->id}}'>Apply</a> |
        @if(Auth::check())
            @if(($job->author_id == $user->id)or($user->role_id > 1))
                <a href='/jobs/edit/{{$job->id}}'>Edit</a> |
                <a href="/jobs/delete/{{$job->id}}">Delete</a> |
            @endif
        @endif
        <a href="/jobs/save/{{$job->id}}">Save</a><br>

    @else
        <h1>No job chosen</h1>
    @endif
@stop

@section('sidebar')

@stop