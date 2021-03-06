@extends('layouts.default')

@section('content')
        @if(Session::has('bookFailed'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>お知らせ!</strong> メッセージ：{{ session('bookFailed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!-- Hedder領域 -->
        <div class="container">
            <div class="row">
                <!-- タイトル領域 -->
                <div class="col-lg-2">
                    <h2 class="text-primary m-2">本棚</h2>
                </div>

                <!-- 絞り込みラジオボタン領域 -->
                <div class="col-lg-3 my-2 btn-group btn-group-toggle purchaseTypeParentDiv" data-toggle="buttons">
                    <label class="btn btn-info <?php if(Session::has('purchaseType') && session('purchaseType') == "all") { echo('active'); } ?>">
                        <input type="radio" name="radioPurchaseType" id="option1" autocomplete="off" value="all" checkd> 全て
                    </label>
                    <label class="btn btn-info <?php if(Session::has('purchaseType') && session('purchaseType') == "0") { echo("active"); } ?>">
                        <input type="radio" name="radioPurchaseType" id="option2" autocomplete="off" value="0"> 購入前
                    </label>
                    <label class="btn btn-info <?php if(Session::has('purchaseType') && session('purchaseType') == "1") { echo("active"); } ?>">
                        <input type="radio" name="radioPurchaseType" id="option3" autocomplete="off" value="1" checkd> 購入済
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
            <form id="bookEdit" method="get">
                <table class="table table-hover booksInfoListTable">
                    <thead>
                        <tr class="bg-info">
                            <th class="text-white">#</th>
                            <th class="text-white">タイトル</th>
                            <th class="text-white">登録者</th>
                            <th class="text-white">購入区分</th>
                            <th class="text-white">進捗率</th>
                            <th class="text-white">更新日時</th>
                            <th class="text-white">×</th>
                        </tr>
                    </thead>
                    <tbody class="booksBody">
                        @foreach ($books as $book)
                        <tr class="bookRow">
                            <th scope="row"><img class="bookRow-thumbnail img-thumbnail" src="/storage/{{ $book->url }}" alt="image"></th>
                            <td>{{ $book->book_name }}</td>
                            <td>{{ $book->registered_name }}</td>
                            <td>@if ($book->purchase_type == "1")
                                    購入済み
                                @else
                                    購入前
                                @endif</td>
                            <td>{{ $book->current_page }}P / {{ $book->total_page }}P</td>
                            <td>{{ $book->updated_at }}</td>
                            <td class="deleteBook" data-book-id="{{ $book->id }}"><a>🗑Del</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
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
        <script src="{{ asset('js/books.js') }}"></script>
@endsection
