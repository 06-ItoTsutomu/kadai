<?php
// keyid の設定ファイルを読み込む
require("config.php");


/*****************************************************************************************
 * 　ぐるなびWebサービスのレストラン検索APIで緯度経度検索を実行しパースするプログラム
 * 　注意：緯度、経度、範囲の値は固定で入れています。
 * 　　　　アクセスキーはユーザ登録時に発行されたキーを指定してください。
 *****************************************************************************************/

class Gnavi
{
  public $info;

  public function setURI($i)
  {
    global $key_id;


//エンドポイントのURIとフォーマットパラメータを変数に入れる
    $uri = "http://api.gnavi.co.jp/RestSearchAPI/20150630/";
//APIアクセスキーを変数に入れる
    $acckey = $key_id;
//返却値のフォーマットを変数に入れる
    $format = "json";
//$id = "6371619";
//  $id = "6371619,5496993,6333119,6271401,6928406,6271462,7168503,6106690,6267685";
    $id = $i;

//URL組み立て
    $url = sprintf("%s%s%s%s%s%s%s", $uri, "?format=", $format, "&keyid=", $acckey, "&id=", $id);

//API実行
    $json = file_get_contents($url);
//取得した結果をオブジェクト化
    $obj = json_decode($json);

    $this -> info = $obj;

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
<?php
$gnavi = new Gnavi();
$gnavi->setURI("6371619,6271401");
print_r($gnavi->info);
?>
</body>
</html>