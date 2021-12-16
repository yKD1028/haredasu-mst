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
// Route::get('/{any}', function () {
//   return view('welcome');
// })->where('any', '.*');

// Route::get('/vue', function () {
//   return view('app');
// });
// Route::get('/', function () {
//   return view('auth.register');
// });

Auth::routes(['verify' => true]);
// middlewareで遷移先の制限
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::group(['middleware' => 'auth'], function () {
  Route::group(['middleware' => 'verified'], function () {
    Route::get('/user_info', 'UsersController@user_info')->name('user_info');
    Route::post('/regist_user_info', 'UsersController@regist_user_info')->name('regist_user_info');
    //payjp
    Route::post('/payment', 'PaymentController@payment');
  });
});

Route::get('/vue', function () {
  return view('app');
});
Route::get('/', function () {
  return view('welcome');
});
Auth::routes();

// Route::get('/{any}', function () {
//   return view('welcome');
// })->where('any', '.*');

Route::get('/Reserve', function () {
  return view('Reservepage');
});

Route::post('/api', 'GooglemapController@index');
