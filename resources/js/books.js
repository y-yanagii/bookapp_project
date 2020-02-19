// 本一覧liタグ押下時のモーダル表示
$('.bookRow').on('click', function(event) {
  alert($(this).find("th").text());
});