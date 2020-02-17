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
                <!-- <button class="btn ">New</button> -->

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">New</button>
                <!-- モーダル部分 -->
                <!-- ↓↓↓新規登録モーダル部分↓↓↓ -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New user registration</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                            <div class="form-group">
                                <label for="name" class="col-form-label">UserName:</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">PassWord:</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Register</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- ↑↑↑新規登録モーダル部分↑↑↑ -->

            </div>
            <div>Book Management</div>
            <form method="get" action="{{ url('/books') }}" class="mt-5 pt-5">
            {{ csrf_field() }}
                <div class="row mt-5 pt-5 form-group float-right">
                    <input id="name" class="mt-3 form-control col-sm-10" type="text" name="name" placeholder="UserName">
                    <input id="password" class="mt-2 form-control col-sm-10" type="password" name="password" placeholder="PassWord">
                    <button class="btn btn-primary mt-3 col-sm-10" type="submit">Sign in</button>
                </div>
            </form>
        </div>
        <script src="{{ asset('js/app.js') }}">

            // Newボタン押下時のモーダル表示処理
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                // ログイン画面からログイン名などを取得してくる処理をコメントアウト
                // modal.find('.modal-title').text('New message to ' + recipient)
                // modal.find('.modal-body input').val(recipient)
            });
        </script>
    </body>
</html>
