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

Route::get('/', 'IndexController@home')->name('home');
Route::get('/about', 'IndexController@about');
Route::get('/demands', 'IndexController@demands');
Route::get('/gallery', 'IndexController@gallery');
Route::get('/blogs', 'IndexController@blogs');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/demands', 'IndexController@demands')->name('demands');
Route::get('/gallery', 'IndexController@gallery')->name('gallery');
Route::get('/events', 'IndexController@events')->name('events');
Route::get('/event-detail/{id}', 'IndexController@singleEvent')->name('event.single');


Route::resource('/comments','CommentController');



Route::get('{path}',"HomeController@index")->where( 'path', '([A-z\d-\/_.]+)?' );
