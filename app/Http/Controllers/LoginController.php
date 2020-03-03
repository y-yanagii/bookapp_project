<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
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
    public function create(LoginRequest $request) {
        dd($request);
        return redirect('/');
    }

    // ログアウト処理
    public function logout() {
        return redirect('/');
    }
}
