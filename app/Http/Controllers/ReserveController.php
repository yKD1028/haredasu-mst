<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserve;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReserveController extends Controller
{
  //予約
  public function reserve(Request $request)
  {
    DB::beginTransaction();
    try {
      // ログインユーザー取得
      $user = auth()->user();
      //useridの取得
      $uid = Auth::id();
      //DBに送信
      $params = Reserve::create([
        'user_id' => $uid,
        'latitude' => $request['latirude'],
        'longitude' => $request['longitude'],
        'address' => $request['address'],
        'date' => $request['date'],
        'start_time' => $request['start_time'],
        'end_time' => $request['end_time'],
        'area' => $request['area'],
        'drone' => $request['drone'],
        'cost' => $request['cost'],
      ]);
      DB::commit();
      //return
      return;
    } catch (\Exception $e) {
      DB::rollback();

      if (strpos($e, 'has already been used') !== false) {
        return $msg = "失敗";
      }
    }
  }
  //予約ページリロード時に予約取得
  public function reserve_page()
  {
    //本日の日付の取得
    $toDay = now()->format('Y-m-d');
    //日付に応じたデータの取得
    $reserves = Reserve::where('date',  $toDay)->get();
    //returnで返す
    $user = Auth::User();
    return $user;
    return  $reserves;
  }
  //日付選択時に予約取得
  public function reserve_date(Request $request)
  {
    $date = $request->day;
    //日付データに基づいたデータの取得
    $reserves = Reserve::where('date',  $date)->get();
    //returnで返す
    return $reserves;
  }
  //個人の予約履歴
  public function user_reserves()
  {
    //useridの取得
    //useridに基づいた予約データの取得
    //returnで返す
  }
}
