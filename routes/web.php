<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('home-page');
});

Route::get('home-page', 'Home\HomeController@index')->name('index');
Route::get('login', 'Auth\LoginController@showFormLogin')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'UserController@create')->name('register');
Route::post('register', 'UserController@store');

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', 'UserController@index')->name('admin.dashboard');
    Route::group(['prefix' => 'user'], function () {
        Route::get('list', 'UserController@getAll')->name('user.list');
        Route::get('search', 'UserController@search')->name('user.search');
        Route::get('create-new', 'UserController@create')->name('user.create');
        Route::post('create-new', 'UserController@store');
        Route::get('{id}/delete', 'UserController@delete')->name('user.delete');
        Route::get('{id}/edit', 'UserController@edit')->name('user.edit');
        Route::post('{id}/edit', 'UserController@update');
        Route::get('{id}/detail', 'UserController@userDetail')->name('user.detail');
        Route::get('{id}/change-password', 'UserController@changePass')->name('user.changePass');
        Route::post('{id}/change-password', 'UserController@updatePass');
    });
});

Route::group(['prefix' => 'user'], function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('upload', 'SongController@create')->name('music.upload');  // co van de gi do o day
        Route::post('upload', 'SongController@store')->name('music.store'); // van de nay la lung
    });
});

Route::group(['prefix' => 'songs'], function () {
    Route::get('/', 'Music\SongController@index')->name('music.index');
    Route::get('/{id}', 'Music\SongController@show')->name('music.play');
});


