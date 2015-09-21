<?php

  if(isset($_GET["error"])){
    if($_GET["error"]=="1" or $_GET["error"]=="2"){
      echo "IDかパスワードが違います";
    }else if($_GET["error"]=="3"){
      echo "ログインして下さい";
    }
  }

 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<h1>ニュース管理ログイン</h1>
<form action="login_execute.php" method="post">
<table>
  <tr>
    <th><label for="name">ログイン名:</label></th>
    <td><input type="text" name="name" id="name" value="" /></td>
  </tr>
  <tr>
    <th><label for="password">パスワード:</label></th>
    <td><input type="password" name="password" id="password" value="" /></td>
  </tr>
</table>
	<input type="submit" />
</form>
</body>
</html>