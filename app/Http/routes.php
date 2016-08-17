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

Route::get('/', 'HomeController@showWelcome');

Route::get('/sayhello/{name?}', function($name = 'Kings'){

	if($name == 'Chris'){
		return redirect()->action('HomeController@rollDice');
	}
	$data = [
		'name' => $name,
	];
	// dd($data);
	// $data = compact('name'); same as above but variable names must match ////


	return view('my-first-view', $data);
	// return view('my-first-view')->with($data); // exactly the same as above///////
	// return view('my-first-view')->with('name', $name); // with single value
});


Route::get('/uppercase/{word?}', 'HomeController@upperCase');

Route::get('/increment/{number?}', 'HomeController@increment');
// Route::get('/rolldice/{guess}', function($guess){
// 	$randomNum = mt_rand(1,6);
// 	$data = [
// 		'randomNum' => $randomNum,
// 		'guess' => intval($guess),
// 	];
// 	// dd($data);
// 	return view('roll-dice', $data);
// });

Route::get('/roll-dice/{guess?}', 'HomeController@rollDice');



Route::resource('posts', 'PostsController');
// exactly the same as above =======^^^^^^^^
//Route::get('/posts', 'PostsController@index');
//Route::get('/posts/create', 'PostsController@create');
//Route::post('/posts', 'PostsController@store');
//Route::get('/posts/{post}', 'PostsController@show');
//Route::get('/posts/{post}/edit', 'PostsController@edit');
//Route::put('/posts/{post}', 'PostsController@update');
//Route::delete('/posts/{post}/delete', 'PostsController@destroy');