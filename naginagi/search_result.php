<?php
try{

$search_word = $_POST['post_name'];

$dsn = 'mysql:host=localhost;dbname=root;charset=utf8mb4';
$user = 'root';
$password = 'kazamajin44';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT *
    FROM users
    WHERE post_name
    LIKE :search_word';
$stmt = $dbh -> prepare($sql);
$stmt->bindValue(":search_word", '%'.$search_word.'%', PDO::PARAM_STR);
$stmt->execute();
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
      <title>検索結果</title>
    </head>

    <body>  
      <h1>検索結果</h1>

      <table border="1" width="100%">
        <tr>
          <th></th>
          <th>名前</th>
          <th>名前（フリガナ）</th>
          <th>郵便番号（‐は入力しない）</th>
          <th>住所１（都道府県、市区町村）</th>
          <th>住所２（番地）例：1-2-3</th>
          <th>電話番号</th>
          <th></th>
        </tr>

          <?php $records=$stmt->fetchAll() ?>
          <?php foreach  ($records as $user_data) :?>

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

    <a href = "naginagi.php">
      TOP画面へ戻る
    </a>
</html>
