<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\BookCreateRequest;
use App\User;
use App\Book;
use Crypt;

class BooksController extends Controller
{
    // メイン画面初期表示
    public function index(LoginRequest $request) {

        // TODO ログイン処理
        $loginUser = User::where('name', $request->name)->first();

        if ($loginUser != null && password_verify($request->password, $loginUser->password)) {
            // 本情報の全権取得
            $books = Book::latest()->get();

            // セッションにログイン名を暗号化しセット
            $encryptedName = Crypt::encryptString($request->name);
            session(['loginName' => $encryptedName]);

            return view('books.index')->with('books', $books);
        } else {
            $request->session()->flash('loginFailed', '※ユーザ名、またはパスワードが違います');
            return redirect('/');
        }
    }

    // 本情報新規登録画面表示
    public function new(Request $request) {
        if (session()->has('loginName')) {
            // 登録者名の取得し画面と一緒にcompact()で返す(セッションからデシリアライズしてログイン名取得))
            $registerName = Crypt::decryptString(session('loginName'));
            return view('books.new', compact('registerName'));
        } else {
            return redirect('/');
        }
    }

    // 本情報新規登録処理
    public function create(BookCreateRequest $request) {
        dd($request);
        // 現ページ<=総ページであることのチェック
        return redirect('/');
    }

    // 本情報一覧表示
    public function indexRefresh() {

        if (session()->has('loginName')) {
            // ログイン名がセッションに存在しかつnullではない場合

            // 本情報の全権取得
            $books = Book::latest()->get();

            return view('books.index')->with('books', $books);

        } else {
            // セッション情報にログイン名がないためログイン画面にリダイレクト
            return redirect('/');
        }
        
        //読み出し (view)
        //{{session('kudamono')}}

        //削除
        //session()->forget('kudamono');
    }
}
