<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\BookCreateRequest;
use App\User;
use App\Book;
use Crypt;
use Carbon\Carbon;

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
        // TODO 現ページ<=総ページであることのチェック

        // 本情報DB登録
        $bookInfo = new Book();
        $bookInfo->book_name = $request->book_name;
        $bookInfo->price = $request->price;
        $bookInfo->current_page = $request->current_page;
        $bookInfo->total_page = $request->total_page;
        $bookInfo->purchase_type = $request->purchase_type;
        $bookInfo->registered_name = Crypt::decryptString(session('loginName'));

        if ($request->has('book_file')) {
            // ファイルアップロード(ファイル名_yyyymmddHHiiss)
            $now = Carbon::now();
            // ファイル名セット
            $file_name = $now->format('YmdHis') . "_" . $request->file('book_file')->getClientOriginalName();
            $bookInfo->url = $file_name;

            // ファイルアップロード処理
            $request->file('book_file')->storeAs('public', $file_name);
        }

        $bookInfo->save();
        
        // 本情報の全権取得
        $books = Book::latest()->get();

        $request->session()->flash('bookFailed', '※本情報を登録しました!');
        return redirect('/books')->with('books', $books);
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

    // 本情報削除処理
    public function destroy(Request $request) {
        // 本情報デリート処理
        dd($request);

        // 本情報の全権取得
        $books = Book::latest()->get();
        $request->session()->flash('bookFailed', '※本情報を削除しました!');

        return redirect('/books')->with('books', $books);
    }
}
