<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class BooksController extends Controller
{
    // メイン画面初期表示
    public function index(Request $request) {
        // TODO ログイン処理

        // 更新日時の降順で全件取得
        $users = User::latest()->get();
        
        //dd($request->name); // dump dieの略
        return view('books.index')->with('users', $users);
    }
}
