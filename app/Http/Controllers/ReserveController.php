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
    //
  }
  //予約ページリロード時に予約取得
  public function reserve_page()
  {
  }
  //日付選択時に予約取得
  public function reserve_date()
  {
  }
  //個人の予約履歴
  public function user_reserves()
  {
  }
}
