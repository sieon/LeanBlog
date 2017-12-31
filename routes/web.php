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

Auth::routes();

Route::get('/', 'PagesController@home')->name('home');
Route::get('blog', 'PagesController@blog')->name('blog');
Route::get('about', 'PagesController@about')->name('about');
Route::get('help', 'PagesController@help')->name('help');

Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

Route::resource('posts', 'PostsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);