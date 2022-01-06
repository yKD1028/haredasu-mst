<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});
//予約処理のroute
Route::get('/reserve_page', 'ReserveController@reserve_page');
Route::get('/reserve', 'ReserveController@reserve');
Route::post('/reserve_date', 'ReserveController@reserve_date');
//クレカのroute
Route::get('/pay_info', 'PaymentController@pay_info');
Route::get('/pay_regist', 'PaymentController@pay_regist');
