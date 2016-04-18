@extends('master')

@section('head')
    <link href="css/style.css" rel="stylesheet">
@stop

@section('main')
	<form action="/text" method="post">

	    {{ csrf_field() }}
	    
	    <fieldset>

	        <div class="title">
                <h1><a href="/text">Lorem Ipsum Generator</a></h1>
	        </div>

	        <div id="contact-details">
	            <p>Create random filler text for your applications. </p> 
			</div>

	        <div class="title">
                <h1><a href="/user">Random User Generator</a></h1>
	        </div>

	        <div id="contact-details">
	            <p>Create random user data for your applications. Like Lorem Ipsum, but for people. </p> 
			</div>

	    </fieldset>

	</form>

	@stop