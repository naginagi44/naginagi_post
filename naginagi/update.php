<?php

try{

    $post_id = $_POST['post_id'];
    $dsn = 'mysql:dbname=root;host=localhost;charset=utf8mb4';
    $user = 'root';
    $password = 'kazamajin44';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM users WHERE post_id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $post_id;
    $stmt->execute($data);
    $records = $stmt->fetch(PDO::FETCH_ASSOC);
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

<DOCTYPE html>
  <html lang="ja">
    <head>
         <meta charset="utf-8">
         <title>更新確認</title>
    </head>

    <body>  
      <h1>更新しますか？</h1>

      <form action="update2.php" method="post">

        <p>名前<span style="color:red">※必須</span><br>
        <input type="text" name="post_name" value="<?php print $post_name;?>"></p>

        <p>名前（フリガナ）<span style="color:red">※必須</span><br/>
        <input type="text" name="post_kana" value="<?php print $post_kana;?>"></p>

        <p>郵便番号（‐は入力しない）<br/>
        <input type="text" name="post_number" value="<?php print $post_number;?>"></p>
  
        <p>住所１（都道府県、市区町村）<br/>
        <input type="text" name="post_add" value="<?php print $post_add; ?>"></p>
  
        <p>住所２（番地）例：1-2-3<br/>
        <input type="text" name="post_add2" value="<?php print $post_add2; ?>"></p>
  
        <p>電話番号<br/>
        <input type="text" name="name_number" value="<?php print $name_number ; ?>"></p>


        <p><button type="submit">更新</button></p>
        <input type="hidden" name="post_id" value="<?php print $post_id ?>">
        
      </form></p>
    </body>  

    <a href = "naginagi.php">
      TOP画面へ戻る
    </a>
</html>