<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Home</title>
    @yield('head')
</head>
<body>
    <div id="header">
        @yield('title')
    </div>
    <div id="wraper">
        <div id="nav">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/jobs/create">Create Job</a></li>
                <li><a href="/jobs/edit/1">Edit Job</a></li>
                <li><a href="/jobs/delete/1">Delete Job</a></li>
            </ul>
        </div>
        <div id="main" style="height: auto;">
            @yield('main')
        </div>
        <div id="sidebar">
            <p>Sponsors:</p>
            <p><img src="/photo/logo.png" alt="logo"></p>
            <p><img id="sponsor" src="/photo/austen.jpg" alt="austen"></p>
        </div>
    </div>
    <div id="footer">© Copyright 2016 Gideon Ho. All Rights Reserved.</div>
    
    <!-- javascript -->
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="assignment3.js"></script>
</body>
</html>