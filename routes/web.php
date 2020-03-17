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
Route::get('/books', 'BooksController@indexRefresh');
Route::get('/books/new', 'BooksController@new');
Route::post('/books/create', 'BooksController@create');
Route::get('/books/{book_id}/edit', 'BooksController@edit')->where('book_id', '[0-9]+');
Route::post('/books/{id}', 'BooksController@update')->where('id', '[0-9]+');
Route::post('/books/destroy/{id}', 'BooksController@destroy');
Route::get('/books/search/{purchaseType}', 'BooksController@bookRefine');
Route::get('/chats', 'ChatsController@index');
Route::post('/chats/add', 'ChatsController@add');
Route::get('/chats/{id}', 'ChatsController@getChats')->where('id', '[0-9]+');
Route::get('/export', 'BooksController@getBookJson');
Route::post('/export/jsonoutput', 'BooksController@outputJson');