<?php include("session_status.php"); ?>
<?php
$id = $_GET["news_id"];
$title;
$detail;
$author;
$update_date;
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT * FROM news WHERE news_id = " . $id;
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($sql);
foreach($results as $row) {
//  var_dump($row);
  $title = $row["news_title"];
  $detail = $row["news_detail"];
  $author = $row["author"];
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
<form action="update_execute.php" method="post">
<table>
  <tbody>
    <tr>
      <th>
        <label for="title">タイトル:</label>
      </th>
      <td>
        <input type="text" name="title" id="title" value="<?php echo $title ?>" />
      </td>
    </tr>
    <tr>
      <th>
        <label for="detail">本文:</label>
      </th>
      <td>
        <textarea name="detail" id="detail"><?php echo $detail ?></textarea>
      </td>
    </tr>
    <tr>
      <th>
        <label for="author">投稿者:</label>
      </th>
      <td>
        <input type="text" name="author" id="author" value="<?php echo $author ?>" />
      </td>
    </tr>
  </tbody>
</table>
  <input type="hidden" name="id" value="<?php echo $id ?>" />
  <input type="submit" value="更新" />
</form>
<form action="delete_execute.php" method="post">
  <input type="hidden" name="id" value="<?php echo $id ?>" />
  <input type="submit" value="削除" />
</form>
</body>
</html>