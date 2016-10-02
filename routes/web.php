<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
	$api->get('test', function () {
        return 'It is ok';
    });
});
// ['middleware' => 'api.auth']
$api->version('v1', [], function ($api) {
    $api->get('users', 'App\Http\Controllers\Api\UserController@getUsers');

    $api->group([], function ($api) {
		// $api->get('cases', 'App\Api\V1\Controllers\CasesController@index');
		// $api->get('cases/{id}', 'App\Api\V1\Controllers\CasesController@show');
		// $api->post('cases', 'App\Api\V1\Controllers\CasesController@store');
		// $api->put('cases/{id}', 'App\Api\V1\Controllers\CasesController@update');
		// $api->delete('cases/{id}', 'App\Api\V1\Controllers\CasesController@destroy');
		$api->resource('cases', 'App\Http\Controllers\Api\CasesController');
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index');

