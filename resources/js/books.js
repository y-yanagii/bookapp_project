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

// 本一覧liタグ押下時のモーダル表示(モーダル表示)
$('.bookRow').on('click', function(event) {
  var bookId = $(this).find(".deleteBook").attr('data-book-id');
  var url = "/books/" + bookId + "/edit";
  $('#bookEdit').attr('action', url);
  $('#bookEdit').submit();
});

// 本情報の削除
$('.deleteBook').on('click', function(e) {
  if (!confirm('本当に削除しますか？')) {
    /* キャンセルの時の処理 */
    return false;
  } else {
      /*　OKの時の処理 */
      debugger;
      var bookID = $(this).attr('data-book-id');
      var urlStr ="/books/destroy/" + bookID;
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: urlStr,
        type: 'POST',
        data: {'id': bookID},
        dataType: 'json',
        cache: false,
        processData: false,
      }).done(function(data) {
        debugger;
      }).fail(function(jqXHR,textStatus,errorThrown){
        debugger;
      });

      // $.ajax({
      //   headers: {
      //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //   },
      //   url: urlStr,
      //   type: 'POST'
      // });

      return false;
  }

  e.stopPropagation();
});