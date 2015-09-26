<?php
$pdo = new PDO("mysql:host=localhost;dbname=gs_sports_news;charset=utf8", "root", "");
$sql_all = "SELECT * FROM news";
$stmt = $pdo->prepare($sql_all);
$stmt->execute();
$results_pre = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results_all = array_reverse($results_pre);

$sql_baseball = "SELECT * FROM `news` WHERE `category` IN ('野球')";
$stmt_baseball = $pdo->prepare($sql_baseball);
$stmt_baseball->execute();
$results_pre = $stmt_baseball->fetchAll(PDO::FETCH_ASSOC);
$results_baseball = array_reverse($results_pre);

$sql_football = "SELECT * FROM `news` WHERE `category` IN ('サッカー')";
$stmt = $pdo->prepare($sql_football);
$stmt->execute();
$results_pre = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results_football = array_reverse($results_pre);

$sql_other = "SELECT * FROM `news` WHERE `category` IN ('その他')";
$stmt = $pdo->prepare($sql_other);
$stmt->execute();
$results_pre = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results_other = array_reverse($results_pre);

$sql_baseball_01 = "SELECT * FROM `news` WHERE `category` LIKE '野球' AND `sub_category` LIKE 'プロ野球'";
$stmt = $pdo->prepare($sql_baseball_01);
$stmt->execute();
$results_pre = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results_baseball_01 = array_reverse($results_pre);

$sql_baseball_02 = "SELECT * FROM `news` WHERE `category` LIKE '野球' AND `sub_category` LIKE '高校野球'";
$stmt = $pdo->prepare($sql_baseball_02);
$stmt->execute();
$results_pre = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results_baseball_02 = array_reverse($results_pre);

$sql_baseball_03 = "SELECT * FROM `news` WHERE `category` LIKE '野球' AND `sub_category` LIKE 'WBC'";
$stmt = $pdo->prepare($sql_baseball_03);
$stmt->execute();
$results_pre = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results_baseball_03 = array_reverse($results_pre);

$sql_football_01 = "SELECT * FROM `news` WHERE `category` LIKE 'サッカー' AND `sub_category` LIKE '海外サッカー'";
$stmt = $pdo->prepare($sql_football_01);
$stmt->execute();
$results_pre = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results_football_01 = array_reverse($results_pre);

$sql_football_02 = "SELECT * FROM `news` WHERE `category` LIKE 'サッカー' AND `sub_category` LIKE 'Jリーグ'";
$stmt = $pdo->prepare($sql_football_02);
$stmt->execute();
$results_pre = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results_football_02 = array_reverse($results_pre);

$sql_football_03 = "SELECT * FROM `news` WHERE `category` LIKE 'サッカー' AND `sub_category` LIKE '日本代表'";
$stmt = $pdo->prepare($sql_football_03);
$stmt->execute();
$results_pre = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results_football_03 = array_reverse($results_pre);

$pdo = null;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
  <title>G's SPORTS</title>
  <meta charset="UTF-8">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</head>
<body>
<div class="container">
  <header>
    <h1 class="hdg-lv-01">G's SPORTS</h1>
  </header>

  <div class="row">
    <div class="col s12">
      <ul class="tabs teal lighten-3">
        <li class="tab col s3"><a class="active" href="#cate_all">総合</a></li>
        <li class="tab col s3"><a href="#cate_baseball">野球</a></li>
        <li class="tab col s3"><a href="#cate_football">サッカー</a></li>
        <li class="tab col s3"><a href="#cate_other">その他</a></li>
      </ul>
    </div>
    <div id="cate_all" class="col s12">
      <dl>
        <?php
        $i = 0;
        foreach($results_all as $row) {
            if ($i >= 5) {
                break;
            }else{
                echo '<dt class="news-date">'.mb_strimwidth(str_replace("-",".",$row["create_date"]),0,10).'</dt>';
                echo '<dd class="news-description"><a href="news.php?id='.$row["id"].'">'.$row["title"].'</a></dd>';
            }
        $i++;
        }
        ?>
      </dl>
      <p class="view-detail text-right"><a href="news_list.php">もっと見る</a></p>
    </div>
    <div id="cate_baseball" class="col s12">
      <div class="s12">
        <ul class="tabs teal lighten-4">
          <li class="tab col s4"><a class="active" href="#baseball_01">プロ野球</a></li>
          <li class="tab col s4"><a href="#baseball_02">高校野球</a></li>
          <li class="tab col s4"><a href="#baseball_03">WBC</a></li>
        </ul>
      </div>
      <div id="baseball_01" class="col s12">
        <dl>
          <?php
          $i = 0;
          foreach($results_baseball_01 as $row) {
              if ($i >= 5) {
                  break;
              }else{
                  echo '<dt class="news-date">'.mb_strimwidth(str_replace("-",".",$row["create_date"]),0,10).'</dt>';
                  echo '<dd class="news-description"><a href="news.php?id='.$row["id"].'">'.$row["title"].'</a></dd>';
              }
          $i++;
          }
          ?>
        </dl>
        <p class="view-detail text-right"><a href="news_list.php">もっと見る</a></p>
      </div>
      <div id="baseball_02" class="col s12">
        <dl>
          <?php
          $i = 0;
          foreach($results_baseball_02 as $row) {
              if ($i >= 5) {
                  break;
              }else{
                  echo '<dt class="news-date">'.mb_strimwidth(str_replace("-",".",$row["create_date"]),0,10).'</dt>';
                  echo '<dd class="news-description"><a href="news.php?id='.$row["id"].'">'.$row["title"].'</a></dd>';
              }
          $i++;
          }
          ?>
        </dl>
        <p class="view-detail text-right"><a href="news_list.php">もっと見る</a></p>
      </div>
      <div id="baseball_03" class="col s12">
        WBCの中身
      </div>
    </div>
    <div id="cate_football" class="col s12">
      <div class="s12">
        <ul class="tabs teal lighten-4">
          <li class="tab col s4"><a class="active" href="#football_01">海外サッカー</a></li>
          <li class="tab col s4"><a href="#football_02">Jリーグ</a></li>
          <li class="tab col s4"><a href="#football_03">日本代表</a></li>
        </ul>
      </div>
      <div id="football_01" class="col s12">
        <dl>
          <?php
          $i = 0;
          foreach($results_football_01 as $row) {
              if ($i >= 5) {
                  break;
              }else{
                  echo '<dt class="news-date">'.mb_strimwidth(str_replace("-",".",$row["create_date"]),0,10).'</dt>';
                  echo '<dd class="news-description"><a href="news.php?id='.$row["id"].'">'.$row["title"].'</a></dd>';
              }
          $i++;
          }
          ?>
        </dl>
        <p class="view-detail text-right"><a href="news_list.php">もっと見る</a></p>
      </div>
      <div id="football_02" class="col s12">
        <dl>
          <?php
          $i = 0;
          foreach($results_football_02 as $row) {
              if ($i >= 5) {
                  break;
              }else{
                  echo '<dt class="news-date">'.mb_strimwidth(str_replace("-",".",$row["create_date"]),0,10).'</dt>';
                  echo '<dd class="news-description"><a href="news.php?id='.$row["id"].'">'.$row["title"].'</a></dd>';
              }
          $i++;
          }
          ?>
        </dl>
        <p class="view-detail text-right"><a href="news_list.php">もっと見る</a></p>
      </div>
      <div id="football_03" class="col s12">
        <dl>
          <?php
          $i = 0;
          foreach($results_football_03 as $row) {
              if ($i >= 5) {
                  break;
              }else{
                  echo '<dt class="news-date">'.mb_strimwidth(str_replace("-",".",$row["create_date"]),0,10).'</dt>';
                  echo '<dd class="news-description"><a href="news.php?id='.$row["id"].'">'.$row["title"].'</a></dd>';
              }
          $i++;
          }
          ?>
        </dl>
        <p class="view-detail text-right"><a href="news_list.php">もっと見る</a></p>
      </div>
    </div>
    <div id="cate_other" class="col s12">
        <dl>
          <?php
          $i = 0;
          foreach($results_other as $row) {
              if ($i >= 5) {
                  break;
              }else{
                  echo '<dt class="news-date">'.mb_strimwidth(str_replace("-",".",$row["create_date"]),0,10).'</dt>';
                  echo '<dd class="news-description"><a href="news.php?id='.$row["id"].'">'.$row["title"].'</a></dd>';
              }
          $i++;
          }
          ?>
        </dl>
        <p class="view-detail text-right"><a href="news_list.php">もっと見る</a></p>
    </div>
  </div>


</div>
