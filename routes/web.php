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

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/legal', function () {
    return view('legal');
});

Route::get('/dashboard', 'PagesController@dashboard')->name('dashboard');

Route::get('/', 'PagesController@accueil')->name('accueil');

Route::group(['prefix' => 'movie'], function () {
  Route::get('/index', 'MovieController@index')->name('indexMovie');
  Route::get('/update', 'MovieController@update')->name('updateMovie');
  Route::get('/create', 'MovieController@create')->name('createMovie');
  Route::get('/remove/{id}', 'MovieController@remove')->name('removeMovie');
  Route::get('/show/{id}', 'MovieController@show')->name('showMovie');
});

Route::group(['prefix' => 'actor'], function () {
  Route::get('/index', 'ActorController@index')->name('indexActor');
  Route::get('/update', 'ActorController@update')->name('updateActor');
  Route::get('/create', 'ActorController@create')->name('createActor');
  Route::get('/remove/{id}', 'ActorController@remove')->name('removeActor');
});

Route::group(['prefix' => 'director'], function () {
  Route::get('/index', 'DirectorController@index')->name('indexDirector');
  Route::get('/update', 'DirectorController@update')->name('updateDirector');
  Route::get('/create', 'DirectorController@create')->name('createDirector');
  Route::get('/remove/{id}', 'DirectorController@remove')->name('removeDirector');
});

Route::group(['prefix' => 'categories'], function () {
  Route::get('/index', 'CategoriesController@index')->name('indexCategories');
  Route::get('/update', 'CategoriesController@update')->name('updateCategories');
  Route::get('/create', 'CategoriesController@create')->name('createCategories');
  Route::get('/remove', 'CategoriesController@remove')->name('removeCategories');
});
