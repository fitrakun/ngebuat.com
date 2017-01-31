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
		return redirect('/home');
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

	Route::get('/profile/{username}', [
		'uses' => 'UserController@viewProfile',
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

	Route::get('/search/{kategori?}/{search?}', [
		'uses' => 'ProductController@viewSearchResult',
	]);
	
	Route::post('/search', [
		'uses' => 'ProductController@search',
		'as' => 'search'
	]);

	Route::post('/addComment', [
		'uses' => 'ProductController@addComment',
		'as' => 'addComment'
	]);
	
	Route::post('/addSubComment', [
		'uses' => 'ProductController@addSubComment',
		'as' => 'addSubComment'
	]);

	Route::post('/subscribe', [
		'uses' => 'UserController@subscribe',
		'as' => 'subs'
	]);

	Route::get('/subscribe', [
		'uses' => 'UserController@viewSubscribe',
	]);

        Route::get('/aboutus', function(){
		return view('aboutus');
	});

        Route::get('/terms', function(){
		return view('termandcon');
	});

        Route::get('/privacy', function(){
		return view('privacy');
	});
	
	Route::get('/category/{kategori}', [
		'uses' => 'ProductController@filterCategory',
	]);
 
        Route::get('/help', function(){
		return view('help');
	});
	
	Route::get('/editProduct/{id}', [
		'uses' => 'ProductController@viewEditProduct',
	]);

	Route::post('/editProduct', [
		'uses' => 'ProductController@editProduct',
		'as' => 'editProduct'
	]);

	Route::get('/popular', [
		'uses' => 'ProductController@allPopular',
	]);

	Route::get('/new', [
		'uses' => 'ProductController@allNew',
	]);

	Route::get('/adminpage', [
		'uses' => 'AdminController@viewAdminPage',
	]);

	Route::get('/admin2', [
		'uses' => 'AdminController@adminViewAllProduct',
	]);

	Route::get('/admin4', [
		'uses' => 'AdminController@adminViewAllUser',
	]);

	Route::get('/admin5', [
		'uses' => 'AdminController@adminSlideController',
	]);

	Route::get('/admin6', [
		'uses' => 'AdminController@sendEmailSubscriber',
	]);

	Route::get('/admin7', [
		'uses' => 'AdminController@viewBackgroundController',
	]);

	Route::get('/deleteProduct/{id}', [
		'uses' => 'ProductController@deleteProduct',
	]);

	Route::get('/verifyProduct/{id}', [
		'uses' => 'ProductController@verifyProduct',
	]);

	Route::post('/addSlide', [
		'uses' => 'AdminController@addSlide',
		'as' => 'addSlide'
	]);

	Route::post('/changeBackground', [
		'uses' => 'AdminController@changeBackground',
		'as' => 'changeBackground'
	]);

	Route::get('/deleteSlide/{id}', [
		'uses' => 'AdminController@deleteSlide',
	]);

	Route::get('/ban/{username}', [
		'uses' => 'UserController@banUser',
	]);
});
