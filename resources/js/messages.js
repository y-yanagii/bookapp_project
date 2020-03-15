$(function() {
  getFlg = false;

  // リアルタイム通信
  getMessageData();
});

function getMessageData() {
  if (getFlg) {
    alert('seikou!!!');

  }

  setTimeout("getMessageData()", 5000);
};

// ユーザ一覧押下時選択切替
$('.loginInfoLi').on('click', function() {
  if(!$(this).hasClass("active")) {
    // ユーザ一覧を選択状態
    $('.loginInfoLi').removeClass("active");
    $(this).addClass("active");

    var $userName = $(this).text();
    $('.user-to').text('● ' + $userName);
    var $userId = $(this).attr('data-user-id');

    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/chats/' + $userId,
      type: 'GET',
      data: {'id': $userId},
      contentType: false,
      processData: false,
    })
    // Ajaxリクエスト成功時の処理
    .done(function(data) {
      // メッセージの入れ替え
      if (data.messages !== undefined && data.messages.length > 0) {
        // メッセージ領域の削除
        $('#bms_messages').empty();
  
        // メッセージ領域の作成
        var childDom = "";
        Object.keys(data.messages).forEach(function (key) {
          // メッセージ行の作成
          if (data.messages[key]['id'] == data.currentId) {
            // →右サイドメッセージ
            childDom += '<div class="mycomment"><p>' + data.messages[key]['message'] + '</p></div>';
          } else {
            // ←左サイドメッセージ
            childDom += '<div class="chatting"><p>' + data.messages[key]['message'] + '</p></div>';
          }
        });

        // メッセージ領域要素追加
        $(childDom).appendTo('#bms_messages');
      } else {
        // メッセージ領域の削除
        $('#bms_messages').empty();
      }
    })
    // Ajaxリクエスト失敗時の処理
    .fail(function(data) {
        alert('チャット情報取得に失敗しました!');
    });
  }

  getFlg = true;
});

// メッセージ送信時保存処理
$('.messageSubmitBtn').on('click', function() {
  // メッセージ入力している場合のみ、保存処理
  if ($("#message").val() != "") {
    var $message = $("#message").val();
    var $sendUserId = $('.loginInfoLi.active').attr('data-user-id');
    $message = $message.replace(/\r|\n|\r\n/g, "<br>");
    
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/chats/add',
      type: 'post',
      dataType: 'json',
      data: JSON.stringify({
        'id': $sendUserId,
        'message': $message
      }),
      contentType: "application/json",
    })
    // Ajaxリクエスト成功時の処理
    .done(function(data) {
      // メッセージの入れ替え
      if (data.message !== undefined && data.message != null) {
        var childDom = "";

        // メッセージ追加
        childDom += '<div class="mycomment"><p>' + data.message['message'] + '</p></div>';
        $('#bms_messages').append(childDom);

        // 入力メッセージをクリア
        $("#message").val("");
      }
    })
    // Ajaxリクエスト失敗時の処理
    .fail(function(data) {
      alert('メッセージ送信に失敗しました!');
    });
  }
});