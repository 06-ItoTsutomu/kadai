<?php
$id = $_POST["id"];
$title = $_POST["title"];
$detail = $_POST["detail"];
$author = $_POST["author"];

$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "UPDATE news set news_title = '" . $title . "', news_detail = '" . $detail . "', author = '" . $author . "', update_date = sysdate() " . "WHERE news_id = " . $id;

$stmt = $pdo->prepare($sql);
$result = $stmt->execute();

if($result) {
  echo "データが更新できました";
  echo "<a href='index.php'>ニュース管理画面TOPへ</a>";
} else {
  echo "データの登録に失敗しました";
}
$pdo = null;
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

</body>
</html>