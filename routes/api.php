<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/registration', 'AuthenticationController@registration')->name('registration');
Route::post('login', 'AuthenticationController@login');
Route::get('user', 'AuthenticationController@getAuthUser');

Route::group(['prefix' => 'news'], function () {
    Route::get('/', 'NewsController@index')->name('listNews');
    Route::post('/add', 'NewsController@store')->name('addNews');
    Route::group(['prefix' => '{news}'], function () {
        Route::post('/update', 'NewsController@update')->name('addNews');
        Route::post('/delete', 'NewsController@destroy')->name('addNews');
    });
});