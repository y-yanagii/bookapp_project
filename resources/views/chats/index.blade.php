<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- Hedder領域 -->
        <div class="container">
            <div class="row">
                <!-- タイトル領域 -->
                <div class="col-lg-6">
                    <h2 class="text-primary m-2 float-left">グループチャット</h2>
                </div>
                <!-- 新規登録、ログアウトボタン領域 -->
                <div class="col-lg-6">
                    <button class="btn btn-dark m-2 float-right" href="{{ url('LoginController@logout') }}">ログアウト</button>
                </div>
            </div>
        </div>
        <!-- メニューリスト領域一覧領域 -->
        <div class="container" style="height: 700px;">
            <div class="row">
                <div class="col-3">

                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <!--  -->
                    <!-- チャットの外側部分① -->
                    <div id="bms_messages_container">
                        <!-- ヘッダー部分② -->
                        <div id="bms_chat_header">
                            <!--ステータス-->
                            <div id="bms_chat_user_status">
                                <!--ステータスアイコン-->
                                <div id="bms_status_icon">●</div>
                                <!--ユーザー名-->
                                <div id="bms_chat_user_name">ユーザー</div>
                            </div>
                        </div>

                        <!-- タイムライン部分③ -->
                        <div id="bms_messages">

                            <!--メッセージ１（左側）-->
                            <div class="bms_message bms_left">
                                <div class="bms_message_box">
                                    <div class="bms_message_content">
                                        <div class="bms_message_text">ほうほうこりゃー便利じゃないか</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bms_clear"></div><!-- 回り込みを解除（スタイルはcssで充てる） -->

                            <!--メッセージ２（右側）-->
                            <div class="bms_message bms_right">
                                <div class="bms_message_box">
                                    <div class="bms_message_content">
                                        <div class="bms_message_text">うん、まあまあいけとるな</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bms_clear"></div><!-- 回り込みを解除（スタイルはcssで充てる） -->
                        </div>

                        <!-- テキストボックス、送信ボタン④ -->
                        <div id="bms_send">
                            <textarea id="bms_send_message"></textarea>
                            <div id="bms_send_btn">送信</div>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
        <!-- Fotter領域 -->
        <div class="container bg-dark">
            <nav class="nav">
                <a class="nav-link text-light" href="{{ url('/books') }}">本管理一覧</a>
                <a class="nav-link text-light active" href="{{ url('/chats') }}">チャット</a>
                <a class="nav-link text-light" href="#">エクスポート</a>
            </nav>
        </div>

        <!-- ↓↓↓本詳細情報モーダル領域↓↓↓ -->
        <!-- ↑↑↑本詳細情報モーダル領域↑↑↑ -->
        <script src="{{ asset('js/books.js') }}"></script>
    </body>
</html>
