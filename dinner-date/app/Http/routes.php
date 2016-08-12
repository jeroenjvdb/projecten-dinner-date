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

    Route::group(['prefix' => 'setup'], function () {
        Route::get('/step1',['as' => 'step1', 'uses' => 'SetupController@step1']);
        Route::post('/profile', ['as' => 'setupProfile', 'uses' => 'SetupController@updateProfile']);
        Route::post('/food', ['as' => 'setupFood', 'uses' => 'SetupController@updateFood']);
        Route::post('/taste', ['as' => 'setupTaste', 'uses' => 'SetupController@updateTaste']);
    });

    Route::group(['prefix' => 'update'], function () {
        Route::post('/profile', ['as' => 'updateProfile', 'uses' => 'ProfileController@updateProfile']);
        Route::post('/food', ['as' => 'updateFood', 'uses' => 'ProfileController@updateFood']);
        Route::post('/taste', ['as' => 'updateTaste', 'uses' => 'ProfileController@updateTaste']);
        Route::get('/password', ['as' => 'updatePassword', 'uses' => 'UserController@editPassword']);
        Route::post('/password', ['uses' => 'UserController@postEditPassword']);
    });


    Route::group(['prefix' => 'profile'], function () {
        Route::get('/{id}', ['as' => 'getProfile', 'uses' => 'MainController@getProfile']);
    });

    Route::group(['prefix' => 'friends'], function (){
        Route::get('/requests', ['as' => 'getRequests', 'uses' => 'FriendController@getRequests']);
        Route::get('/add/{id}', ['as' => 'addFriend', 'uses' => 'FriendController@addFriend']);
        Route::get('/add/{id}/{date}', ['as' => 'addFriend', 'uses' => 'FriendController@addByDate']);
        Route::get('/accept/{id}', ['as' => 'acceptFriend', 'uses' => 'FriendController@acceptFriend']);
        Route::get('/delete-request/{id}', ['as' => 'deleteFriendRequest', 'uses' => 'FriendController@deleteFriendRequest']);
        Route::get('/delete/{id}', ['as' => 'deleteFriend', 'uses' => 'FriendController@deleteFriend']);
    });


    Route::group(['prefix' => 'dish'], function () {
        Route::get('/', ['as' => 'dishIndex', 'uses' => 'DishController@index']);
        Route::get('/my', ['as' => 'myDishes', 'uses' => 'DishController@myDishes']);
        Route::get('/delete/{id}', ['as' => 'deleteDish', 'uses' => 'DishController@delete']);
        Route::get('/edit/{id}', ['as' => 'editDish', 'uses' => 'DishController@edit']);
        Route::post('/edit/', ['as' => 'postEdit', 'uses' => 'DishController@postEdit']);
        Route::get('/user/{id}', ['as' => 'personDishes', 'uses' => 'DishController@personDishes']);
        Route::get('/show/{type}', ['as' => 'dishShow', 'uses' => 'DishController@show']);
        Route::get('/create', ['as' => 'dishCreate', 'uses' => 'DishController@getCreate']);
        Route::post('/postCreate', ['as' => 'postCreate','uses' => 'DishController@postCreate']);
        Route::get('/show/{dishid}/rate/{rating}', ['as' => 'ratingCreate', 'uses' => 'RatingController@getCreate']);
        Route::get('/url/{dish_id}', ['as' => 'geturl', 'uses' => 'DishController@getUrl']);
    });

    Route::group(['prefix' => 'dates'], function () {
        Route::get('/mydates',['as' => 'myDates', 'uses' => 'DateController@myDates']);
        Route::get('/find', ['as' => 'findDates', 'uses' => 'DateController@getSearch']);
        Route::post('/find', ['uses' => 'DateController@search']);
        Route::get('/create', ['as' => 'createDate', 'uses' => 'DateController@index']);
        Route::post('/createDate', ['as' => 'createDatePost', 'uses' => 'DateController@create']);
        Route::get('/show/{id}', ['as'=>'showdate', 'uses' => 'DateController@show']);
    });


    Route::get('/compare', ['as'=>'compare','uses'=>'ProfileController@compare']);

Route::group(['prefix' => '/chat'], function () {
    Route::get('/', ['as' => 'chat','uses' => 'ChatController@getChat']);
    Route::get('/{id}', ['uses' => 'ChatController@index']);
    Route::post('/post/{id}', ['uses' => 'ChatController@create']);
});

    Route::get('/Photo', ['as' => 'Photo', 'uses' => 'PhotoController@index']);
    Route::post('/Photo', ['as' => 'PhotoPost', 'uses' => 'PhotoController@postPicture']);
    Route::post('/crop', ['as' => 'postCrop', 'uses' => 'PhotoController@postCrop']);
//    Route::get('/crop', ['as' => 'crop', 'uses' => 'PhotoController@getCrop']);
    Route::get('/crop',['as' => 'crop', function()
    {
        return View('functions.crop')->with('image', 'img/users/'. Session::get('image'));
    }]);
});
