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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'LoginController@index');
Route::get('/login/new', 'LoginController@new');
Route::post('/login/create', 'LoginController@create');
Route::get('/logout', 'LoginController@logout');
Route::post('/books', 'BooksController@index');
Route::get('/chats', 'ChatsController@index');
Route::post('/books/create', 'BooksController@create');