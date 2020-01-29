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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/admin', 'AdminActions@index')->name('admin-panel')->middleware('auth');
Route::resource('categories', 'CategoriesController')->middleware('auth');
Route::resource('genres', 'GenresController')->middleware('auth');
Route::resource('movies', 'MoviesController')->middleware('auth');
Route::resource('movies/{movie}/comments', 'CommentsController')->middleware('auth');
Route::post('/rating', 'AjaxRatingController@rating')->name('rating');
Route::put('/rating-update', 'AjaxRatingController@ratingUpdate')->name('rating-update');

