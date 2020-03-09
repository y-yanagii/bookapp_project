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
  // エラーメッセージをクリア
  $(".displayNoneErrors").remove();
  $('.modalbookTitle').text('詳細情報編集');
  $('.newOrUpdateBook-btn').text('更新').removeClass("newBookBtn").addClass("editBookBtn");
});

// 本情報の削除
$('.deleteBook').on('click', function(e) {
  if (!confirm('本当に削除しますか？')) {
    /* キャンセルの時の処理 */
    return false;
  } else {
      /*　OKの時の処理 */
  }

  e.stopPropagation();
});