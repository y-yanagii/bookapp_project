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
        <style>
            /* 本情報のrow */
            .bookRow {
                cursor: pointer;
            }

            /* エクスポートのフッタ */
            .exportAnchorlink {
                cursor: pointer;
            }
            /* エクスポート選択色 */
            .activeExport {
                background-color: #38c172 !important;
            }
        </style>
    </head>
    <body>
        <!-- Hedder領域 -->
        <div class="container">
            <div class="row">
                <!-- タイトル領域 -->
                <div class="col-lg-2">
                    <h2 class="text-success m-2">本棚</h2>
                </div>

                <!-- 絞り込みラジオボタン領域 -->
                <div class="col-lg-3 my-2 btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-info active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> 全て
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="option2" autocomplete="off"> 購入前
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="option3" autocomplete="off"> 購入済
                    </label>
                </div>

                <!-- 新規登録、ログアウトボタン領域 -->
                <div class="col-lg-7">
                    <button class="btn btn-dark m-2 float-right" data-toggle="modal" data-target="#logoutModal">ログアウト</button>
                    <button class="btn btn-success m-2 float-right" href="{{ url('BooksController@new') }}">本登録</button>
                </div>
            </div>
        </div>
        <!-- メニューリスト領域一覧領域 -->
        <div class="container" style="height: 700px;">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-info">
                        <th>#</th>
                        <th>タイトル</th>
                        <th>登録者</th>
                        <th>購入区分</th>
                        <th>進捗率</th>
                        <th>更新日時</th>
                        <th>×</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bookRow">
                        <th scope="row">1</th>
                        <td>Laravel入門</td>
                        <td>柳澤　良幸</td>
                        <td>購入済み</td>
                        <td>45%</td>
                        <td>2020/02/14 15:00</td>
                        <td><a>🗑Del</a></td>
                    </tr>
                    <tr class="bookRow">
                        <th scope="row">2</th>
                        <td>Laravel中級</td>
                        <td>柳澤　良幸</td>
                        <td>購入済み</td>
                        <td>30%</td>
                        <td>2020/02/14 15:00</td>
                        <td><a>🗑Del</a></td>
                    </tr>
                    <tr class="bookRow">
                        <th scope="row">3</th>
                        <td>Laravel上級</td>
                        <td>柳澤　良幸</td>
                        <td>購入済み</td>
                        <td>55%</td>
                        <td>2020/02/14 15:00</td>
                        <td><a>🗑Del</a></td>
                    </tr>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Fotter領域 -->
        <div class="container bg-dark mt-4">
            <nav class="nav">
                <a class="nav-link text-light active" href="{{ url('/books') }}">本管理一覧</a>
                <a class="nav-link text-light" href="{{ url('/chats') }}">チャット</a>
                <a class="nav-link text-light exportAnchorlink" data-toggle="modal" data-target=".exportModal-lg">エクスポート</a>
            </nav>
        </div>

        <!-- ↓↓↓本詳細情報モーダル領域↓↓↓ -->
        <!-- ↑↑↑本詳細情報モーダル領域↑↑↑ -->

        <!-- ↓↓↓エクスポートモーダル領域↓↓↓ -->
        <div class="modal fade exportModal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Jsonエクスポート</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                        <table class="table table-hover">
                            <thead class="bg-primary">
                                <tr>
                                <th class="text-white" scope="col">#</th>
                                <th class="text-white" scope="col">タイトル</th>
                                <th class="text-white" scope="col">値段</th>
                                <th class="text-white" scope="col">アマゾンURl</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="exportBook-tr">
                                    <th scope="row">1</th>
                                    <td>Laravel入門</td>
                                    <td>3690円</td>
                                    <td></td>
                                </tr>
                                <tr class="exportBook-tr">
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr class="exportBook-tr">
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                <tr class="exportBook-tr">
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                <tr class="exportBook-tr">
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                <tr class="exportBook-tr">
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                        <button type="button" class="btn btn-primary">エクスポート</button>
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
        <script src="{{ asset('js/books.js') }}"></script>
    </body>
</html>
