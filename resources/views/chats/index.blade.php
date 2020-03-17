@extends('layouts.default')

@section('content')
        <!-- Hedder領域 -->
        <div class="container">
            <div class="row">
                <!-- タイトル領域 -->
                <div class="col-lg-6">
                    <h2 class="text-primary m-2 float-left">チャット</h2>
                </div>
                <!-- 新規登録、ログアウトボタン領域 -->
                <div class="col-lg-6">
                    <button class="btn btn-dark m-2 float-right" data-toggle="modal" data-target="#logoutModal">ログアウト</button>
                </div>
            </div>
        </div>
        <!-- チャット領域 -->
        <div class="container chatsContainer">
            <div class="row">
                <!-- チャットヘッダ領域 -->
                <div class="col-3">
                    <div class="">ユーザ一覧<i class="fas fa-meteor ml-1"></i></div>
                </div>
                <div class="col-9 bg-primary float-right">
                    <div class="text-white user-to"></div>
                </div>
            </div>
            <!-- ユーザ一覧 -->
            <div class="row">
                <div class="col-3">
                    <ul class="list-group list-group-flush usersUl">
                        @foreach($users as $user)
                        <li class="list-group-item loginInfoLi" data-user-id="{{ $user->id }}"><i class="fas fa-user-astronaut"></i>{{ $user->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-9 bg-secondary">    
                    <!-- タイムラインメッセージ部分 -->
                    <div id="bms_messages">
                        <!--メッセージ領域-->
                    </div>
                    <div class="messageInputDiv">
                        <textarea name="message" id="message" class="messeageArea col-11 mr-2" placeholder="メッセージを入力してください"></textarea>
                        <button class="btn btn-primary col-1 messageSubmitBtn">送信</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/messages.js') }}"></script>
@endsection
