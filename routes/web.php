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

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('/books', 'BooksController')->names('books');
    Route::resource('/authors', 'AuthorsController')->names('authors');
    Route::get('/parse', 'HomeController@parse')->name('parse');
    Route::post('/parseRequest', 'HomeController@parseRequest')->name('parseRequest');
});
