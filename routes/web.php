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
    return redirect('introduction');
});

Route::resource('blogpost/media', 'BlogPostMediaController', ['only' => ['store', 'destroy'], 'as' => 'blogpost']);
Route::delete('blogpost/media', 'BlogPostMediaController@destroyAll')->name('blogpost.media.destroy_all');

Route::resource('photoalbum/media', 'PhotoAlbumMediaController', ['only' => ['store', 'destroy'], 'as' => 'photoalbum']);
Route::delete('photoalbum/media', 'PhotoAlbumMediaController@destroyAll')->name('photoalbum.media.destroy_all');

Route::get('/{example}', 'ExampleController@example')->name('example');