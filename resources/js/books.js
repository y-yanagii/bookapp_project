// 本一覧liタグ押下時のモーダル表示
$('.bookRow').on('click', function(event) {
  alert($(this).find("th").text());
});

// エクスポート選択時切替
$('.exportBook-tr').on('click', function() {
  if($(this).hasClass("activeExport")) {
    $(this).removeClass("activeExport");
  } else {
    $(this).addClass("activeExport");
  }
});