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

Route::group(['prefix'=>'user'],function (){
    Route::middleware(['auth'])->group(function (){
        Route::get('upload','SongController@create')->name('music.upload');  // co van de gi do o day
        Route::post('upload','SongController@store')->name('music.store'); // van de nay la lung
        Route::get('{id}/list-song-user','SongController@listSongUser')->name('music.list.user');
        Route::get('{id}/edit-song', 'SongController@edit')->name('music.edit');
        Route::post('{id}/edit-song', 'SongController@update')->name('music.update');
        Route::get('{id}/delete-song', 'SongController@destroy')->name('music.delete');
    });
});

Route::group(['prefix'=>'songs'], function (){
    Route::get('/','SongController@index')->name('music.index');
    Route::get('/{id}','SongController@show')->name('music.play');
});

