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

Route::get('user/createpost','User\PostController@create')->name('user.post.create');
Route::post('user/createpost', 'User\PostController@store')->name('user.post.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/fileupload','FileUploadController@store')->name('user.file.store');
