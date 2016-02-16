<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	// In case we every change our mind what's supposed to be on the front page.
	return Redirect::action('PostController@getIndex');
});

// Front-end controllers.
// The first ::get is to force the action() method to not generate /tv/index
Route::get('/tv', 'TvController@getIndex');
Route::controller('tv', 'TvController');

Route::get('/post', 'PostController@getIndex');
Route::controller('post', 'PostController');

// APIs.
// A separate copy of this application could be deployed with only these routes to only
// handle API calls, while letting some other server handle other, more front-endy requests.
// In that theoretical separation you'd convert the frontend application's API controllers to query
// the actual APIs, since the methods are also called directly by the front-end controllers.
Route::group(array('prefix' => 'api'), function()
{
	Route::get('/timeline', 'TimelineController@getIndex');
	Route::controller('timeline', 'TimelineController');
});
