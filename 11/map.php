<?php
// keyid の設定ファイルを読み込む
require("config.php");


/*****************************************************************************************
 * 　ぐるなびWebサービスのレストラン検索APIで緯度経度検索を実行しパースするプログラム
 * 　注意：緯度、経度、範囲の値は固定で入れています。
 * 　　　　アクセスキーはユーザ登録時に発行されたキーを指定してください。
 *****************************************************************************************/

//エンドポイントのURIとフォーマットパラメータを変数に入れる
$uri = "http://api.gnavi.co.jp/RestSearchAPI/20150630/";
//APIアクセスキーを変数に入れる
$acckey = $key_id;
//返却値のフォーマットを変数に入れる
$format = "json";
//$id = "6371619";
$id = "6371619,5496993,6333119,6271401,6928406,6271462,7168503,6106690,6267685";
//URL組み立て
$url = sprintf("%s%s%s%s%s%s%s", $uri, "?format=", $format, "&keyid=", $acckey, "&id=", $id);

//API実行
$json = file_get_contents($url);
//取得した結果をオブジェクト化
$obj = json_decode($json);

//結果をパース
foreach ((array)$obj as $key => $val) {
  if (strcmp($key, "rest") == 0) {
    foreach ((array)$val as $key02 => $val02) {
      foreach ((array)$val02 as $key03 => $val03) {
        if (strcmp($key03, "name") == 0) {
          $name[] = $val03;
        }
        if (strcmp($key03, "latitude") == 0) {
          $lat[] = $val03;
        }
        if (strcmp($key03, "longitude") == 0) {
          $lon[] = $val03;
        }
      }
    }

  }
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>ぐるなびAPIマップ</title>
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script src="js/gmaps.js"></script>
  <style type="text/css">
    #map {
      width: 90%;
      height: 500px;
      margin: 10px auto;
    }
  </style>
</head>
<body>
<div id="map"></div>
<script>
  var map = new GMaps({
    el: '#map',
    lat: 35.690993,
    lng: 139.704728
  });

  <?php for( $i = 0; $i < count($name); $i++ ){ ?>
  map.addMarker({
    lat: <?= $lat[$i]; ?>,
    lng: <?= $lon[$i]; ?>,
    title: 'Lima',
    infoWindow: {
      content: '<p><?= $name[$i]; ?></p>'
    }
  });
  <?php } ?>
</script>
<p>Powered by <a href="http://www.gnavi.co.jp/">ぐるなび</a></p>
</body>
</html>