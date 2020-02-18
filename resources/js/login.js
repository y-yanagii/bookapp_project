// Newボタン押下時イベント
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data('whatever');
    var modal = $(this); // ログイン画面からログイン名などを取得してくる処理をコメントアウト
    // ログイン名、パスワードをclear
    $(modal.find('.modal-body input')).val("");
  });