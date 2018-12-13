<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['user'=>'API\UserController']);
Route::apiResources(['event'=>'API\EventController']);
Route::apiResources(['notice'=>'API\NoticeController']);
Route::apiResources(['category'=>'API\CategoryController']);
Route::put('event/image/{id}','API\EventController@image');
Route::put('post/image/{id}','API\PostController@image');
Route::get('post/category','API\PostController@category');
Route::get('post/publish/{id}','API\PostController@publish');
Route::post('post/images','API\PostController@images');
Route::put('post/content/{id}','API\PostController@content');
Route::put('notice/image/{id}','API\NoticeController@image');
Route::apiResources(['gallery'=>'API\GalleryController']);
Route::apiResources(['demands'=>'API\DemandController']);
Route::apiResources(['bloods'=>'API\BloodController']);

Route::apiResources(['request'=>'API\RequestController']);
Route::get('requestdeletall','API\RequestController@deleteall');
Route::apiResources(['donate'=>'API\DonateController']);
Route::apiResources(['post'=>'API\PostController']);
Route::post('donate/accept','API\DonateController@accept');
Route::post('donate/decline','API\DonateController@decline');
Route::get('currentUser','API\UserController@user');
Route::get('usersearch','API\UserController@search');
Route::post('advsearch','API\UserController@advsearch');
Route::get('profile','API\UserController@profile');
Route::put('profile/update','API\UserController@updateProfile');
Route::apiResources(['banner'=>'API\BannerController']);
Route::post('demand/accept','API\DemandController@accept');
Route::put('profile/code','API\UserController@code');
