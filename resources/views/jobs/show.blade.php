@extends('master')

@section('title')
    <h1>Job {{ $id }}</h1>
@stop

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('main')
    @if($id)
        <h1>Show Job: {{ $id }}</h1>
    @else
        <h1>No job chosen</h1>
    @endif
@stop