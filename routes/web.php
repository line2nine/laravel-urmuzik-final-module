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
    return redirect('home');
});

Route::get('home', 'Home\HomeController@index')->name('index');
Route::get('login', 'Auth\LoginController@showFormLogin')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'UserController@create')->name('register');
Route::post('register', 'UserController@store');
Route::get('contact', 'Home\HomeController@showContact')->name('contact');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle')->name('auth.google');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback')->name('googleCallBack');

Route::group(['prefix' => 'user'], function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('{id}/profile', 'UserController@userProfile')->name('user.profile');
        Route::get('{id}/edit-profile', 'UserController@edit')->name('user.edit.profile');
        Route::post('{id}/edit-profile', 'UserController@update');
        Route::get('{id}/change-password', 'UserController@changePassProfile')->name('user.changePass.profile');
        Route::post('{id}/change-password', 'UserController@updatePassProfile');
        Route::get('upload', 'Music\SongController@create')->name('music.upload');
        Route::post('upload', 'Music\SongController@store')->name('music.store');
        Route::get('{id}/list-song-user', 'Music\SongController@listSongUser')->name('music.list.user');
        Route::get('{id}/edit-song', 'Music\SongController@edit')->name('music.edit');
        Route::post('{id}/edit-song', 'Music\SongController@update')->name('music.update');
        Route::get('{id}/delete-song', 'Music\SongController@destroy')->name('music.delete');
        Route::group(['prefix' => 'my-playlist'], function () {
            Route::post('add', 'Home\PlaylistController@create')->name('playlist.add');
            Route::get('detail/{playlist_id}/add-song',
                'Home\DetailPlaylistController@addSong')->name('playlist.add-song');
            Route::post('detail/{playlist_id}/add-song',
                'Home\DetailPlaylistController@storeSong')->name('playlist.store-song');
            Route::get('detail/{playlist_id}/{song_id}/delete',
                'Home\DetailPlaylistController@deleteSong')->name('playlist.delete-song');
            Route::get('/', 'Home\PlaylistController@myPlaylist')->name('my-playlist');
            Route::get('/{playlist_id}/delete', 'Home\PlaylistController@delete')->name('my-playlist.delete');
            Route::post('/{playlist_id}/edit', 'Home\PlaylistController@update')->name('my-playlist.update');
        });
        Route::group(['prefix' => 'comments'], function () {
            Route::post('{song_id}/', 'CommentController@addNewCommentSong')->name('comments.song');
        });
        Route::get('{song_id}/song-add-playlists', 'Music\SongController@addSongToPlaylists')->name('songAddToPlaylists');
        Route::post('{song_id}/song-add-playlists', 'Music\SongController@storeSongToPlaylists')->name('songAddToPlaylists.store');
    });
});

Route::group(['prefix' => 'playlist'], function () {
    Route::get('/', 'Home\PlaylistController@index')->name('playlist.index');
    Route::get('/{playlist_id}/detail', 'Home\DetailPlaylistController@index')->name('playlist.detail');
    Route::get('/{playlist_id}/detail/{song_id}/play', 'Home\DetailPlaylistController@play')->name('playlist.play');
});

Route::group(['prefix' => 'songs'], function () {
    Route::get('/', 'Music\SongController@index')->name('music.index');
    Route::get('/{id}/play', 'Music\SongController@show')->name('music.play');
    Route::middleware(['auth'])->group(function () {
        Route::get('/{id}/play/like','LikeController@like')->name('music.like');
        Route::get('/{id}/play/unlike','LikeController@unlike')->name('music.unlike');
    });
});

Route::group(['prefix'=>'artists'],function (){
    Route::get('/', 'Music\ArtistController@list')->name('artist.index');
    Route::get('/{id}/songs', 'Music\ArtistController@show')->name('artist.song');
    Route::get('/{artist_id}/songs/{song_id}/play','Music\ArtistController@play')->name('artist.play');
});

Route::get('search/keyword', 'Music\SongController@searchHome')->name('search.home');

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
        Route::group(['prefix' => 'song'], function () {
            Route::get('list', 'Music\SongController@indexDashboard')->name('song.dashboard.list');
            Route::get('search', 'Music\SongController@search')->name('song.dashboard.search');
            Route::get('create-new', 'Music\SongController@createDashboard')->name('song.dashboard.create');
            Route::post('create-new', 'Music\SongController@storeDashboard');
            Route::get('{id}/delete', 'Music\SongController@destroyDashboard')->name('song.dashboard.delete');
            Route::get('{id}/edit', 'Music\SongController@editDashboard')->name('song.dashboard.edit');
            Route::post('{id}/edit', 'Music\SongController@updateDashboard');
            Route::get('{id}/detail', 'Music\SongController@songDetailDashboard')->name('song.dashboard.detail');
        });
        Route::group(['prefix' => 'category'], function () {
            Route::get('list', 'Music\CategoryController@index')->name('category.list');
            Route::get('search', 'Music\CategoryController@search')->name('category.search');
            Route::get('create-new', 'Music\CategoryController@create')->name('category.create');
            Route::post('create-new', 'Music\CategoryController@store');
            Route::get('{id}/delete', 'Music\CategoryController@destroy')->name('category.delete');
            Route::get('{id}/edit', 'Music\CategoryController@edit')->name('category.edit');
            Route::post('{id}/edit', 'Music\CategoryController@update');
            Route::get('{id}/detail', 'Music\CategoryController@categoryDetail')->name('category.detail');
        });
        Route::group(['prefix' => 'artist'], function () {
            Route::get('list', 'Music\ArtistController@index')->name('artist.list');
            Route::get('search', 'Music\ArtistController@search')->name('artist.search');
            Route::get('create-new', 'Music\ArtistController@create')->name('artist.create');
            Route::post('create-new', 'Music\ArtistController@store');
            Route::get('{id}/delete', 'Music\ArtistController@destroy')->name('artist.delete');
            Route::get('{id}/edit', 'Music\ArtistController@edit')->name('artist.edit');
            Route::post('{id}/edit', 'Music\ArtistController@update');
            Route::get('{id}/detail', 'Music\ArtistController@artistDetail')->name('artist.detail');
        });
    });
});
