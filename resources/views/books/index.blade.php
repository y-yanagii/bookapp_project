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
        <div class="container bg-success">

        </div>
        <!-- Fotter領域 -->
        <div class="container bg-dark">

        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
