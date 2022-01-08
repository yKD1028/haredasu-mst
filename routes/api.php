<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//   return $request->user();
// });
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
//ログインログアウト登録処理
Route::post('/login', 'AuthUserController@login');
Route::post('/logout', 'AuthUserController@logout');
Route::post('/regist', 'AuthUserController@regist');
//予約処理のroute
Route::get('/reserve_page', 'ReserveController@reserve_page');
Route::post('/reserve', 'ReserveController@reserve');
Route::post('/reserve_date', 'ReserveController@reserve_date');
//クレカのroute
Route::get('/pay_info', 'PaymentController@pay_info');
Route::post('/pay_regist', 'PaymentController@pay_regist');
