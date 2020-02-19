// Newボタン押下時イベント
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data('whatever');
    // モーダルのdivタグを変数へ代入
    var modal = $(this);
    // ログイン名、パスワードをclear
    $(modal.find('.modal-body input')).val("");
  });