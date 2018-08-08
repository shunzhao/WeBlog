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

Route::get('/', 'IndexController@index');
Route::get('/post/{id?}', 'IndexController@post')->where('id', '[0-9]+');
Route::get('/link', 'IndexController@link');
Route::get('/login', 'AdminController@login');
Route::get('/search', 'AdminController@Search');
Route::post('/login', 'AdminController@validationLogin');

Route::middleware(['token'])->group(function () {
    Route::get('/admin', 'AdminController@index');
	Route::get('/admin/webmgt', 'AdminController@webmgt');
	Route::get('/admin/postmgt', 'AdminController@postmgt');
	Route::get('/admin/linkmgt', 'AdminController@linkmgt');
	Route::get('/admin/usermgt', 'AdminController@usermgt');
	Route::get('/admin/delete/{C}/{id}', 'AdminController@delete')->where(['C' => '[a-zA-Z]+', 'id' => '[0-9]+']);
	Route::get('/admin/postUp/{id}', 'AdminController@postModify')->where('id', '[0-9]+');
	Route::get('/logout', 'AdminController@logout');

	Route::post('/admin/addpost', 'AdminController@addPost');
	Route::post('/admin/addlink', 'AdminController@addLink');
	Route::post('/upload', 'AdminController@upload');
	Route::post('/admin/webModify', 'AdminController@webModify');
	Route::post('/admin/postUp/{id?}', 'AdminController@postModify')->where('id', '[0-9]*');
	Route::post('/admin/userModify', 'AdminController@userModify');
});
