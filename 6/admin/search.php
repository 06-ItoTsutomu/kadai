<?php include("session_status.php"); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
</head>
<body>
<form action="login_execute.php" method="post">
	ログイン名: <input type="text" name="name" value="" />
	パスワード: <input type="password" name="password" value="" />
	<input type="submit" />
</form>
</body>
</html>