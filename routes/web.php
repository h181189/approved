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

Route::get('/', 'HomeController@index');
Route::get('/panel', 'HomeController@panel');

Auth::routes();

Route::post('/reviews/{id}/', 'ReviewController@store_comment');
Route::get('/reviews/overview', 'ReviewController@overview');
Route::resource('reviews', 'ReviewController');

Route::resource('apps', 'AppController');
