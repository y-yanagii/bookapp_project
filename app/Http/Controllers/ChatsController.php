<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Crypt;

class ChatsController extends Controller
{
    // チャット画面一覧表示
    public function index() {
        // 自分以外のユーザを更新日時の降順で取得
        $users = User::whereNotIn('name', [Crypt::decryptString(session('loginName'))])->orderBy('updated_at', 'desc')->get();
        return view("chats.index")->with('users', $users);
    }

    // チャット一覧表示
    public function getChats($id) {
        // セッションにログインIDがない場合
        if (!session()->has('loginId')) {
            // ログインユーザのidを取得
            $currentUser = User::where('name', [Crypt::decryptString(session('loginName'))])->first();
            session(['loginId' => $currentUser->id]);

            // ログインID
            $currentId = $currentUser->id;
            // 選択したユーザID
            $choiceId = $id;
            // ログインユーザから選択したユーザへのメッセージと、選択したユーザからログインユーザへのメッセージを取得
            $messages =  Message::where(function($messages) use ($currentId, $choiceId) {
                $messages->where('id', '=', $currentId)
                      ->where('destination_id', '=', $choiceId);
            })->orWhere(function($messages) use ($currentId, $choiceId) {
                $messages->where('id', '=', $choiceId)
                      ->where('destination_id', '=', $currentId);
            })->orderBy('created_at', 'asc')->get();

            return response()->json(['messages' => $messages, 'currentId' => $currentUser->id]);
        } else {
            $currentUser = User::where('id', session('loginId'))->first();

            // ログインID
            $currentId = $currentUser->id;
            // 選択したユーザID
            $choiceId = $id;
            // ログインユーザから選択したユーザへのメッセージと、選択したユーザからログインユーザへのメッセージを取得
            $messages =  Message::where(function($messages) use ($currentId, $choiceId) {
                $messages->where('id', '=', $currentId)
                      ->where('destination_id', '=', $choiceId);
            })->orWhere(function($messages) use ($currentId, $choiceId) {
                $messages->where('id', '=', $choiceId)
                      ->where('destination_id', '=', $currentId);
            })->orderBy('created_at', 'asc')->get();

            return response()->json(['messages' => $messages, 'currentId' => $currentUser->id]);
        }
    }

    // メッセージ送信保存処理
    public function add(Request $request) {
        // TODOメッセージ送信時の通信でエラ〜ここから！！！！！！！！
        $message = Message::create([
            'id' => session('loginId'),
            'message' => $request->message,
            'destination_id' => $request->id
        ]);

        return response()->json(['message' => $message]);
    }
}
