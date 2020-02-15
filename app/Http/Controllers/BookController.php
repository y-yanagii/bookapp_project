<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // メイン画面初期表示
    public function index() {
        return ("hhhhhhhhhhhhhhhhhhhh!!!!");
        // 更新日時の降順で全件取得
        // $users = User::latest()->get();
        
        // dd($users->toArray()); // dump dieの略

        // return view('books.index')->with('users', $users);
    }
}
