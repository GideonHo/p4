@extends('master')

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('main')

    <p>Already have an account? <a href='/login'>Login here...</a></p><br>

    <h1>Register</h1><br>

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/register'>

        <input type='hidden' name='role_id' id='role_id' value='1'>

        {!! csrf_field() !!}

        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' name='name' id='name' value='{{ old('name') }}' class="form-control">
        </div>

        <div class='form-group'>
            <label for='email'>Email</label>
            <input type='text' name='email' id='email' value='{{ old('email') }}' class="form-control">
        </div>

        <div class='form-group'>
            <label for='password'>Password</label>
            <input type='password' name='password' id='password' class="form-control">
        </div>

        <div class='form-group'>
            <label for='password_confirmation'>Confirm Password</label>
            <input type='password' name='password_confirmation' id='password_confirmation' class="form-control">
        </div>

        <button type='submit' class='btn btn-primary'>Register</button>

    </form>

@stop