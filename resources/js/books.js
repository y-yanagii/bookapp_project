// 購入区分選択時
$('input[name="radioPurchaseType"]:radio').change(function() {
  var purchaseType = $(this).val();

  $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: '/books/search/' + purchaseType,
    type: 'GET',
    data: {'purchaseType': purchaseType},
    contentType: false,
    processData: false,
  })
  // Ajaxリクエスト成功時の処理
  .done(function(data) {
    // 行の入れ替え
    if (data.books.length > 0) {
      // 本情報行の削除
      $('.booksBody').empty();

      // 本情報行の作成
      Object.keys(data.books).forEach(function (key) {
        var childDom = "";
        // 本情報行の作成
        childDom = '<tr class="bookRow">';
        childDom += '<th scope="row"><img class="bookRow-thumbnail img-thumbnail" src="/storage/' + data.books[key]['url'] + '" alt="image"></th>';
        childDom += '<td>' + data.books[key]['book_name'] +'</td>';
        childDom += '<td>' + data.books[key]['registered_name'] + '</td>';
        childDom += '<td>';
        if (data.books[key]['purchase_type'] == "1") {
          childDom += '購入済み';
        } else {
          childDom += '購入前';
        }
        childDom += '</td>';
        childDom += '<td>' + data.books[key]['current_page'] + 'P / ' + data.books[key]['total_page'] + 'P</td>';
        childDom += '<td>' + data.books[key]['updated_at'] + '</td>'
        childDom += '<td class="deleteBook" data-book-id="' + data.books[key]['id'] + '"><a>🗑Del</a></td>';
        childDom += '</tr>';
        $(childDom).appendTo('.booksBody');
      });
    }
  })
  // Ajaxリクエスト失敗時の処理
  .fail(function(data) {
      alert('絞り込み検索に失敗しました!');
  });
});

// エクスポート選択時切替
$('.exportBook-tr').on('click', function() {
  if($(this).hasClass("activeExport")) {
    $(this).removeClass("activeExport");
  } else {
    $(this).addClass("activeExport");
  }
});

// ユーザ一覧押下時選択切替
$('.loginInfoLi').on('click', function() {
  if(!$(this).hasClass("active")) {
    $('.loginInfoLi').removeClass("active");
    $(this).addClass("active");
    var $userName = $(this).text();
    $('.user-to').text('● ' + $userName);
  }
});

// 本一覧trタグ押下時の詳細表示
$(document).on('click', '.bookRow', function(event) {
  var bookId = $(this).find(".deleteBook").attr('data-book-id');
  var url = "/books/" + bookId + "/edit";
  $('#bookEdit').attr('action', url);
  $('#bookEdit').submit();
});

// 本情報の削除
$(document).on('click', '.deleteBook', function(e) {
  if (!confirm('本当に削除しますか？')) {
    /* キャンセルの時の処理 */
    return false;
  } else {
    /*　OKの時の処理 */
    // 選択した本情報のIDを取得
    var bookId = $(this).attr('data-book-id');

    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/books/destroy/' + bookId,
      type: 'POST',
      data: {'id': bookId},
      contentType: false,
      processData: false,
    })
    // Ajaxリクエスト成功時の処理
    .done(function(data) {
      // 行の削除
      $('[data-book-id=' + data["id"] +']').parents(".bookRow").remove()
    })
    // Ajaxリクエスト失敗時の処理
    .fail(function(data) {
        alert('Ajaxリクエスト失敗');
    });
  }

  e.stopPropagation();
});