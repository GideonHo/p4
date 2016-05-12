<style>
	h1{color: red;}
	h2{color: blue;}
	h3{color: green;}
</style>

<h1>Good news {{ $user->name }}!</h1>

<p>You have applied for the following job in FinJob:</p>

<div>
    <h2>{{ $job->title }}</h2>
    <h3>By {{ $job->recruiter->name }}</h3>
    <a href='{{ Config::get('app.url').'/jobs/show/'.$job->id}}'>View now...</a>
</div>

<p>
From,<br>
Team FinJob
</p>