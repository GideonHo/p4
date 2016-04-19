@extends('master')

@section('title')
    <h1>Recruiter {{ $id }}</h1>
@stop

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('main')
    @if($id)
        <h1>Show Recruiter: {{ $id }}</h1>
    @else
        <h1>No recruiter chosen</h1>
    @endif
@stop