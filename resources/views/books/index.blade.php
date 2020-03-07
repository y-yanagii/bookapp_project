@extends('layouts.default')

@section('content')
        <!-- Hedder領域 -->
        <div class="container">
            <div class="row">
                <!-- タイトル領域 -->
                <div class="col-lg-2">
                    <h2 class="text-primary m-2">本棚</h2>
                </div>

                <!-- 絞り込みラジオボタン領域 -->
                <div class="col-lg-3 my-2 btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-info active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> 全て
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="option2" autocomplete="off"> 購入前
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="options" id="option3" autocomplete="off"> 購入済
                    </label>
                </div>

                <!-- 新規登録、ログアウトボタン領域 -->
                <div class="col-lg-7">
                    <button class="btn btn-dark m-2 float-right" data-toggle="modal" data-target="#logoutModal">ログアウト</button>
                    <form method="get" action=" {{ url('/books/new') }} ">
                        <button class="btn btn-success m-2 float-right">本登録</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- メニューリスト領域一覧領域 -->
        <div class="container booksInfoListDiv">
            <table class="table table-hover booksInfoListTable">
                <thead>
                    <tr class="bg-info">
                        <th>#</th>
                        <th>タイトル</th>
                        <th>登録者</th>
                        <th>購入区分</th>
                        <th>進捗率</th>
                        <th>更新日時</th>
                        <th>×</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bookRow" data-toggle="modal" data-target=".book-info-modal-lg">
                        <th scope="row"><img class="img-thumbnail" src="https://picsum.photos/50/60" alt="Thumbnail image"></th>
                        <td>Laravel入門</td>
                        <td>柳澤　良幸</td>
                        <td>購入済み</td>
                        <td>45%</td>
                        <td>2020/02/14 15:00</td>
                        <td class="deleteBook"><a>🗑Del</a></td>
                    </tr>
                    <tr class="bookRow" data-toggle="modal" data-target=".book-info-modal-lg">
                        <th scope="row"><img class="img-thumbnail" src="https://picsum.photos/50/60" alt="Thumbnail image"></th>
                        <td>Laravel中級</td>
                        <td>柳澤　良幸</td>
                        <td>購入済み</td>
                        <td>30%</td>
                        <td>2020/02/14 15:00</td>
                        <td class="deleteBook"><a>🗑Del</a></td>
                    </tr>
                    <tr class="bookRow" data-toggle="modal" data-target=".book-info-modal-lg">
                        <th scope="row"><img class="img-thumbnail" src="https://picsum.photos/50/60" alt="Thumbnail image"></th>
                        <td>Laravel上級</td>
                        <td>柳澤　良幸</td>
                        <td>購入済み</td>
                        <td>55%</td>
                        <td>2020/02/14 15:00</td>
                        <td class="deleteBook"><a>🗑Del</a></td>
                    </tr>
                    <tr class="bookRow" data-toggle="modal" data-target=".book-info-modal-lg">
                        <th scope="row"><img class="img-thumbnail" src="https://picsum.photos/50/60" alt="Thumbnail image"></th>
                        <td>Laravel上級</td>
                        <td>柳澤　良幸</td>
                        <td>購入済み</td>
                        <td>55%</td>
                        <td>2020/02/14 15:00</td>
                        <td class="deleteBook"><a>🗑Del</a></td>
                    </tr>
                    <tr class="bookRow" data-toggle="modal" data-target=".book-info-modal-lg">
                        <th scope="row"><img class="img-thumbnail" src="https://picsum.photos/50/60" alt="Thumbnail image"></th>
                        <td>Laravel上級</td>
                        <td>柳澤　良幸</td>
                        <td>購入済み</td>
                        <td>55%</td>
                        <td>2020/02/14 15:00</td>
                        <td class="deleteBook"><a>🗑Del</a></td>
                    </tr>
                    <tr class="bookRow" data-toggle="modal" data-target=".book-info-modal-lg">
                        <th scope="row"><img class="img-thumbnail" src="https://picsum.photos/50/60" alt="Thumbnail image"></th>
                        <td>Laravel上級</td>
                        <td>柳澤　良幸</td>
                        <td>購入済み</td>
                        <td>55%</td>
                        <td>2020/02/14 15:00</td>
                        <td class="deleteBook"><a>🗑Del</a></td>
                    </tr>
                    <tr class="bookRow" data-toggle="modal" data-target=".book-info-modal-lg">
                        <th scope="row"><img class="img-thumbnail" src="https://picsum.photos/50/60" alt="Thumbnail image"></th>
                        <td>Laravel上級</td>
                        <td>柳澤　良幸</td>
                        <td>購入済み</td>
                        <td>55%</td>
                        <td>2020/02/14 15:00</td>
                        <td class="deleteBook"><a>🗑Del</a></td>
                    </tr>
                    <tr class="bookRow" data-toggle="modal" data-target=".book-info-modal-lg">
                        <th scope="row"><img class="img-thumbnail" src="https://picsum.photos/50/60" alt="Thumbnail image"></th>
                        <td>Laravel上級</td>
                        <td>柳澤　良幸</td>
                        <td>購入済み</td>
                        <td>55%</td>
                        <td>2020/02/14 15:00</td>
                        <td class="deleteBook"><a>🗑Del</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container mt-1">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- ↓↓↓本詳細情報、本登録モーダル領域↓↓↓ -->
        <div class="modal fade book-info-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title modalbookTitle">詳細情報編集</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="bookImgDiv mb-2">
                            <img class="img-thumbnail" src="https://placehold.jp/200x300.png" alt="Thumbnail image" style="width: 200px; height: 300px;">
                        </div>
                        <form>
                            <div class="form-row mb-1">
                                <div class="col">
                                    <label for="uploadFile">本画像：</label>
                                    <input name="url" id="uploadFile" type="file" class="form-control-file">
                                </div>
                                <div class="col">
                                    <label for="price">値段：</label>
                                    <input name="price" id="price" type="text" class="form-control modalPrice" placeholder="本の値段を入力してください" value="" maxlength="7">
                                </div>
                            </div>
                            <div class="form-row mb-1">
                                <div class="col">
                                    <label for="book_name">タイトル：</label>
                                    <input name="book_name" id="book_name" type="text" class="form-control modalBookName" placeholder="本の題名を入力してください" maxlength="100">
                                </div>
                            </div>
                            <div class="form-row mb-1">
                                <div class="col ctpParentDiv">
                                    <label for="total_page">現P／総P：</label>
                                    <div class="current-total-pageDiv">
                                        <input name="current_page" id="current_page" type="text" class="form-control modalCurrentPage" placeholder="1〜9" maxlength="4">
                                        <span class="slashPageSpan">／</span>
                                        <input name="total_page" id="total_page" type="text" class="form-control modalTotalPage" placeholder="1〜9" maxlength="4">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="purchase_type">購入区分：</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="purchase_type" id="purchase_type0" value="before_purchase">
                                            <label class="form-check-label" for="purchase_type0">購入前</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="purchase_type" id="purchase_type1" value="purchased">
                                            <label class="form-check-label" for="purchase_type1">購入済</label>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="form-row mb-1">                               
                                <div class="col">
                                    <label for="registered_id">登録者：</label>
                                    <input name="registered_id" type="text" id="registered_id" class="form-control" placeholder="registretion" disabled>
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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                        <button type="button" class="btn btn-primary newOrUpdateBook-btn">更新</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ↑↑↑本詳細情報、本登録モーダル領域↑↑↑ -->
@endsection
