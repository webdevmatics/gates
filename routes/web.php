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
    // return file_put_contents('fb.txt',file_get_contents("php://input"));
});

Route::get('/bot','BotController@bot')->middleware('verifybot');
Route::post('/bot','BotController@bot')->middleware('verifybot');

Route::get('/test',function(){
$str='{"object":"page","entry":[{"id":"1024002644365106","time":1496573939232,"messaging":[{"sender":{"id":"1708919195791262"},"recipient":{"id":"1024002644365106"},"timestamp":1496573939151,"message":{"mid":"mid.$cAAP5pAZSNyVipAdVz1ccsIJ7L3-2","seq":59,"text":"fuyfuyfuyfuy"}}]}]}';
dd(json_decode($str));
});