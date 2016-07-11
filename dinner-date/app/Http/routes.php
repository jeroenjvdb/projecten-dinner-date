<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'homepage', 'uses' => 'HomeController@home']);
Route::get('/home',	['as' => 'dashboard', 	'uses' => 'ProfileController@loadDashboard']);


Route::get('/login',['as' => 'login', 'uses' =>'Auth\AuthController@login']);
Route::post('/login',['uses' => 'Auth\AuthController@postLogin']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
Route::get('/register',	['as' => 'register', 'uses' => 'Auth\AuthController@register']);
Route::post('/register', ['uses' => 'Auth\AuthController@postRegister' ]);

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'update'], function () {
        Route::post('/profile', ['as' => 'updateProfile', 'uses' => 'ProfileController@updateProfile']);
        Route::post('/food', ['as' => 'updateFood', 'uses' => 'ProfileController@updateFood']);
        Route::post('/taste', ['as' => 'updateTaste', 'uses' => 'ProfileController@updateTaste']);
        Route::get('/password', ['as' => 'updatePassword', 'uses' => 'UserController@editPassword']);
        Route::post('/password', ['uses' => 'UserController@postEditPassword']);
    });


    Route::group(['prefix' => 'profile'], function () {
        Route::get('/{id}', ['as' => 'getProfile', 'uses' => 'MainController@getProfile']);
        Route::get('/add/{id}', ['as' => 'addFriend', 'uses' => 'MainController@addFriend']);
        Route::get('/accept/{id}', ['as' => 'acceptFriend', 'uses' => 'MainController@acceptFriend']);
        Route::get('/delete-request/{id}', ['as' => 'deleteFriendRequest', 'uses' => 'MainController@deleteFriendRequest']);
        Route::get('/delete/{id}', ['as' => 'deleteFriend', 'uses' => 'MainController@deleteFriend']);
    });

    Route::group(['prefix' => 'dish'], function () {
        Route::get('/', ['as' => 'dishIndex', 'uses' => 'DishController@index']);
        Route::get('/show/{type}', ['as' => 'dishShow', 'uses' => 'DishController@show']);
        Route::get('/create', ['as' => 'dishCreate', 'uses' => 'DishController@getCreate']);
        Route::post('/create', ['uses' => 'DishController@postCreate']);
        Route::get('/show/{dishid}/rate/{rating}', ['as' => 'ratingCreate', 'uses' => 'RatingController@getCreate']);
    });

    Route::group(['prefix' => 'dates'], function () {
        Route::get('/find', ['as' => 'findDates', 'uses' => 'DateController@getSearch']);
        Route::post('/find', ['uses' => 'DateController@search']);
        Route::get('/create', ['as' => 'createDate', 'uses' => 'DateController@index']);
        Route::post('/createDate', ['as' => 'createDatePost', 'uses' => 'DateController@create']);
    });

    Route::get('/home/chat/{id}', ['uses' => 'ChatController@index']);
    Route::post('/home/chat/post/{id}', ['uses' => 'ChatController@create']);

    Route::get('/Photo', ['as' => 'Photo', 'uses' => 'PhotoController@index']);
    Route::post('/Photo', ['as' => 'PhotoPost', 'uses' => 'PhotoController@postPicture']);
});
