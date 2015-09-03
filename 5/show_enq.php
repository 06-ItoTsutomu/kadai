<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

<h1>アンケート結果の画面</h1>

<?php
// 結果表示
$filepath = "data/data.csv";
$fh = fopen($filepath, 'r');
while (($r = fgetcsv($fh)) != FALSE) {
    print_r($r);
    print("<br/>\n");
}
fclose($fh);
?>

<a href="index.php">トップページへ戻る</a>

</body>
</html>