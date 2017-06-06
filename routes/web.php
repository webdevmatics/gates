<?php

use Illuminate\Support\Facades\File;

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
});

Route::get('/bot','BotController@bot')->middleware('verifybot');
Route::post('/bot','BotController@bot')->middleware('verifybot');

Route::get('/policy', function () {
	$txt="we do not reveal any user information to public.";
	return $txt;
});