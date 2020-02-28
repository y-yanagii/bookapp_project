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

// 本情報新規登録ボタン押下時
$('.newBookbtn').on('click', function() {
  $('.modalbookTitle').text('本情報新規登録');
  // input, imgを情報をクリア
  $('.book-info-modal-lg').find('input').val("").text("");
  $('.book-info-modal-lg').find('img').attr("src", "");
});

// 本一覧liタグ押下時のモーダル表示
$('.bookRow').on('click', function(event) {
  $('.modalbookTitle').text('詳細情報編集');
});