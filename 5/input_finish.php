<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>登録完了</title>
<style>
table{
  margin-bottom:15px;
}
th{
  text-align:left;
}
th,td{
  padding:5px;
}
</style>
</head>
<body>

<h1>登録完了しました。</h1>

<p>下記の内容で登録致しました。</p>
<table>
  <tbody>
    <tr>
      <th>お名前</th>
      <td><?php echo $_POST["name"]; ?></td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td><?php echo $_POST["mail"]; ?></td>
    </tr>
    <tr>
      <th>年齢</th>
      <td><?php echo $_POST["age"]; ?></td>
    </tr>
    <tr>
      <th>性別</th>
      <td><?php echo $_POST["sex"]; ?></td>
    </tr>
  </tbody>
</table>

<p><a href="show_enq.php">アンケート集計結果確認</a></p>

</body>

<?php
$filepath = "data/data.csv";
$fh = fopen($filepath, 'a');

$raw = array(); // 配列を準備

// 配列の先頭から順番にデータを入れていく
$raw[] = $_POST["name"];
$raw[] = $_POST["mail"];
$raw[] = $_POST["age"];
$raw[] = $_POST["sex"];
flock($fh, LOCK_EX);      // ファイルロック
fputcsv($fh, $raw); // csv ファイルに書き込み
unset($raw); // 配列のクリア
flock($fh, LOCK_UN);      // ファイルロック解除
fclose($fh);


    ?>
</html>