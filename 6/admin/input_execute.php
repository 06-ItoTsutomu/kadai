<?php
$id = $_POST["id"];
$title = $_POST["title"];
$detail = $_POST["detail"];
$author = $_POST["author"];

$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "INSERT INTO news (news_id, news_title, news_detail, author, create_date, update_date) VALUES (NULL, :news_title, :news_detail, :author, sysdate(), sysdate()) ";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':news_title', $title, PDO::PARAM_STR);
$stmt->bindValue(':news_detail', $detail, PDO::PARAM_STR);
$stmt->bindValue(':author', $author, PDO::PARAM_INT);
$result = $stmt->execute();
if($result) {
  echo "データが登録できました";
  echo "<a href=index.php>ニュース管理画面TOPへ</a>";
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