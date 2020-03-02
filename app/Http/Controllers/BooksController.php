<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;

class BooksController extends Controller
{
    // メイン画面初期表示
    public function index(Request $request) {
        // TODO ログイン処理

        // 更新日時の降順でユーザ情報全件取得
        $users = User::latest()->get();
        // 本情報の全権取得
        $books = Book::latest()->get();
        
        //dd($request->name); // dump dieの略
        return view('books.index')->with('users', $users);
    }

    // 本情報新規登録処理
    public function new(Request $request) {

        return redirect('/');
    }
}
