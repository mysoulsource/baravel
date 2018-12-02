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
Route::put('event/image/{id}','API\EventController@image');
Route::put('notice/image/{id}','API\NoticeController@image');
Route::apiResources(['gallery'=>'API\GalleryController']);
Route::apiResources(['demands'=>'API\DemandController']);
Route::apiResources(['bloods'=>'API\BloodController']);
Route::apiResources(['request'=>'API\RequestController']);
Route::apiResources(['donate'=>'API\DonateController']);
Route::post('donate/accept','API\DonateController@accept');
Route::post('donate/decline','API\DonateController@decline');
Route::get('currentUser','API\UserController@user');
Route::get('usersearch','API\UserController@search');
Route::post('advsearch','API\UserController@advsearch');
Route::get('profile','API\UserController@profile');
Route::put('profile/update','API\UserController@updateProfile');
