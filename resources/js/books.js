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

// 本情報新規登録ボタン押下時(モーダル表示)
$('.newBookbtn').on('click', function() {
  $('.modalbookTitle').text('本情報新規登録');
  // input, imgを情報をクリア
  $('.book-info-modal-lg').find('input').val("").text("");
  $('.newOrUpdateBook-btn').text('新規').removeClass("editBookBtn").addClass("newBookBtn");
});

// 本一覧liタグ押下時のモーダル表示(モーダル表示)
$('.bookRow').on('click', function(event) {
  $('.modalbookTitle').text('詳細情報編集');
  $('.newOrUpdateBook-btn').text('更新').removeClass("newBookBtn").addClass("editBookBtn");
});

// 本情報新規登録、更新時Ajax呼び出し
$('.newOrUpdateBook-btn').on('click', function() {
  if ($(this).hasClass('newBookBtn')) {
    // 本情報新規登録時Ajax
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/books/create",
      type: 'POST',
      data: {'price': 10},
      error: function(data) {
        debugger;
        //alert(data.responseText);
      }
    })
    .done(function(data) {
      debugger;
      // Ajaxリクエストが成功した場合
      alert('Ajax通信成功！！！');
    });
  } else {
    // 本情報編集更新時Ajax
  }
  
});