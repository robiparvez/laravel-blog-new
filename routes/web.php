<?php

// get route
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slugs', '[\w\d-\_]+');

Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);

Route::get('/', 'PagesController@getIndex');

Route::get('/about', 'PagesController@getAbout');

// Route::get('/contact', 'PagesController@getContact');
Route::get('contact', ['uses' => 'PagesController@getContact', 'as' => 'home']);

Route::post('/contact', 'PagesController@postContact');


// resource route
Route::resource('/posts', 'PostController');

Route::resource('/categories', 'CategoryController', ['except' => 'create']);

Route::resource('/tags', 'TagsController',['except' => 'create']);


Auth::routes();

Route::get('/home', 'HomeController@index');


// Route::get('auth/logut', 'Auth\LoginController@getLogout');

// Route::get('auth/login', 'Auth\LoginController@getLogin');

// Route::get('auth/register', 'Auth\LoginController@getRegister');

// // post route
// Route::post('auth/login', 'Auth\LoginController@postLogin');
// Route::post('auth/register', 'Auth\LoginController@postRegister');
