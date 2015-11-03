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

Route::get('/register', 	['as' => 'register', 	'uses' => 'Auth\AuthController@register']);
Route::post('/register',	[ 						'uses' => 'Auth\AuthController@postRegister' ]);		

Route::get('/home',			['as' => 'dashboard', 	'uses' => 'mainController@index']);

Route::get('/dish',			['as' => 'dish',		'uses' => 'mainController@dishes']);
Route::get('/dish/all', 	['as' => 'dishIndex',	'uses' => 'DishController@index']);

