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


//Route::get('/', function () {
//    return view('auth');
//});


Route::get('/', function () {
    return "<html><head><title>Permission Denied!</title></head><body><h3>Error: Permission Denied</h3><br><a href='/gateway'>Go Back</a></body></html>";
});
Route::get('/gateway', 'Auth@show');
Route::post('/validate', 'Auth@validateNIC');
Route::post('/code','Auth@validateCode');
Route::get('/error','Auth@showError');


Route::get('/path', 'Auth@path');
Route::get('aa', function () {
    return "AAA";
});
	

