$(function() {
  getFlg = false;
});

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
    if (data.books !== undefined && data.books.length > 0) {
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

// エクスポート選択時切替
$(document).on('click', '.exportBook-tr', function() {
  if($(this).hasClass("activeExport")) {
    $(this).removeClass("activeExport");
  } else {
    $(this).addClass("activeExport");
  }
});

// エクスポートモーダル表示時のイベント
$('#jsonExportModalDiv').on('show.bs.modal', function (event) {
  // 本情報の最新取得
  $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: '/export',
    type: 'GET'
  })
  // Ajaxリクエスト成功時の処理
  .done(function(data) {
    // エクスポート用の本情報削除
    $('.exportBookBody').empty();

    // エクスポート用の本情報行の作成
    var i = 1;
    Object.keys(data.books).forEach(function (key) {
      var childDom = "";
      // 本情報行の作成
      childDom = '<tr class="exportBook-tr" data-book-export-id="' + data.books[key]['id'] + '">';
      childDom += '<th scope="row">' + i + '</th>';
      childDom += '<td class="exportBookTitle">' + data.books[key]['book_name'] + '</td>';
      childDom += '<td>' + data.books[key]['price'] + '</td>';
      childDom += '<td>' + data.books[key]['amazon_url'] + '</td>';
      childDom += '</tr>';
      
      $(childDom).appendTo('.exportBookBody');
      i++;
    });
  })
  // Ajaxリクエスト失敗時の処理
  .fail(function(data) {
      alert('Ajaxリクエスト失敗(getBookJson)');
  });
});

// エクスポートモーダルを閉じる時のイベント
$('#jsonExportModalDiv').on('hidden.bs.modal', function (event) {
  // エクスポート用の本情報削除
  $('.exportBookBody').empty();
});

// エクスポートボタン押下時
$('.exportBtn').on('click', function(event) {
  // 0件選択の場合アラート
  if ($(".activeExport").length > 0) {
    var bookIdArray = [];

    $('.activeExport').each(function(event) {
      bookIdArray.push($(this).attr("data-book-export-id"));
    });

    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/export/jsonoutput',
      type: 'post',
      dataType: 'json',
      data: JSON.stringify({
        'ids': bookIdArray
      }),
      contentType: "application/json",
    })
    // Ajaxリクエスト成功時の処理
    .done(function(data) {
      // Json出力メッセージ表示
      debugger;
      alert('Jsonファイルを出力しました(' + data.responseText + ')');
    })
    // Ajaxリクエスト失敗時の処理
    .fail(function(data) {
      debugger;
      alert('Jsonファイルを出力しました(' + data.responseText + ')');
    });
  } else {
    alert("出力するデータを選択してください");
  }
});