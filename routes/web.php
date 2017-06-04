<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return File::get('fb.txt');
    // return file_put_contents('fb.txt',file_get_contents("php://input"));
});

Route::get('/bot','BotController@bot')->middleware('verifybot');
Route::post('/bot','BotController@bot');
