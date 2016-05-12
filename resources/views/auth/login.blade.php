@extends('master')

@section('head')
    <link href="/css/style.css" rel="stylesheet">
@stop

@section('main')

    <p>Don't have an account? <a href='/register'>Register here...</a></p><br>

    <h1>Login</h1><br>

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/login'>

        <input type='hidden' name='role_id' id='role_id' value='1'>

        {!! csrf_field() !!}

        <div class='form-group'>
            <label for='email'>Email</label>
            <input type='text' name='email' id='email' value='{{ old('email') }}' class="form-control">
        </div>

        <div class='form-group'>
            <label for='password'>Password</label>
            <input type='password' name='password' id='password' value='{{ old('password') }}' class="form-control">
        </div>

        <div class='form-group'>
            <label for='remember'>Remember me</label>
            <input type='checkbox' name='remember' id='remember' style="text-align: left; height: 20px; width: 20px;"> 
        </div>

        <button type='submit' class='btn btn-primary'>Login</button>

    </form>
@stop