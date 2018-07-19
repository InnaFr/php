<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'NewController@loadInform');


Route::get('/exit', 'NewController@loadInform');

Route::get('/authorize', function(){
	return View('blog.autho');
});

Route::get('/auth', 'NewController@tryAuth');

Route::get('/create', 'NewController@createPost');

Route::get('/reg', 'NewController@createUser');

Route::get('/full', function(){
	return View('blog.authUsers');
});
Route::get('/registr', function(){
	return View('blog.registr');
});