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
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts', 'PostController@fetch')->name('posts.fetch');
Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');
Route::get('/users/{user}', 'UserController@show')->name('user.show');