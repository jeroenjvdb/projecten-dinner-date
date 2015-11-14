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

Route::get('/', array('as' => 'homepage', 'uses' => 'mainController@home'));

Route::get('/login', 		['as' => 'login', 		'uses' =>'Auth\AuthController@login']);
Route::post('/login', 		[						'uses' => 'Auth\AuthController@postLogin']);

Route::get('/logout', 		['as' => 'logout', 		'uses' => 'Auth\AuthController@logout']);

Route::get('/register', 	['as' => 'register', 		'uses' => 'Auth\AuthController@register']);
Route::post('/register',	[ 							'uses' => 'Auth\AuthController@postRegister' ]);		
Route::post('/registerA',	['as' => 'postRegisterA',	'uses' => 'Auth\AuthController@postRegisterA']);		
Route::post('/register',	['as' => 'updateFood',		'uses' => 'Auth\AuthController@updateFood']);		
Route::post('/register',	['as' => 'updateProfile',	'uses' => 'Auth\AuthController@updateProfile']);		


Route::get('/home',			['as' => 'dashboard', 	'uses' => 'MainController@index']);
Route::get('/profile/{id}', ['as' => 'getProfile',	'uses' => 'MainController@getProfile']);

Route::get('/dish',			['as' => 'dish',		'uses' => 'MainController@dishes']);
Route::get('/dish/all', 	['as' => 'dishIndex',	'uses' => 'DishController@index']);
Route::get('/dish/show/{id}',['as' => 'dishShow', 	'uses' => 'DishController@show']);
Route::get('/dish/create',	['as' => 'dishCreate', 	'uses' => 'DishController@getCreate']);
Route::post('/dish/create', [						'uses' => 'DishController@postCreate']);

Route::get('/dish/show/{dishid}/rate/{rating}', ['as' => 'ratingCreate', 'uses' => 'RatingController@getCreate']);

Route::get('/dates/find', ['as' => 'findDates', 'uses' => 'DateController@getSearch']);
Route::post('/dates/find', ['uses' => 'DateController@search']);
Route::get('/createDate', 		['as' => 'createDate', 	'uses' => 'DateController@index']);
Route::post('/createDatePost', 	['as' => 'createDatePost', 	'uses' => 'DateController@create']);

Route::get('/home/chat/{id}', ['uses' => 'ChatController@index']);
Route::post('/home/chat/post/{id}', ['uses' => 'ChatController@create']);

Route::get('/Photo', 			['as' => 'Photo', 		'uses' => 'PhotoController@index']);
Route::post('/Photo', 			['as' => 'PhotoPost', 	'uses' => 'PhotoController@postPicture']);

