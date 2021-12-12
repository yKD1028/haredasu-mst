<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
  //
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('verified');
  }
  public function user_info()
  {
    $user = Auth::User();
    return view('test.user_info', ['user' => $user]);
  }
  public function regist_user_info(Request $post)
  {
    $data = $post->validate([

      'first_name' => ['required', 'string', 'max:20'],
      'last_name' => ['required', 'string', 'max:20'],
      'first_name_kana' => ['required', 'kana', 'max:20'],
      'last_name_kana' => ['required', 'kana', 'max:20'],
      'tell' => ['required', 'string', 'max:12'],
      'zip' => ['required', 'digits:7'],
      'address' => ['required', 'string',  'max:255'],
    ]);
    $user_info = $post->all();
    $user = Auth::user();
    //保存
    $user->fill($user_info)->save();
    $end = $this->user_info();
    return $end;
  }
}
