<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserve;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
  //予約
  public function reserve(Request $request)
  {
    //useridの取得
    //DBに送信
    //return
  }
  //予約ページリロード時に予約取得
  public function reserve_page()
  {
    //本日の日付の取得
    //日付に応じたデータの取得
    //returnで返す
  }
  //日付選択時に予約取得
  public function reserve_date(Request $date)
  {
    //日付データに基づいたデータの取得
    //returnで返す
  }
  //個人の予約履歴
  public function user_reserves()
  {
    //useridの取得
    //useridに基づいた予約データの取得
    //returnで返す
  }
}
