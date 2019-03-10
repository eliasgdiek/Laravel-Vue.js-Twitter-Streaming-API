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


Route::get('/count_hastag1', 'StepsController@countHastag1');
Route::get('/count_hastag2', 'StepsController@countHastag2');
Route::post('/latest-tweet', 'StepsController@latestTweet');
Route::get('/allnames', 'StepsController@names');