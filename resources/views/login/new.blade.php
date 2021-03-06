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

            /* 新規登録ボタンの親div */
            .newLoginFooter * {
                float: right;
                margin: 0.25rem;
            }
        </style>
    </head>
    <body>
        <div class="container w-100" style="height: 500px;">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <form class="float-right" method="get" action="{{ url('/') }}">
                        <button type="submit" name="back" class="btn btn-success">戻る</button>
                    </form>
                </div>
            </div>
            <div class="card mt-5">
                <h5 class="card-header">ユーザ新規登録</h5>
                <div class="card-body">
                    <form method="post" action="{{ url('/login/create') }}" class="my-3">
                    {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">ユーザ名:</label>
                            <div class="col-sm-6">
                                <input type="text" id="name" name="name" class="form-control" placeholder="ユーザ名" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <label class="text-danger">{{ $error }}</label>
                                @endforeach
                                @endif
                            </div>
                            <div class="col-sm-4"><!-- 空div --></div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">パスワード:</label>
                            <div class="col-sm-6">
                                <input type="password" id="password" name="password" class="form-control" placeholder="パスワード">
                                @if ($errors->has('password'))
                                @foreach($errors->get('password') as $error)
                                    <label class="text-danger">{{ $error }}</label>
                                @endforeach
                                @endif
                            </div>
                            <div class="col-sm-4"><!-- 空div --></div>
                        </div>
                        <div class="form-group row newLoginFooter">
                            <div class="col-sm-2"><!-- 空div --></div>
                            <div class="col-sm-6">
                                <button type="submit" name="create" class="btn btn-primary">新規登録</button>
                            </div>
                            <div class="col-sm-4"><!-- 空div --></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/login.js') }}"></script>
    </body>
</html>
