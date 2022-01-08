<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestSendMail;

class UsersController extends Controller
{
  //
  // public function __construct()
  // {
  //   $this->middleware('auth');
  //   $this->middleware('verified');
  // }


  public function regist_user_info(Request $post)
  {

    $data = $post->validate([

      'name' => ['required', 'string', 'max:20'],
      'name_kana' => ['required', 'kana', 'max:20'],
      'tell' => ['required', 'string', 'max:12'],
      'zip' => ['required', 'digits:7'],
      'address' => ['required', 'string',  'max:255'],
    ]);
    $user_info = $post->all();
    $user = Auth::user();
    //保存
    $user->fill($user_info)->save();

    return redirect()->back();
  }
  //メール送信
  public function regist_mail(Request $request)
  {
    $email = $request->email;
    Mail::to($email)->send(new TestSendMail($email));
    return redirect()->back();
  }
  //メール認証
  public function hon_regist(Request $request)
  {
    $email = $request->email;
    // return view('test.hon_regist', ['email' => $email]);
    return redirect('/user_page')->with('email', $email);
  }
}
