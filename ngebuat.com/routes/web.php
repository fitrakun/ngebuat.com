<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['middleware' => 'web'],  function(){
	Route::get('/', function () {
		return view('welcome');
	});
	
	Route::get('signup', function () {
		return view('signup');
	});

	Route::get('login', function () {
		return view('login');
	});
	
	Route::get('/logout', [
		'uses' => 'UserController@logout',
	]);

	Route::get('dashboard', [
		'uses' => 'UserController@viewDashboard',
		'as' => 'dashboard',
		'middleware' => 'auth'
	]);

	Route::get('/editProfile', [
		'uses' => 'UserController@viewEditProfile',
		'middleware' => 'auth'
	]);

	Route::post('/signup', [
		'uses' => 'UserController@postSignUp',
		'as' => 'signup'
	]);
	
	Route::post('/login', [
		'uses' => 'UserController@postSignIn',
		'as' => 'signin'
	]);

	Route::post('/edit', [
		'uses' => 'UserController@editProfile',
		'as' => 'edit'
	]);
});
