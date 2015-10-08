<?php
require_once("config.php");
require_once("functions.php");

session_start();

if(!empty($_SESSION["me"])){
  header("Location:".SITE_URL);
  exit;
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta property="og:title" content="Milkcocoaで作ったリアルタイムチャット"/>
  <meta property="og:type" content="chat"/>
  <meta property="og:description" content="BaaS（Milkcocoa）で作られたリアルタイムチャット"/>
  <title>ログイン画面</title>
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>

<body>
<div class="header">
  <h1 class="logo">ログイン</h1>
</div>

<div class="container">
  <form action="" method="post">
    <p>メールアドレス：<input type="text" name="email" value=""></p>
    <p>パスワード：<input type="password" name="password" value=""></p>
    <p><input type="submit" value="ログイン"><a href="signup.php">新規登録はこちら</a></p>
  </form>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone.js"></script>
<script src="http://cdn.mlkcca.com/v2.0.0/milkcocoa.js"></script>
<script src="js/run.js"></script>

</body>
</html>