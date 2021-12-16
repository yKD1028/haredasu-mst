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
/*
Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/vue', function(){
    return view('app');
});
Route::get('/', function () {
    return view('welcome');
});*/
Auth::routes();

Route::get('/{any}', function(){
    return view('welcome');
})->where('any', '.*');

Route::get('/Reserve', function () {
    return view('Reservepage');
});

Route::post('/api', 'GooglemapController@index');
Route::get('/home', 'HomeController@index')->name('home');
/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
