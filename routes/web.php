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

Route::get('/', function () {

    $books = App\Book::all();
    $chapters = App\Chapter::all();
    
    return view('welcome', compact('books', 'chapters'));
})->middleware('auth');

Auth::routes();

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/books', 'HomeController@getBook');
Route::get('/books/{book}', 'HomeController@getBookChapters');

Route::post('/signatures', 'SignaturesController@signature')->name('signature');
Route::post('/evaluations', 'SignaturesController@evaluation')->name('evaluation');
Route::post('/many-signatures', 'SignaturesController@manySignatures')->name('mSignatures');
Route::post('/many-evaluations', 'SignaturesController@manyEvaluations')->name('mEvaluations');
