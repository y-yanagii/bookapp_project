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
    <body style='background-image: url("https://picsum.photos/600/600");'>
        <div class="container w-100">
            <div class="mt-3 float-right">
                <button class="btn btn-success">New</button>
            </div>
            <div>Book Management</div>
            <form method="post" action="{{ url('/books') }}" class="mt-5 pt-5">
                <div class="row mt-5 pt-5 form-group float-right">
                    <input id="name" class="mt-3 form-control col-sm-10" type="text" name="name" placeholder="UserName">
                    <input id="password" class="mt-2 form-control col-sm-10" type="password" name="password" placeholder="PassWord">
                    <button class="btn btn-primary mt-3 col-sm-10" type="submit">Sign in</button>
                </div>
            </form>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
