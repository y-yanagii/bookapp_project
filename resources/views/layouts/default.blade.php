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
            /* ボタン共通 */
            .btn {
                border-radius: 1.25rem !important;
            }

            /* 以下メイン画面スタイル */
            /* 本情報のrow */
            .bookRow {
                cursor: pointer;
            }

            /* 本情報リストを囲う親DIV */
            .booksInfoListDiv {
                height: 670px;
                overflow-y: scroll;
            }

            /* 本情報リストの画像 */
            .bookRow-thumbnail {
                width: 50px;
                height: 60;
            }

            /* 本情報リストのtd */
            .booksInfoListTable td {
                vertical-align: middle !important;
                white-space: nowrap;
                text-overflow: ellipsis;
                overflow: hidden;
                max-width: 100px;
            }

            /* エクスポートのフッタ */
            .exportAnchorlink {
                cursor: pointer;
            }
            /* エクスポート選択色 */
            .activeExport {
                background-color: #38c172 !important;
            }

            /* 本詳細情報のimgDiv */
            .bookImgDiv {
                text-align: center;
            }
            /* 本詳細情報の現ページ／総ページのDiv */
            .current-total-pageDiv {
                display: flex;
            } 
            /* 現ページ／総ページのスラッシュ */
            .slashPageSpan {
                padding-top: 7px;
            }

            /* 本詳細情報のinput */
            .book-info-modal-lg input {
                padding: 8px;
                border-radius: 12px;
            }

            /* 本の画像領域 */
            .bookImgDiv {
                background-color: silver;
                padding: 4px;
                border-radius: 12px;
            }

            /* 以下チャット画面スタイル */
            /* メッセージ入力テキストエリア */
            .messeageArea {
                max-height: 33px;
            }

            /* 左サイドメッセージ */
            .chatting {
                width: 100%;
                margin: 10px 0;
                text-align: left;
            }
                .chatting p {
                    display: inline-block;
                    position: relative; 
                    margin: 5px 0 0 5px;
                    padding: 8px;
                    max-width: 250px;
                    border-radius: 12px;
                    background: #edf1ee;
                }
                    .chatting p:after {
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
                    font-size: 15px;
                    text-align: left;
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
            
            /* エクスポートテーブルの親DIV */
            .exportModalTablesDiv {
                height: 500px;
                overflow-y: scroll;
            }

            /* エクスポートのフッタ */
            .exportAnchorlink {
                cursor: pointer;
            }
            /* エクスポート選択色 */
            .activeExport {
                background-color: #38c172 !important;
            }

            /* フッター領域 */
            .fotterDiv {
                border-radius: 12px;
            }

            /* チャット画面のcontainer */
            .chatsContainer {
                height: 710px;
            }

            /* チャット画面のユーザ一覧領域 */
            .usersUl {
                height: 670px;
                overflow-x: scroll;
                border-left: solid 1px;
                border-right: solid 1px;
                border-radius: 1%;
            }

            /* メッセージ入力、送信領域div */
            .messageInputDiv {
                display: flex;
            }

            /* チャット画面のメッセージ領域 */
            #bms_messages {
                height: 609px;
                overflow-y: scroll;
                padding: 14px;
                margin-bottom: 11px;
            }

            /* チャット画面のメッセージ送信ボタン */
            .messageSubmitBtn {
                height:30px;
                padding-top: 4px;
            }

            /* チャット画面のメッセージ入力テキストエリア */
            #message {
                height: 33px;
            }

            /* エクスポートモーダルのタイトル領域 */
            .exportBookTitle {
                vertical-align: middle !important;
                white-space: nowrap;
                text-overflow: ellipsis;
                overflow: hidden;
                max-width: 50px;
            }
        </style>
    </head>
    <body style='background-image: url("/storage/20200319130750_book_desctop.png");'>
        @yield('content')
        <!-- Fotter領域 -->
        <div class="container bg-dark mt-4 fotterDiv">
            <nav class="nav">
                <a class="nav-link text-light active" href="{{ action('BooksController@indexRefresh') }}">本管理一覧</a>
                <a class="nav-link text-light" href="{{ url('/chats') }}">チャット</a>
                <a class="nav-link text-light exportAnchorlink" data-toggle="modal" data-target=".exportModal-lg">エクスポート</a>
            </nav>
        </div>

        <!-- ↓↓↓エクスポートモーダル領域↓↓↓ -->
        <div id="jsonExportModalDiv" class="modal fade exportModal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Jsonエクスポート</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body exportModalTablesDiv">
                        <table class="table table-hover">
                            <thead class="bg-primary">
                                <tr>
                                <th class="text-white" scope="col">#</th>
                                <th class="text-white" scope="col">タイトル</th>
                                <th class="text-white" scope="col">値段</th>
                                <th class="text-white" scope="col">アマゾンURl</th>
                                </tr>
                            </thead>
                            <tbody class="exportBookBody">
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                        <button type="button" class="btn btn-primary exportBtn">エクスポート</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ↑↑↑エクスポートモーダル領域↑↑↑ -->

        <!-- ↓↓↓ログアウトモーダル領域↓↓↓ -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">ログアウト</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ログアウトします。よろしいですか？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                    <form action="{{ url('/logout') }}" method="get">
                        <button type="submit" class="btn btn-primary">OK</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <!-- ↑↑↑ログアウトモーダル領域↑↑↑ -->
    </body>
</html>
