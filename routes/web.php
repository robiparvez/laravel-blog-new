<?php

// Blog
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slugs', '[\w\d-\_]+');

Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);


// Pages
Route::get('/', 'PagesController@getIndex');

Route::get('/about', 'PagesController@getAbout');

Route::get('contact', ['uses' => 'PagesController@getContact', 'as' => 'home']);

Route::post('/contact', 'PagesController@postContact');


// Posts route
Route::resource('/posts', 'PostController');


//Categories
Route::resource('/categories', 'CategoryController', ['except' => 'create']);


//Tags
Route::resource('/tags', 'TagsController',['except' => 'create']);

//Comments
// Route::resource('/comments', 'CommentsController');



Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);


// Auth
Auth::routes();


// Home
Route::get('/home', 'HomeController@index');


// Route::get('auth/logut', 'Auth\LoginController@getLogout');

// Route::get('auth/login', 'Auth\LoginController@getLogin');

// Route::get('auth/register', 'Auth\LoginController@getRegister');

// // post route
// Route::post('auth/login', 'Auth\LoginController@postLogin');
// Route::post('auth/register', 'Auth\LoginController@postRegister');
