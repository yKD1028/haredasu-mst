<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
  //
  public function payment(Request $request)
  {
    if (empty($request->get('payjp-token')) && !$request->get('payjp_card_id')) {
      abort(404);
    }

    DB::beginTransaction();

    try {
      // ログインユーザー取得
      $user = auth()->user();
      // シークレットキーを設定
      \Payjp\Payjp::setApiKey(config('payjp.secret_key'));

      //  以前使用したカードを使う場合
      if (!empty($request->get('payjp_card_id'))) {
        $customer = \Payjp\Customer::retrieve($user['payjp_customer_id']);
        // 使用するカードを設定
        $customer->default_card = $request->get('payjp_card_id');
        $customer->save();
        //  既にpayjpに登録済みの場合
      } elseif (!empty($user['payjp_customer_id'])) {
        // カード情報を追加
        $customer = \Payjp\Customer::retrieve($user['payjp_customer_id']);
        $card = $customer->cards->create([
          'card' => $request->get('payjp-token'),
        ]);
        // 使用するカードを設定
        $customer->default_card = $card->id;
        $customer->save();
        //  payjp未登録の場合
      } else {
        // payjpで顧客新規登録 & カード登録
        $customer = \Payjp\Customer::create([
          'card' => $request->get('payjp-token'),
        ]);
        // DBにcustomer_idを登録
        $user->payjp_customer_id = $customer->id;
        $user->save();
      }

      //  支払い処理
      // 新規支払い情報作成
      \Payjp\Charge::create([
        "customer" => $customer->id,
        "amount" => 100,
        "currency" => 'jpy',
      ]);

      DB::commit();

      return redirect()->back()->with('message', '支払いが完了しました');
    } catch (\Exception $e) {
      DB::rollback();

      if (strpos($e, 'has already been used') !== false) {
        return redirect()->back()->with('error-message', '既に登録されているカード情報です');
      }

      return redirect()->back();
    }
  }
  //クレカの登録
  //クレカの変更
  //クレカによる決済
}
