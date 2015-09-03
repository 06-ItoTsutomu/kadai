<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>入力画面</title>
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

<h1>入力画面</h1>

<form action="confirm_enq.php" method="post" enctype="multipart/form-data">
<table>
  <tbody>
    <tr>
      <th><label for="name">お名前</label></th>
      <td><input type="text" name="name" id="name" value="<?php print(htmlspecialchars($_SESSION['name'])); ?>"></td>
    </tr>
    <tr>
      <th><label for="mail">メールアドレス</label></th>
      <td><input type="text" name="mail" id="mail" value="<?php print(htmlspecialchars($_SESSION['mail'])); ?>"></td>
    </tr>
    <tr>
      <th><label for="age">年齢</label></th>
      <td><input type="text" name="age" id="age" value="<?php print(htmlspecialchars($_SESSION['age'])); ?>"></td>
    </tr>
    <tr>
      <th>性別</th>
      <td><label>男性<input type="radio" name="sex" value="男"></label>
          <label>女性<input type="radio" name="sex" value="女"></label></td>
    </tr>
  </tbody>
</table>

  <!-- 趣味(チェックボックス):
  <input type="checkbox" name="hobby[1]" value="野球">
  <input type="checkbox" name="hobby[2]" value="サッカー">
  <input type="checkbox" name="hobby[3]" value="ゴルフ">

  あとは自由:
  <input type="text" name="name"> -->
  <input type="submit" value="入力確認の画面へ">
</form>

</body>
</html>


