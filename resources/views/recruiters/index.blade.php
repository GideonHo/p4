@extends('master')

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('title')
    All recruiters
@stop

@section('main')
    <h1>All the Recruiters</h1><br>

    @if(sizeof($recruiters) == 0)
        You have not added any recruiters, you can <a href='/recruiters/create'> add a recruiter now to get started</a>.
    @else
        <div id='recruiters' class='cf'>
            @foreach($recruiters as $recruiter)
                <section class='recruiter'>
                    <!-- <a href='/recruiters/show/{{$recruiter->id}}'><h2>{{ $recruiter->name }}</h2></a> -->
                    {{$recruiter->name}}
                    <br>
                    <a href='/recruiters/edit/{{$recruiter->id}}'>Edit</a> |
                    <a href='/recruiters/show/{{$recruiter->id}}'>View</a> |
                    <a href="/recruiters/delete/{{$recruiter->id}}">Delete</a><br><br>
                </section>
            @endforeach
        </div>
    @endif
@stop

@section('sidebar')
    <h3>Jobs by Category</h3>
    @foreach($tags as $tag)
        <a href="/jobs/tag/{{$tag->id}}">{{$tag->name}} ({{sizeof($tag->jobs)}})</a><br>
    @endforeach
@stop