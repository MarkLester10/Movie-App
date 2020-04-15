<?php

use Illuminate\Support\Facades\Route;


// movies toutes
Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');

//actors routes
Route::get('/actors', 'ActorsController@index')->name('actors.index');
Route::get('/actors/{id}', 'ActorsController@show')->name('actors.show');

// pagination
Route::get('/actors/page/{page?}', 'ActorsController@index')->name('actors.page');


//tvshows routes
Route::get('/tvshows', 'TvShowsController@index')->name('tvshows.index');
Route::get('/tvshows/{id}', 'TvShowsController@show')->name('tvshows.show');

