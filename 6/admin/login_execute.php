<?php
  session_start();

  var_dump($_POST);
  $name = $_POST["name"];
  $password = $_POST["password"];

  if("admin" != $name){
    header("Location:login.php?error=1");
    exit;
  }
  if("password" != $password){
    header("Location:login.php?error=2");
    exit;
  }

  $_SESSION["STATUS"] = "OK";
  header("Location:index.php");

 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
</head>
<body>

</body>
</html>