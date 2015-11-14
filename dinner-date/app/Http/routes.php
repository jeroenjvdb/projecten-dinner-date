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


Route::get('/home',			['as' => 'dashboard', 	'uses' => 'mainController@index']);

Route::get('/dish',			['as' => 'dish',		'uses' => 'mainController@dishes']);
Route::get('/dish/all', 	['as' => 'dishIndex',	'uses' => 'DishController@index']);
Route::get('/dish/{id}',	['as' => 'oneDish', 	function($id){
	$dish = App\Dish::findorfail($id);

	$ingredientArray = explode(';', $dish->ingredients);
        
    foreach ($ingredientArray as $key => $value) {

        if($value == "")
        {
            unset($favoriteDish[$key]);
        }
    }

    $dish->ingredientArray = $ingredientArray;

	$data = ['dish' => $dish];
	return view('dishes.index')->with($data);
}]);

Route::get('/dates/find', ['as' => 'findDates', function(){
	$dates = App\Date::all();
	$data = ['dates' => $dates];

	return view('dates.search')->with($data);
}]);

Route::post('/dates/find', [function(Request $request){
	$dates = App\Date::all();
	foreach ($dates as $date) {
		// $date->host()->id;
	 $date->host = $date->host()->first();
	 $date->host->pic = $date->host->pictures()->first();
	}
	return response()->json($dates);
}]);

Route::get('/home/chat/{id}', [function($id){
	$messages = App\Chat::where('sender_id', '=', $id)->orwhere('receiver_id', '=', $id)->get();
	
	foreach($messages as $message)
	{
		$message->sender = $message->sender()->first();
		// $message->sender->pic = $message->sender()->pictures()->first()
	}

	// var_dump($messages);
	return response()->json($messages);
}]);
Route::post('/home/chat/post/{id}', ['uses' => 'ChatController@create']);


Route::get('/createDate', 		['as' => 'createDate', 	'uses' => 'DateController@index']);
Route::post('/createDatePost', 	['as' => 'createDatePost', 	'uses' => 'DateController@create']);


//test-------------------------------------

Route::get('/Photo', 			['as' => 'Photo', 		'uses' => 'PhotoController@index']);
Route::post('/Photo', 			['as' => 'PhotoPost', 	'uses' => 'PhotoController@postPicture']);
