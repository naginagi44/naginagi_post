<?php


try{

  $post_id = $_POST['post_id'];
  $dsn = 'mysql:dbname=root;host=localhost;charset=utf8mb4';
  $user = 'root';
  $password = 'kazamajin44';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = 'DELETE FROM users WHERE post_id=?';
  $stmt = $dbh -> prepare($sql);
  $data[] = $post_id;
  $stmt->execute($data);
  $dbh = null;

}catch(Exception $e)
{
    print'使用できません';
    exit();
}

?>

<!DOCTYPE html>
  <html lang="ja">  
  <head>
    <meta charset="utf-8">
    <title>削除完了</title>
  </head>

  <body>  
     <h1>削除しました！</h1>
  </body>  

  <a href="naginagi.php">
    TOP画面へ戻る
  </a>
</html>