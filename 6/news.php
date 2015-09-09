<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$id = $_GET['id'];
//$sql = "SELECT * FROM news";
// $sql = "SELECT name FROM news";
// $sql = "SELECT name, email FROM news";
 $sql = "SELECT * FROM news where news_id = $id";
// $sql = "SELECT * FROM news LIMIT 3";
// $sql = "SELECT * FROM news ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($results);
foreach($results as $row) {
    $article_date = mb_strimwidth(str_replace("-",".",$row["create_date"]),0,10);
    $article_title = $row["news_title"];
    $article_detail = $row["news_detail"];
}
$pdo = null;
?>

<?php include("header.php"); ?>

    <section class="news contents-box">
        <h2 class="section-title text-center">
            <span class="section-title__yellow">News</span>
            <span class="section-title-ja text-center"><?php echo $article_date; ?></span>
        </h2>
        <article class="news-detail">
            <dl class="clearfix">
                <dt class="news-title"><?php echo $article_title;?></dt>
                <dd><?php echo $article_detail; ?></dd>
            </dl>
            
        </article>
    </section>

<?php include("footer.php"); ?>