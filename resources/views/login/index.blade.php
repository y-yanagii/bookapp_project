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
    <body style='background-image: url("https://picsum.photos/600/600");'>
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
                    @endif
                    <button class="btn btn-primary mt-3 col-sm-10" type="submit">ログイン</button>
                </div>
            </form>
        </div>

        <!-- ↓↓↓新規登録モーダル部分↓↓↓ -->
        <div class="modal fade" id="newLoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">新規ユーザ登録</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                        <label for="name" class="col-form-label">ユーザ名:</label>
                        <input type="text" class="form-control" id="name" placeholder="ユーザ名">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">パスワード:</label>
                        <input type="password" class="form-control" id="password" placeholder="パスワード">
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                    <button type="button" class="btn btn-primary">新規登録</button>
                </div>
                </div>
            </div>
        </div>
        <!-- ↑↑↑新規登録モーダル部分↑↑↑ -->
        <script src="{{ asset('js/login.js') }}"></script>
    </body>
</html>
