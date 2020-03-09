@extends('layouts.default')

@section('content')
        <!-- Hedder領域 -->
        <div class="container">
            <div class="row">
                <!-- タイトル領域 -->
                <div class="col-lg-3">
                    <h2 class="text-primary m-2">本情報編集</h2>
                </div>

                <!-- 戻る、ログアウトボタン領域 -->
                <div class="col-lg-9">
                    <button class="btn btn-dark m-2 float-right" data-toggle="modal" data-target="#logoutModal">ログアウト</button>
                    <form method="get" action="{{ url('/books') }}">
                        <button type="submit" class="btn btn-success m-2 float-right">戻る</button>
                    </form>
                </div>
            </div>
            <!--↓↓↓本編集情報領域↓↓↓-->
            <div class="card">
                <h5 class="card-header">編集</h5>
                <div class="card-body">
                    <div class="bookImgDiv mb-2">
                        <img class="img-thumbnail" src="/storage/{{ $book->url }}" alt="Thumbnail image" style="width: 150px; height: 250px;">
                    </div>
                    <form method="post" action="{{ url('/books', $book->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-row mb-1">
                            <div class="col">
                                <label for="book_file">本画像：</label>
                                <input name="book_file" id="book_file" type="file" class="form-control-file" value="{{ old('url', $book->url) }}">
                            </div>
                            <div class="col">
                                <label for="price">値段：</label>
                                <input name="price" id="price" type="text" class="form-control modalPrice" value="{{ old('price', $book->price) }}" maxlength="7">
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
                                <input name="book_name" id="book_name" type="text" class="form-control modalBookName" value="{{ old('book_name', $book->book_name) }}" maxlength="100">
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
                                    <input name="current_page" id="current_page" type="text" class="form-control modalCurrentPage" value="{{ old('current_page', $book->current_page) }}" maxlength="4">
                                    <span class="slashPageSpan">／</span>
                                    <input name="total_page" id="total_page" type="text" class="form-control modalTotalPage" value="{{ old('total_page', $book->total_page) }}" maxlength="4">
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
                                        <input class="form-check-input" type="radio" name="purchase_type" id="purchase_type0" value="0" <?php print ((old('purchase_type', $book->purchase_type) == "0") ? " checked" : ""); ?>>
                                        <label class="form-check-label" for="purchase_type0">購入前</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="purchase_type" id="purchase_type1" value="1" <?php print ((old('purchase_type', $book->purchase_type) == "1") ? " checked" : ""); ?>>
                                        <label class="form-check-label" for="purchase_type1">購入済</label>
                                    </div>
                                </div>
                                @if ($errors->has('purchase_type'))
                                @foreach($errors->get('purchase_type') as $error)
                                    <label class="text-danger">{{ $error }}</label>
                                @endforeach
                                @endif
                            </div>  
                        </div>
                        <div class="form-row mb-1">                               
                            <div class="col">
                                <label for="registered_name">登録者：</label>
                                <input name="registered_name" type="text" id="registered_name" class="form-control" placeholder="registretion" value="{{ $book->registered_name }}" disabled>
                            </div>
                            <div class="col">
                                <label for="updated_at">最終更新日：</label>
                                <input name="updated_at" type="text" id="updated_at" class="form-control" value="{{ $book->updated_at }}" placeholder="yyyy/MM/dd" disabled>
                            </div>
                        </div>
                        <div class="form-row mb-1">
                            <div class="col">
                                <label for="amazon_url">アマゾンURL：</label>
                                <input name="amazon_url" type="text" id="amazon_url" class="form-control" value="{{ $book->amazon_url }}" placeholder="http://xxxx.xxx" disabled>
                            </div>
                        </div>
                        <div class="form-row modal-footer">
                            <button type="submit" class="btn btn-primary newOrUpdateBook-btn">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ↑↑↑本編集情報領域↑↑↑ -->
@endsection
