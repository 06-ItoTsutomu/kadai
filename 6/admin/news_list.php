<?php
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT * FROM news";
// $sql = "SELECT name FROM news";
// $sql = "SELECT name, email FROM news";
// $sql = "SELECT * FROM news where id = 1";
// $sql = "SELECT * FROM news LIMIT 3";
// $sql = "SELECT * FROM news ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results_pre = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results = array_reverse($results_pre);
$i = 0;

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
    <section class="news contents-box">
        <h2 class="section-title text-center">
            <span class="section-title__yellow">News一覧</span>
        </h2>
        <article class="news-detail">
            <dl class="clearfix">
<?php
foreach($results as $row) {
        echo '<dt class="news-date">'.mb_strimwidth(str_replace("-",".",$row["create_date"]),0,200).'</dt>';
        echo '<dd class="news-description"><a href="update.php?news_id='.$row["news_id"].'">'.$row["news_title"].'</a></dd>';
}
$pdo = null;
?>
            </dl>
        </article>
    </section>
</body>
</html>