@extends('master')

@section('title')
    <h1>Candidate {{ $id }}</h1>
@stop

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('main')
    @if($id)
        <h1>Show a candidate profile: {{ $id }}</h1>
    @else
        <h1>No candidate chosen</h1>
    @endif
@stop