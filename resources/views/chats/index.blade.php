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

        <!-- Font AwesomeをCDNで読み込み -->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            /* 左サイドメッセージ */
            .chatting {
                width: 100%;
                text-align: left;
            }
                .says {
                    display: inline-block;
                    position: relative; 
                    margin: 5px 0 0 5px;
                    padding: 10px;
                    max-width: 250px;
                    border-radius: 12px;
                    background: #edf1ee;
                }
                    .says:after {
                        content: "";
                        display: inline-block;
                        position: absolute;
                        top: 3px; 
                        left: -19px;
                        border: 8px solid transparent;
                        border-right: 18px solid #edf1ee;
                        -webkit-transform: rotate(35deg);
                        transform: rotate(35deg);
                    }
                        .says p {
                            margin: 0;
                            padding: 0;
                        }
            /* 右サイドメッセージ */
            .mycomment {
              margin: 10px 0;
              text-align: right;
            }
                .mycomment p {
                    display: inline-block;
                    position: relative; 
                    margin: 0 5px 0 0;
                    padding: 8px;
                    max-width: 250px;
                    border-radius: 12px;
                    background: #30e852;
                    font-size: 15px:
                }
                .mycomment p:after {
                    content: "";
                    position: absolute;
                    top: 3px; 
                    right: -19px;
                    border: 8px solid transparent;
                    border-left: 18px solid #30e852;
                    -webkit-transform: rotate(-35deg);
                    transform: rotate(-35deg);
                }
            
            
        </style>
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
        <!-- チャット領域 -->
        <div class="container" style="height: 700px;">
            <div class="row">
                <!-- チャットヘッダ領域 -->
                <div class="col-3">
                    <div class="">ユーザ一覧<i class="fas fa-meteor ml-1"></i></div>
                </div>
                <div class="col-9 bg-primary float-right">
                    <div class="text-white">● ユーザA</div>
                </div>
            </div>
            <!-- ユーザ一覧 -->
            <div class="row">
                <div class="col-3">
                    <ul class="list-group list-group-flush" style="height: 670px; overflow-x: scroll; border-left: solid 1px; border-right: solid 1px; border-radius: 1%;">
                        <li class="list-group-item active"><i class="fas fa-user-astronaut"></i>User-A</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-B</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-C</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-D</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-E</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-F</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-G</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-H</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-I</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-J</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-K</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-L</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-M</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-N</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-O</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-P</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-Q</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-R</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-S</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-T</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-U</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-V</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-W</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-X</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-Y</li>
                        <li class="list-group-item"><i class="fas fa-user-astronaut"></i>User-Z</li>
                    </ul>
                </div>
                <div class="col-9 bg-secondary">    
                    <!-- タイムラインメッセージ部分 -->
                    <div id="bms_messages" style="height: 93%;">
                        <!--メッセージ（左側）-->
                        <div class="chatting">
                            <div class="says">
                                <p>左ふきだし文</p>
                            </div>
                        </div>
                        <!--メッセージ（右側）-->
                        <div class="mycomment">
                            <p>
                            右ふきだし文
                            </p>
                        </div>
                    </div>

                    <div style="display: flex;">
                        <textarea name="message" id="message" class="col-11 mr-2" placeholder="メッセージを入力してください" style="height: 30px;">
                        </textarea>
                        <button class="btn btn-primary col-1" style="height:30px; padding-top: 4px;">送信</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fotter領域 -->
        <div class="container bg-dark mt-4">
            <nav class="nav">
                <a class="nav-link text-light" href="{{ url('/books') }}">本管理一覧</a>
                <a class="nav-link text-light active" href="{{ url('/chats') }}">チャット</a>
                <a class="nav-link text-light" href="#">エクスポート</a>
            </nav>
        </div>
        <script src="{{ asset('js/books.js') }}"></script>
    </body>
</html>