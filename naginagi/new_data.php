<?php

$post_name = $_POST['post_name'];
$post_kana = $_POST['post_kana'];
$post_number = $_POST['post_number'];
$post_add = $_POST['post_add'];
$post_add2 = $_POST['post_add2'];
$name_number = $_POST['name_number'];

$dsn = 'mysql:host=localhost;dbname=root;charset=utf8mb4';
$user = 'root';
$password = 'kazamajin44';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = 'INSERT INTO users(post_name,post_kana,post_number,post_add,post_add2,name_number)
VALUES(
:post_name,
:post_kana,
:post_number,
:post_add,
:post_add2,
:name_number)';

$stmt = $dbh->prepare($sql);
$stmt->bindValue(":post_name", $post_name, PDO::PARAM_STR);
$stmt->bindValue(":post_kana", $post_kana, PDO::PARAM_STR);
$stmt->bindValue(":post_number", $post_number, PDO::PARAM_STR);
$stmt->bindValue(":post_add", $post_add, PDO::PARAM_STR);
$stmt->bindValue(":post_add2", $post_add2, PDO::PARAM_STR);
$stmt->bindValue(":name_number", $name_number, PDO::PARAM_STR);
$stmt->execute();
$dbh = null;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>送信完了</title>
</head>

<body>
<h1>登録が完了しました</h1>
<a href="naginagi.php">
      TOP画面へ戻る
</a>
</body>
</html>

