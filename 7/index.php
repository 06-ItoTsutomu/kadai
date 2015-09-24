<?php
$pdo = new PDO("mysql:host=localhost;dbname=gs_sports_news;charset=utf8", "root", "");
$sql = "SELECT * FROM news";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results_pre = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results = array_reverse($results_pre);
$i = 0;

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
</head>
<body>

        <header>
        <h1 class="hdg-lv-01">G's SPORTS</h1>
        </header>

        <article class="news-topics">
            <dl class="clearfix">
<?php
foreach($results as $row) {
    if ($i >= 4) {
        break;
    }else{
        echo '<dt class="news-date">'.mb_strimwidth(str_replace("-",".",$row["create_date"]),0,10).'</dt>';
        echo '<dd class="news-description"><a href="news.php?id='.$row["id"].'">'.$row["title"].'</dd>';
    }
$i++;
}
$pdo = null;
?>
            </dl>
            <p class="view-detail text-right"><a href="news_list.php">ニュース一覧を見る</a></p>
        </article>

