<?php
try{

  $dsn = 'mysql:host=localhost;dbname=root;charset=utf8mb4';
$user = 'root';
$password = 'kazamajin44';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT * FROM users ORDER BY post_name DESC';
$stmt = $dbh->prepare($sql);
$stmt->execute();
$dbh = null;

}catch(Exception $e)
{
    print'使用できません';
    exit();//挙動を調べる
}

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
      <meta charset="utf-8">
      <title>住所一覧</title>
    </head>
    <body>  

      <h1>住所録一覧 </h1>
   

      <a href="input.php">住所を追加する</a>　
      <a href="reserch.php">住所を検索する</a>
    <hr>
    <table border="1" width="100%">
      <tr>
        <th></th>
        <th>氏名</th>
        <th>フリガナ</th>
        <th>郵便番号</th>
        <th>住所1(県)</th>
        <th>住所2</th>
        <th>電話番号</th>
        <th></th>
      </tr>
      
        <?php $records = $stmt->fetchAll() ?>
        <?php foreach ($records as $user_data) :?>

        <tr>
      
          <td>
            <form action="update.php" method="post">
              <p><button type="submit">更新</button></p>
              <input type="hidden" name="post_id" value="<?php print $user_data['post_id']?>">
            </form>
          </td>

          <td><?php print $user_data['post_name']; ?></td>
          <td><?php print $user_data['post_kana']; ?></td>
          <td><?php print $user_data['post_number']; ?></td>
          <td><?php print $user_data['post_add']; ?></td>
          <td><?php print $user_data['post_add2']; ?></td>
          <td><?php print $user_data['name_number']; ?></td>

          <td>
            <form action="delete.php" method="post">
              <p><button type="submit">削除</button></p>
              <input type="hidden" name="post_id" value="<?php print $user_data['post_id']?>">
            </form>
          </td>
        </tr>

        <?php endforeach?>

      </table>
    </body>
   
      <a href = "naginagi.php">TOP画面へ戻る</a>
</html>