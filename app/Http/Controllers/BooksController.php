<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\BookCreateRequest;
use App\User;
use App\Book;

class BooksController extends Controller
{
    // メイン画面初期表示
    public function index(LoginRequest $request) {
        // TODO ログイン処理
        $loginUser = User::where('name', $request->name)->first();

        if ($loginUser != null && password_verify($request->password, $loginUser->password)) {
            // 更新日時の降順でユーザ情報全件取得
            $users = User::latest()->get();
            // 本情報の全権取得
            $books = Book::latest()->get();
            //dd($request->name); // dump dieの略
            return view('books.index')->with('users', $users);
        } else {
            $request->session()->flash('loginFailed', '※ユーザ名、またはパスワードが違います');
            return redirect('/');
        }
    }

    // 本情報新規登録処理
    public function create(BookCreateRequest $request) {
        dd($request);
        // 現ページ<=総ページであることのチェック
        return redirect('/');
    }
}
