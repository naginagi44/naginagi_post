<?php

try{

    $post_id = $_POST['post_id'];
    $dsn = 'mysql:dbname=root;host=localhost;charset=utf8mb4';
    $user = 'root';
    $password = 'kazamajin44';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM users WHERE post_id=?';
    $stmt = $dbh -> prepare($sql);
    $data[] = $post_id;
    $stmt -> execute($data);
    $records = $stmt -> fetch(PDO::FETCH_ASSOC);
    $post_name = $records['post_name'];
    $post_kana = $records['post_kana'];
    $post_number = $records['post_number'];
    $post_add = $records['post_add'];
    $post_add2 = $records['post_add2'];
    $name_number = $records['name_number'];
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
         <title>削除確認</title>
  </head>

  <body>  
        <h1>削除しますか？</h1>


    <table border= 8px;> 
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
      <tr>

        <td>
          <form action="delete2.php" method="post">
            <p><button type="submit">削除</button></p><input type="hidden" name="post_id" value= "<?php print $post_id ?>"></p>
         </form>
        </td>
        
        <td><?php print $post_name; ?></td>
        <td><?php print $post_kana; ?></td>
        <td><?php print $post_number; ?></td>
        <td><?php print $post_add; ?></td>
        <td><?php print $post_add2; ?></td>
        <td><?php print $name_number; ?></td>
      </tr>
    </table>

  </body>  
    <a href="naginagi.php">
      TOP画面へ戻る
    </a>
    </html>