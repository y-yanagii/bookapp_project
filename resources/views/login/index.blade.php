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
            /* ボタン共通 */
            .btn {
                border-radius: 1.25rem !important;
            }

            /* ログイン新規登録モーダル領域 */
            #newLoginModal input {
                padding: 8px;
                border-radius: 12px;
            }

            /* ログイン画面inputタグの親div */
            .loginDiv {
                max-width: 415.609px;
            }

            /* ログイン画面input */
            .loginDiv input {
                padding: 8px;
                border-radius: 12px;
            }
        </style>
    </head>
    <body style='background-image: url("/storage/20200319130750_book_desctop.png");'>
        <!-- ↓↓↓ユーザ新規登録アラート↓↓↓ -->
        @if(Session::has('saveMessage'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>お知らせ!</strong> メッセージ：{{ session('saveMessage') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!-- ↑↑↑ユーザ新規登録アラート↑↑↑ -->
        <div class="container w-100" style="height: 500px;">
            <div class="mt-3 float-right">
                <form method="get" action="{{ url('/login/new') }}">
                    <button type="submit" class="btn btn-success">新規登録</button>
                </form>
            </div>
            <div>Book Management</div>
            <form method="post" action="{{ url('/books') }}" class="mt-5 pt-5">
            {{ csrf_field() }}
                <div class="row mt-5 pt-5 form-group float-right loginDiv">
                    <input id="name" class="mt-3 form-control col-sm-10" type="text" name="name" placeholder="UserName" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                    <label class="text-danger col-sm-10">{{ $errors->first('name') }}</label>
                    @endif
                    <input id="password" class="mt-2 form-control col-sm-10" type="password" name="password" placeholder="PassWord">
                    @if ($errors->has('password'))
                    <label class="text-danger col-sm-10">{{ $errors->first('password') }}</label>
                    @elseif (Session::has('loginFailed'))
                    <label class="text-danger col-sm-10">{{ session('loginFailed') }}</label>
                    @endif
                    <button class="btn btn-primary mt-3 col-sm-10" type="submit">ログイン</button>
                </div>
            </form>
        </div>
        <script src="{{ asset('js/login.js') }}"></script>
    </body>
</html>
