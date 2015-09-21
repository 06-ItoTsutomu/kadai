<?php include("session_status.php"); ?>
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
<form action="input_execute.php" method="post">
<table>
  <tbody>
    <tr>
      <th>
        <label for="title">タイトル:</label>
      </th>
      <td>
        <input type="text" name="title" id="title" />
      </td>
    </tr>
    <tr>
      <th>
        <label for="detail">本文:</label>
      </th>
      <td>
        <textarea name="detail" id="detail"></textarea>
      </td>
    </tr>
    <tr>
      <th>
        <label for="author">投稿者:</label>
      </th>
      <td>
        <input type="text" name="author" id="author" />
      </td>
    </tr>
  </tbody>
</table>
  <input type="hidden" name="id" value="<?php echo $id ?>" />
  <input type="submit" value="更新" />
</form>
</body>
</html>