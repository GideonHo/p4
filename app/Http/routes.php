<?php

/* JobController and its methods */
Route::get('/jobs/job/{id?}', 'JobController@getShow');
Route::get('/jobs/create', 'JobController@getCreate');
Route::post('/jobs/create', 'JobController@postCreate');
Route::get('/jobs/edit/{id?}', 'JobController@getEdit');
Route::post('/jobs/edit/{id?}', 'JobController@postEdit');
Route::get('/jobs/delete/{id?}', 'JobController@getDelete');
Route::post('/jobs/delete/{id?}', 'JobController@postDelete');

/* RecruiterController and its methods */
Route::get('/recruiters/show/{id?}', 'RecruiterController@getShow');
Route::get('/recruiters/create', 'RecruiterController@getCreate');
Route::post('/recruiters/create', 'RecruiterController@postCreate');
Route::get('/recruiters/edit/{id?}', 'RecruiterController@getEdit');
Route::post('/recruiters/edit/{id?}', 'RecruiterController@postEdit');
Route::get('/recruiters/delete/{id?}', 'RecruiterController@getDelete');
Route::post('/recruiters/delete/{id?}', 'RecruiterController@postDelete');

/* CandidateController and its methods */
Route::get('/candidates/show/{id?}', 'CandidateController@getShow');
Route::get('/candidates/create', 'CandidateController@getCreate');
Route::post('/candidates/create', 'CandidateController@postCreate');
Route::get('/candidates/edit/{id?}', 'CandidateController@getEdit');
Route::post('/candidates/edit/{id?}', 'CandidateController@postEdit');
Route::get('/candidates/delete/{id?}', 'CandidateController@getDelete');
Route::post('/candidates/delete/{id?}', 'CandidateController@postDelete');

Route::get('/', function () {
        echo 'welcome';
});

Route::get('/practice', function () {
        return view('welcome');
});

Route::get('/index', function () {
    	return view('index');
});
