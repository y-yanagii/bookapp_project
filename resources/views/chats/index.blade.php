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
        <div class="container" style="height: 700px;">
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
                    <ul class="list-group list-group-flush" style="height: 670px; overflow-x: scroll; border-left: solid 1px; border-right: solid 1px; border-radius: 1%;">
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-A</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-B</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-C</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-D</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-E</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-F</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-G</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-H</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-I</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-J</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-K</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-L</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-M</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-N</li>
                        <li class="list-group-item loginInfoLi"><i class="fas fa-user-astronaut"></i>User-O</li>
                    </ul>
                </div>
                <div class="col-9 bg-secondary">    
                    <!-- タイムラインメッセージ部分 -->
                    <div id="bms_messages" style="height: 91%;">
                        <!--メッセージ（左側）-->
                        <div class="chatting">
                            <p>これはメッセージテストです！！！</p>
                        </div>
                        <!--メッセージ（右側）-->
                        <div class="mycomment">
                            <p>これはメッセージテストです！！！</p>
                        </div>
                    </div>

                    <div style="display: flex;">
                        <textarea name="message" id="message" class="messeageArea col-11 mr-2" placeholder="メッセージを入力してください" style="height: 33px;"></textarea>
                        <button class="btn btn-primary col-1" style="height:30px; padding-top: 4px;">送信</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
