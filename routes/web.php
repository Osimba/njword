<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index');

Route::get('/books', 'HomeController@getBook');
Route::get('/books/{book}', 'HomeController@getBookChapters');
Route::get('/books/{book}/status', 'HomeController@getStatus');

Route::post('/signatures', 'SignaturesController@signature')->name('signature');
Route::post('/many-signatures', 'SignaturesController@manySignatures')->name('mSignatures');