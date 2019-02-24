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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'song'], function() {
    Route::get('/', 'SongCtrl@list')->name('song');

    Route::get('/add', function() { return view(''); });
    Route::get('/edit/{id}', 'SongCtrl@forID');

    Route::post('/create', 'SongCtrl@create');
    Route::post('/update', 'SongCtrl@update');
    Route::post('/delete', 'SongCtrl@delete');
});

Route::group(['prefix' => 'city'], function() {
    Route::get('/', 'CityCtrl@list')->name('city');

    Route::get('/add', function() { return view(''); });
    Route::get('/edit/{id}', 'CityCtrl@forID');
    
    Route::post('/create', 'CityCtrl@create');
    Route::post('/update', 'CityCtrl@update');
    Route::post('/delete', 'CityCtrl@delete');
});

Route::group(['prefix' => 'place'], function() {
    Route::get('/', 'PlaceCtrl@list')->name('place');

    Route::get('/add', function() { return view(''); });
    Route::get('/edit/{id}', 'PlaceCtrl@forID');
    
    Route::post('/create', 'PlaceCtrl@create');
    Route::post('/update', 'PlaceCtrl@update');
    Route::post('/delete', 'PlaceCtrl@delete');
});

Route::group(['prefix' => 'artist'], function() {
    Route::get('/', 'ArtistCtrl@list')->name('artist');

    Route::get('/add', function() { return view(''); });
    Route::get('/edit/{id}', 'ArtistCtrl@forID');
    
    Route::post('/create', 'ArtistCtrl@create');
    Route::post('/update', 'ArtistCtrl@update');
    Route::post('/delete', 'ArtistCtrl@delete');
});

Route::group(['prefix' => 'concert'], function() {
    Route::get('/', 'ConcertCtrl@list')->name('concert');

    Route::get('/add', function() { return view(''); });
    Route::get('/edit/{id}', 'ConcertCtrl@forID');
    
    Route::post('/create', 'ConcertCtrl@create');
    Route::post('/update', 'ConcertCtrl@update');
    Route::post('/delete', 'ConcertCtrl@delete');
});

Route::group(['prefix' => 'artistsong'], function() {
    Route::get('/', 'ArtistSongCtrl@list')->name('artistsong');

    Route::get('/add', function() { return view(''); });
    Route::get('/edit/{artist_id}/{song_id}', 'ArtistSongCtrl@forID');
    
    Route::post('/create', 'ArtistSongCtrl@create');
    Route::post('/delete', 'ArtistSongCtrl@delete');
});

Route::group(['prefix' => 'choise'], function() {
    Route::get('/', 'ChoiseCtrl@list')->name('choise');

    Route::get('/add', function() { return view(''); });
    Route::get('/edit/{id}', 'ChoiseCtrl@forID');
    
    Route::post('/create', 'ChoiseCtrl@create');
    Route::post('/update', 'ChoiseCtrl@update');
    Route::post('/delete', 'ChoiseCtrl@delete');
});