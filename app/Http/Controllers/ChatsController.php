<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ChatsController extends Controller
{
    // チャット画面一覧表示
    public function index() {
        // 更新日時の降順で全件取得
        $users = User::latest()->get();

        return view("chats.index")->with('users', $users);
    }
}
