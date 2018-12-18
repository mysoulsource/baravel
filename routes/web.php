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
//Route::get('img/{pathkey}/{filename}/{w?}/{h?}', function($pathkey, $filename, $w=100, $h=100){
//
//    $cacheimage = Image::cache(function($image) use($pathkey, $filename, $w, $h){
//
//        switch($pathkey){
//            case 'posts':
//                $filepath = 'img/posts/' . $filename;
//                break;
//            case 'promotion':
//                $filepath = 'assets/images/promotion/' .$filename;
//                break;
//        }
//        return $image->make($filepath)->resize($w,$h);
//
//    },10,false); // cache for 10 minutes
//
//    return Response::make($cacheimage, 200, array('Content-Type' => 'image/jpeg'));
//});

Route::get('/', 'IndexController@home')->name('home');
Route::get('/about', 'IndexController@about');
Route::get('/demands', 'IndexController@demands');
Route::get('/gallery', 'IndexController@gallery');
Route::get('/blogs', 'IndexController@blogs')->name('blogs');
Route::get('/blog-single/{id}', 'IndexController@singleBlog')->name('blog.single');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/demands', 'IndexController@demands')->name('demands');
Route::get('/gallery', 'IndexController@gallery')->name('gallery');
Route::get('/events', 'IndexController@events')->name('events');
Route::get('/event-detail/{id}', 'IndexController@singleEvent')->name('event.single');


Route::resource('/comments','CommentController');



//Route::get('{path}',"HomeController@index")->where( 'path', '([A-z\d-\/_.]+)?' );

