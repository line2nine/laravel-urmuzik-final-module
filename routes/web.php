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

Route::group(['prefix' => 'user'], function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('upload', 'Music\SongController@create')->name('music.upload');
        Route::post('upload', 'Music\SongController@store')->name('music.store');
        Route::get('{id}/list-song-user', 'Music\SongController@listSongUser')->name('music.list.user');
        Route::get('{id}/edit-song', 'Music\SongController@edit')->name('music.edit');
        Route::post('{id}/edit-song', 'Music\SongController@update')->name('music.update');
        Route::get('{id}/delete-song', 'Music\SongController@destroy')->name('music.delete');
        Route::post('playlist/add', 'Home\PlaylistController@create')->name('playlist.add');
    });
});

Route::group(['prefix' => 'playlist'], function () {
    Route::get('/', 'Home\PlaylistController@index')->name('playlist.index');
});

Route::group(['prefix' => 'songs'], function () {
    Route::get('/', 'Music\SongController@index')->name('music.index');
    Route::get('/{id}/play', 'Music\SongController@show')->name('music.play');
});

Route::middleware(['auth', 'check.role'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('dashboard', 'UserController@index')->name('admin.dashboard');
        Route::group(['prefix' => 'user'], function () {
            Route::get('list', 'UserController@getAll')->name('user.list');
            Route::get('search', 'UserController@search')->name('user.search');
            Route::get('create-new', 'UserController@createAtDashboard')->name('user.create');
            Route::post('create-new', 'UserController@storeAtDashboard');
            Route::get('{id}/delete', 'UserController@destroy')->name('user.delete');
            Route::get('{id}/edit', 'UserController@editAtDashboard')->name('user.edit');
            Route::post('{id}/edit', 'UserController@updateAtDashboard');
            Route::get('{id}/detail', 'UserController@userDetail')->name('user.detail');
            Route::get('{id}/change-password', 'UserController@changePass')->name('user.changePass');
            Route::post('{id}/change-password', 'UserController@updatePass');
        });
        Route::group(['prefix' => 'category'], function () {
            Route::get('list', 'Music\CategoryController@index')->name('category.list');
            Route::get('create-new', 'Music\CategoryController@create')->name('category.create');
            Route::post('create-new', 'Music\CategoryController@store');
            Route::get('{id}/delete', 'Music\CategoryController@destroy')->name('category.delete');
            Route::get('{id}/edit', 'Music\CategoryController@edit')->name('category.edit');
            Route::post('{id}/edit', 'Music\CategoryController@update');
            Route::get('{id}/detail', 'Music\CategoryController@userDetail')->name('category.detail');
        });
    });
});
