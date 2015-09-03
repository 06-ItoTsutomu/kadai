<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>確認画面</title>
<style>
table{
  margin-bottom:15px;
}
th{
  text-align:left;
}
th,td{
  padding:5px;
}
</style>
</head>
<body>

<h1>確認画面</h1>

<form action="input_finish.php" method="post" enctype="multipart/form-data">

<table>
  <tbody>
    <tr>
      <th>お名前</th>
      <td><?php echo $_POST["name"]; $name = $_POST["name"] ?>
      <input name="name" type="hidden" value="<?php print(htmlspecialchars($_SESSION["name"] = $name)); ?>" /></td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td><?php echo $_POST["mail"]; $name = $_POST["mail"] ?>
      <input name="mail" type="hidden" value="<?php print(htmlspecialchars($_SESSION["mail"] = $name)); ?>" /></td>
    </tr>
    <tr>
      <th>年齢</th>
      <td><?php echo $_POST["age"]; $name = $_POST["age"] ?>
      <input name="age" type="hidden" value="<?php print(htmlspecialchars($_SESSION["age"] = $name)); ?>" /></td>
    </tr>
    <tr>
      <th>性別</th>
      <td><?php echo $_POST["sex"]; $name = $_POST["sex"] ?>
      <input name="sex" type="hidden" value="<?php print(htmlspecialchars($_SESSION["sex"] = $name)); ?>" /></td>
    </tr>
  </tbody>
</table>


<button type="submit" >決定する</button>
</form>



</body>
</html>