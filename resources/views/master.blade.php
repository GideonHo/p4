<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title class='link'>Home</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/flatly/bootstrap.min.css" rel="stylesheet">
        @yield('head')
        <!-- @yield('head') -->
</head>
<body>

    <div id="header">
        <img src="/photo/finjob.png" style="width: 100px">
    </div>

    <div id="wraper">

        <div id="nav">
            <a href="/"><h3>Home</h3></a>
            <h3>Control Panel</h3>
                @if(Auth::check())
                    Job: <a href="/jobs/create" class='link'>Add</a> | <a href="/jobs/show" class='link'>Manage</a><br>
                    @if($user->role_id > 1)
                        Recruiter: <a href="/recruiters/create" class='link'>Add</a> | <a href="/recruiters/show" class='link'>Manage</a><br>
                    @endif
                    Profile: 
                        <a href="/logout" class='link'>Log Out</a> | 
                        <a href="/candidates/create/" class='link'>Add</a> |
                        <a href="/candidates/edit/{{$user->id}}" class='link'>Manage</a>
                @else
                    Profile: <a href="/login" class='link'>Log In</a> | <a href="/register" class='link'>Register</a><br>
                @endif

            @if(Auth::check())
                <br><h3>Jobs Interested</h3>
                    <a href='/jobs/applied/{{$user->id}}' class='link'>Applied Job</a> |
                    <a href='/jobs/saved/{{$user->id}}' class='link'>Saved Job</a><br>
            @endif

            <h3>Jobs by Location</h3>
                @foreach($locations as $location)
                    <a href="/jobs/location/{{$location->id}}" class='link'>{{$location->name}}</a> |
                @endforeach


            <h3>Jobs by Category</h3>
                @foreach($tags as $tag)
                    <a href="/jobs/tag/{{$tag->id}}" class='link'>{{$tag->name}} ({{sizeof($tag->jobs)}})</a><br>
                @endforeach

            @yield('sidebar')

        </div>

        <div id="main" style="height: auto;">
            @if(Session::get('message')!=null)
                <pre><div class='flash_message'>{{Session::get('message')}}</div></pre><br>
            @endif

            @yield('sub-title')
            @yield('main')            
        </div>

        <div id="sidebar">
            <h3>Employers:</h3>
                @foreach($recruiters as $recruiter)
                    <a href="/recruiters/show/{{$recruiter->id}}" class='link'><p><img src="{{$recruiter->logo}}"></p></a><br>
                @endforeach
        </div>

    </div>

    <div id="footer">
        © Copyright 2016 Gideon Ho. All Rights Reserved.
    </div>
    
    <!-- javascript -->
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="assignment3.js"></script>
</body>
</html>