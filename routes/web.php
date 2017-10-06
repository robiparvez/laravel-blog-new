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
Route::resource('/tags', 'TagsController', ['except' => 'create']);

//Comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']); //as used to give a named route

Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);

Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);

Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);

Route::get('comments/{id}/delete', [
    'uses' => 'CommentsController@delete',
    'as'   => 'comments.delete',
]);

// Route::resource('/comments', 'CommentsController');

// Auth
Auth::routes();

// Home
Route::get('/home', 'HomeController@index');

// test
Route::get('/{test}', function ($test)
{
    fopen(resource_path('views/' . $test . '.blade.php'), 'w');
    return view($test);
});

// Route::get('auth/logut', 'Auth\LoginController@getLogout');

// Route::get('auth/login', 'Auth\LoginController@getLogin');

// Route::get('auth/register', 'Auth\LoginController@getRegister');

// // post route
// Route::post('auth/login', 'Auth\LoginController@postLogin');
// Route::post('auth/register', 'Auth\LoginController@postRegister');
