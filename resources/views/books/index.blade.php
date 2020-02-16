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
                <div class="col-lg-2">
                    <h2 class="text-success m-2">本棚一覧</h2>
                </div>
                <div class="col-lg-10">
                <button class="btn btn-dark m-2 float-right" href="{{ url('LoginController@logout') }}">ログアウト</button>
                    <button class="btn btn-success m-2 float-right" href="{{ url('BooksController@new') }}">本登録</button>
                </div>
            </div>
        </div>
        <!-- メニューリスト領域一覧領域 -->
        <div class="container" style="height: 700px;">
            <table class="table table-hover">
                <thead>
                    <tr style="background-color: aqua;">
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Laravel入門</td>
                        <td>柳澤　良幸</td>
                        <td>購入済み</td>
                        <td>45%</td>
                        <td>2020/02/14 15:00</td>
                        <td><a>🗑削除</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Laravel入門</td>
                        <td>柳澤　良幸</td>
                        <td>購入済み</td>
                        <td>45%</td>
                        <td>2020/02/14 15:00</td>
                        <td><a>🗑削除</a></td>
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

        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
