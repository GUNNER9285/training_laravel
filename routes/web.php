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
    return view('welcome');
});

//Route::get('/demoone', 'DemoController@index');
Route::post('/demotwo', 'DemoController@demotwo');
Route::match(['get', 'post'], '/demothree', 'DemoController@demothree');
Route::any('/demofour', 'DemoController@demofour');
Route::get('demofive/{id?}', function ($id=123) {
    return 'ID: '.$id;
});
Route::get('demosix/{id}/{name}', function ($id, $name) {
    return 'ID: '.$id.' || NAME: '.$name;
});
Route::prefix('admin')->group(function () {
    Route::match(['get', 'post'], 'demothree', 'DemoController@demothree');
    Route::any('demofour', 'DemoController@demofour');
    //Route::get('/demoone', 'DemoController@index');
});

Route::resource('photos', 'PhotoController');

Route::get('login', 'LoginController@index')->name('login');
Route::get('logout', 'LoginController@logout');
Route::post('login', 'LoginController@authenticate');

//Route::resource('admin/user', 'Admin\UsersController');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('users', 'Admin\UsersController');
    Route::get('/demoone', 'DemoController@index');
});

Route::get('excel', 'DemoController@testexcel');

Route::get('/getUser', 'DemoController@getUser');
Route::get('/chart', 'ChartController@index');