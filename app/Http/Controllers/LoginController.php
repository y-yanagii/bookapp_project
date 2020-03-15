<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LoginCreateRequest;
use App\User;

class LoginController extends Controller
{
    // ログイン画面初期表示
    public function index() {
        return view('login.index');
    }

    // 新規登録ユーザ画面初期表示
    public function new() {
        return view('login.new');
    }

    // 新規登録ユーザ保存処理
    public function create(LoginCreateRequest $request) {

        // 戻るボタンが押下された場合Back
        if ($request->get('action') === 'back') {
            // 入力画面へ戻る
            return redirect('/');
        }


        $user = new User();
        $user->name = $request->name;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->save();

        // メッセージを返しユーザ登録のアラートを表示
        $request->session()->flash('saveMessage', '新規ユーザを登録しました。');
        return redirect('/');
    }

    // ログアウト処理
    public function logout(Request $request) {
        // セッションの削除
        $request->session()->flush();
        return redirect('/');
    }
}
