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
                <div class="col-lg-2">
                    <h2 class="text-success m-2">Bookshelf</h2>
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
                <button class="btn btn-dark m-2 float-right" href="{{ url('LoginController@logout') }}">ログアウト</button>
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
                        <th>Title</th>
                        <th>Registered person</th>
                        <th>Purchase type</th>
                        <th>Progress</th>
                        <th>Update</th>
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
        <div class="container bg-dark">
            <nav class="nav">
                <a class="nav-link text-light active" href="{{ url('/books') }}">本管理一覧</a>
                <a class="nav-link text-light" href="{{ url('/chats') }}}">チャット</a>
                <a class="nav-link text-light" href="#">エクスポート</a>
            </nav>
        </div>

        <!-- ↓↓↓本詳細情報モーダル領域↓↓↓ -->
        <!-- ↑↑↑本詳細情報モーダル領域↑↑↑ -->
        <script src="{{ asset('js/books.js') }}"></script>
    </body>
</html>
