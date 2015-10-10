$(function () {
  //1.ミルクココアインスタンスを作成
  var milkcocoa = new MilkCocoa("guitarifc51xge.mlkcca.com");
  //2."message"データストアを作成
  var ds = milkcocoa.dataStore("message");
  //3."message"データストアからメッセージを取ってくる
  ds.stream().sort("desc").next(function (err, datas) {
    datas.forEach(function (data) {
      renderMessage(data);
    });
  });
  //4."message"データストアのプッシュイベントを監視
  ds.on("push", function (e) {
    renderMessage(e);
  });
  var last_message = "dummy";

  function renderMessage(message) {
    var name_html = '<p class="post-name">' + escapeHTML(message.value.name) + '</p>';
    var message_html = '<p class="post-text">' + escapeHTML(message.value.content) + '</p>';
    var date_html = '';
    if (message.value.date) {
      date_html = '<p class="post-date">' + escapeHTML(new Date(message.value.date).toLocaleString()) + '</p>';
    }
    if(message.value.name == login_name){
      $("#" + last_message).before('<div id="' + message.id + '" class="post mypost">' + name_html + message_html + date_html + '</div>');
    }else{
    $("#" + last_message).before('<div id="' + message.id + '" class="post">' + name_html + message_html + date_html + '</div>');
    }

    last_message = message.id;

  }

  function post() {
    //5."message"データストアにメッセージをプッシュする
    var name = escapeHTML($("#name").val());
    var content = escapeHTML($("#content").val());
    if (content && content !== "") {
      ds.push({
        name: name,
        content: content,
        date: new Date().getTime()
      }, function (e) {
      });
    }
    $("#content").val("");
  }

  $('#post').click(function () {
    post();
  })
  $('#content').keydown(function (e) {
    if (e.which == 13) {
      post();
      return false;
    }
  });

  //$('#messages').each(".post",function(el){
  // el.target.css("color","red");
  //});
  //$('.post').each(function(){
  //  $(this).css("color","red");
  //});
});
//インジェクション対策
function escapeHTML(val) {
  return $('<div>').text(val).html();
}