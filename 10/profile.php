<?php
require_once("config.php");
require_once("functions.php");

session_start();

if(empty($_SESSION["me"])){
  header("Location:".SITE_URL."login.php");
  exit;
}

$me = $_SESSION["me"];
$dbh = connectDb();

$sql = "select * from account where id = :id limit 1";
$stmt=$dbh->prepare($sql);
$stmt->execute(array(":id"=>(int)$_GET["id"]));
$user = $stmt->fetch();

if(!$user){
  echo "no such user!";
  exit;
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <title>ユーザープロフィール</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sanitize.css/2.0.0/sanitize.min.css">
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>

<body>
<p>ログイン中（<?php echo h($me["name"]); ?>） | <a href="logout.php">[ログアウトする]</a></p>
<h1>ユーザープロフィール</h1>
<p>お名前：<?php echo h($user["name"]); ?></p>
<p>メールアドレス：<?php echo h($user["email"]); ?></p>
<p><a href="index.php">一覧へ戻る</a></p>


</body>
</html>