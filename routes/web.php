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

Route::get('/', 'HomeController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/gallery', 'HomeController@gallery')->name('gallery');
Route::get('/events', 'HomeController@events')->name('events');

Route::get('/mail','API\RequestController@mail');


Route::get('{path}',"HomeController@index")->where( 'path', '([A-z\d-\/_.]+)?' );
