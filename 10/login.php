<?php
require_once("config.php");
require_once("functions.php");

session_start();

if (!empty($_SESSION["me"])) {
  header("Location:" . SITE_URL);
  exit;
}

function getUser($email, $password, $dbh)
{
  $sql = "SELECT * FROM account WHERE email = :email AND password = :password LIMIT 1";
  $stmt = $dbh->prepare($sql);
  $stmt->execute(array(":email" => $email, ":password" => getSha1Password($password)));
  $user = $stmt->fetch();
  return $user ? $user : false;
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
  setToken();
} else {
  checkToken();

  $email = $_POST["email"];
  $password = $_POST["password"];

  $dbh = connectDb();

  $err = array();

  if (!emailExists($email, $dbh)) {
    $err[email] = "このメールアドレスは登録されていません";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err[email] = "メールアドレスの形式が正しくないです";
  }
  if ($email == "") {
    $err[email] = "メールアドレスを入力して下さい";
  }

  if (!$me = getUser($email, $password, $dbh)) {
    $err[password] = "パスワードとメールアドレスが一致しません";
  }

  if ($password == "") {
    $err[password] = "パスワードを入力して下さい";
  }

  if (empty($err)) {
    session_regenerate_id(true);
    $_SESSION["me"] = $me;
    header("Location:" . SITE_URL);
    exit;
  }
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sanitize.css/2.0.0/sanitize.min.css">
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>

<body>
<div class="header">
  <h1 class="logo">ログイン</h1>
</div>

<div class="container">
  <form action="" method="post">
    <p>メールアドレス：<input type="text" name="email" value="<?php echo h($email); ?>"><?php echo h($err["email"]); ?></p>

    <p>パスワード：<input type="password" name="password" value=""><?php echo h($err["password"]); ?></p>
    <input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">

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