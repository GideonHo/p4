@extends('master')

@section('title')
    <h1>Recruiter {{ $id }}</h1>
@stop

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('sub-title')
    @if($id)
	    <div style='float: left'>
			<img class='cover' src='{{$recruiter->logo}}' style='border: none; min-height: 100px; width: auto; min-width: 300px'>
		</div>
	@endif
@stop

@section('main')
    @if($id)
		<div style='float: left'>
	        <table>
	        	<tr>
	        		<td><label>Company: </label></td>
	        		<td><p>{{ $recruiter->name }}</p></td>
	        	</tr>
	        	<tr>
	        		<td><label>Address: </label></td>
	        		<td><p>{{ $recruiter->address }}</p></td>
	        	</tr>
	        	<tr>
	        		<td><label>Email: </label></td>
	        		<td><p>{{ $recruiter->email }}</p></td>
	        	</tr>
				<tr>
	        		<td><label>Website: </label></td>
	        		<td><p>{{ $recruiter->website }}</p></td>
	        	</tr>
				<tr>
	        		<td><label>Logo Link: </label></td>
	        		<td><p>{{ $recruiter->logo }}</p></td>
	        	</tr>
			</table>

	        @if(Auth::check())
	            @if($user->role_id > 1)
		        <a href='/recruiters/edit/{{$id}}'>Edit</a> |
				<a href="/recruiters/delete/{{$id}}">Delete</a>
	            @endif
	        @endif
		</div>

    @else
        <h1>No recruiter chosen</h1>
    @endif
@stop