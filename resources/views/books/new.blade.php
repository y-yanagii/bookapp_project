@extends('layouts.default')

@section('content')
        <!-- Hedder領域 -->
        <div class="container">
            <div class="row">
                <!-- タイトル領域 -->
                <div class="col-lg-3">
                    <h2 class="text-primary m-2">本情報登録</h2>
                </div>

                <!-- 新規登録、ログアウトボタン領域 -->
                <div class="col-lg-9">
                    <button class="btn btn-dark m-2 float-right" data-toggle="modal" data-target="#logoutModal">ログアウト</button>
                    <form method="get" action="{{ url('/books') }}">
                        <button type="submit" class="btn btn-success m-2 float-right">戻る</button>
                    </form>
                </div>
            </div>
            <!--↓↓↓本登録情報領域↓↓↓-->
            <div class="card">
                <h5 class="card-header">ユーザ新規登録</h5>
                <div class="card-body">
                    <div class="bookImgDiv mb-2">
                        <img class="img-thumbnail" src="https://placehold.jp/150x250.png" alt="Thumbnail image" style="width: 150px; height: 250px;">
                    </div>
                    <form method="post" action="{{ url('/books/create') }}">
                    {{ csrf_field() }}
                        <div class="form-row mb-1">
                            <div class="col">
                                <label for="uploadFile">本画像：</label>
                                <input name="url" id="uploadFile" type="file" class="form-control-file">
                            </div>
                            <div class="col">
                                <label for="price">値段：</label>
                                <input name="price" id="price" type="text" class="form-control modalPrice" value="{{ old('price') }}" maxlength="7">
                                @if ($errors->has('price'))
                                @foreach($errors->get('price') as $error)
                                    <label class="text-danger">{{ $error }}</label>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-row mb-1">
                            <div class="col">
                                <label for="book_name">タイトル：</label>
                                <input name="book_name" id="book_name" type="text" class="form-control modalBookName" value="{{ old('book_name') }}" maxlength="100">
                                @if ($errors->has('book_name'))
                                @foreach($errors->get('book_name') as $error)
                                    <label class="text-danger">{{ $error }}</label>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-row mb-1">
                            <div class="col ctpParentDiv">
                                <label for="total_page">現P／総P：</label>
                                <div class="current-total-pageDiv">
                                    <input name="current_page" id="current_page" type="text" class="form-control modalCurrentPage" value="{{ old('current_page') }}" maxlength="4">
                                    <span class="slashPageSpan">／</span>
                                    <input name="total_page" id="total_page" type="text" class="form-control modalTotalPage" value="{{ old('total_page') }}" maxlength="4">
                                </div>
                                @if ($errors->has('current_page'))
                                @foreach($errors->get('current_page') as $error)
                                    <label class="text-danger">{{ $error }}</label>
                                @endforeach
                                @endif
                                @if ($errors->has('total_page'))
                                @foreach($errors->get('total_page') as $error)
                                    <label class="text-danger">{{ $error }}</label>
                                @endforeach
                                @endif
                            </div>
                            <div class="col">
                                <label for="purchase_type">購入区分：</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="purchase_type" id="purchase_type0">
                                        <label class="form-check-label" for="purchase_type0">購入前</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="purchase_type" id="purchase_type1">
                                        <label class="form-check-label" for="purchase_type1">購入済</label>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="form-row mb-1">                               
                            <div class="col">
                                <label for="registered_id">登録者：</label>
                                <input name="registered_id" type="text" id="registered_id" class="form-control" placeholder="registretion" value="{{ $registerName }}" disabled>
                            </div>
                            <div class="col">
                                <label for="updated_at">最終更新日：</label>
                                <input name="updated_at" type="text" id="updated_at" class="form-control" placeholder="yyyy/MM/dd" disabled>
                            </div>
                        </div>
                        <div class="form-row mb-1">
                            <div class="col">
                                <label for="amazon_url">アマゾンURL：</label>
                                <input name="amazon_url" type="text" id="amazon_url" class="form-control" placeholder="http://xxxx.xxx" disabled>
                            </div>
                        </div>
                        <div class="form-row modal-footer">
                            <button type="submit" class="btn btn-primary newOrUpdateBook-btn">新規登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ↑↑↑本登録情報領域↑↑↑ -->
@endsection
