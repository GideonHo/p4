<?php

Route::get('/', 'JobController@getIndex');

/* JobController and its methods */
Route::get('/jobs/show', 'JobController@getIndex');
Route::get('/jobs/show/{id?}', 'JobController@getShow');
Route::get('/jobs/tag/{id?}', 'JobController@getShowTag');
Route::get('/jobs/location/{id?}', 'JobController@getShowLocation');
Route::group(['middleware'=>'auth'], function(){
    Route::get('/jobs/create', 'JobController@getCreate');
    Route::post('/jobs/create', 'JobController@postCreate');
    Route::get('/jobs/edit/{id?}', 'JobController@getEdit');
    Route::post('/jobs/edit/{id?}', 'JobController@postEdit');
    Route::get('/jobs/delete/{id?}', 'JobController@getDelete');
    Route::get('/jobs/apply/{id?}', 'JobController@getApply');
    Route::post('/jobs/apply/{id?}', 'JobController@postApply');
    Route::get('/jobs/applied/{id?}', 'JobController@getAppliedJob');
    Route::get('/jobs/application/{id?}', 'JobController@getApplication');
    Route::get('/jobs/save/{id?}', 'JobController@getSave');
    Route::get('/jobs/saved/{id?}', 'JobController@getSavedJob');
    Route::get('/jobs/unsave/{id?}', 'JobController@getUnSave');
});
//Route::post('/jobs/apply/{id?}', 'JobController@postApply');
//Route::get('/jobs/viewed/{id?}', 'JobController@getViewedJob');

/* RecruiterController and its methods */
Route::get('/recruiters/show', 'RecruiterController@getIndex');
Route::get('/recruiters/show/{id?}', 'RecruiterController@getShow');
Route::get('/recruiters/create', 'RecruiterController@getCreate');
Route::post('/recruiters/create', 'RecruiterController@postCreate');
Route::get('/recruiters/edit/{id?}', 'RecruiterController@getEdit');
Route::post('/recruiters/edit/{id?}', 'RecruiterController@postEdit');
Route::get('/recruiters/delete/{id?}', 'RecruiterController@getDelete');

/* AuthController and its methods */
# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');
# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');
# Process logout
Route::get('/logout', 'Auth\AuthController@logout');
# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');
# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');
# Show login status
Route::get('/show-login-status', function(){
    $user = Auth::user();
    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }
});

/* CandidateController and its methods */
Route::group(['middleware'=>'auth'], function(){
    Route::get('/candidates/show/{id?}', 'CandidateController@getShow');
    Route::get('/candidates/create', 'CandidateController@getCreate');
    Route::post('/candidates/create', 'CandidateController@postCreate');
    Route::get('/candidates/edit/{id?}', 'CandidateController@getEdit');
    Route::post('/candidates/edit/{id?}', 'CandidateController@postEdit');
    Route::get('/candidates/delete/{id?}', 'CandidateController@getDelete');
    Route::post('/candidates/delete/{id?}', 'CandidateController@postDelete');
});

/* Testing database connection */
Route::get('/debug', function(){
	echo '<pre>';
	echo '<h1>Environment</h1>';
	echo App::environment();

	echo '<h1>Debugging?</h1>';
	if(config('app.debug')) echo "Yes";
	else echo "No";

	echo '<h1>Database Config</h1>';

	echo '<h1>Test Database Connection</h1>';

    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

Route::get('/debug-email', function() {
    dump(Config::get('mail'));
});

Route::get('/practice', function () {
        return view('welcome');
});

Route::get('/index', function () {
    	return view('index');
});

/* Recreate databases */

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database p4');
        DB::statement('CREATE database p4');

        return 'Dropped p4; created p4.';
    });

};
