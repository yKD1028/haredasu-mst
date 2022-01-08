<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
  //
  /**
   * ログイン
   */
  public function login(Request $request)
  {
    $result = false;
    $message = '';
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      $result = true;
    } else {
      $message = 'EmailまたはPasswordが間違っています。';
    }
    return response()->json(['result' => $result, 'message' => $message]);
  }
  /**
   * ログアウト
   */
  public function logout(Request $request)
  {
    $result = true;
    $message = 'ログアウトしました。';
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return response()->json(['result' => $result, 'message' => $message]);
  }
}
