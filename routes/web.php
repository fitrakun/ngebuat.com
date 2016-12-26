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

	Route::get('/signup', [
		'uses' => 'UserController@viewSignUp',
	]);

	Route::post('/signup', [
		'uses' => 'UserController@postSignUp',
		'as' => 'signup'
	]);

	Route::get('/login', [
		'uses' => 'UserController@viewLogin',
	]);

	Route::post('/login', [
		'uses' => 'UserController@postSignIn',
		'as' => 'signin'
	]);
	
	Route::get('/changePassword', [
		'uses' => 'UserController@viewChangePassword',
	]);

	Route::post('/changePassword', [
		'uses' => 'UserController@postChangePassword',
		'as' => 'changePassword'
	]);

	/*Route::get('/pictura', function(){
		return view('test');
	});*/

	//cobacoba
	Route::post('/pictura', [
		'uses' => 'ProductController@like',
		'as' => 'pictura'
	]);

	Route::post('/like', [
		'uses' => 'ProductController@like',
		'as' => 'like'
	]);

	Route::get('/babix/{id}/{test}', function(){
		return view('message');
	});

	Route::get('/logout', [
		'uses' => 'UserController@logout',
	]);

	Route::get('/confirm/{token}', [
		'uses' => 'UserController@confirmSignUp',
	]);

	Route::get('dashboard', [
		'uses' => 'UserController@viewDashboard',
		'as' => 'dashboard',
		'middleware' => 'auth'
	]);

	Route::get('/editProfile', [
		'uses' => 'UserController@viewEditProfile',
	]);

	Route::post('/edit', [
		'uses' => 'UserController@editProfile',
		'as' => 'edit'
	]);

	Route::get('/addProduct', [
		'uses' => 'ProductController@viewAddProduct',
	]);

	Route::post('/addProduct', [
		'uses' => 'ProductController@addProduct',
		'as' => 'addProduct'
	]);

	Route::get('/showProduct/{id}', [
		'uses' => 'ProductController@showProduct',
	]);

	Route::get('/home/{kategori?}/{search?}', [
		'uses' => 'ProductController@home',
	]);

	Route::post('/search', [
		'uses' => 'ProductController@search',
		'as' => 'search'
	]);

	Route::post('/addComment', [
		'uses' => 'ProductController@addComment',
		'as' => 'addComment'
	]);
});
