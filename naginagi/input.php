
<!DOCTYPE html>

<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>入力フォーム</title>
</head>

<body>
<h1>登録画面 </h1>
<hr>
　  <p>
    <a href="list.php">一覧へ戻る</a>
    </p>
  <form action="new_data.php" method="post">
  
    <p>氏名<br/><input type="text" name="post_name"></p>
    <p>フリガナ<br/><input type="text" name="post_kana"></p>
    <p>郵便番号（‐は入力しない）<br/><input type="text" name="post_number"></p>
    <p>住所１（都道府県、市区町村）<br/><input type="text" name="post_add"></p>
    <p>住所２（番地）例：1-2-3<br/><input type="text" name="post_add2"></p>
    <p>電話番号<br/><input type="text" name="name_number"></p>

    

    <p><input type="submit" value="送信"></p>
 </form>

    <a href = "naginagi.php">
      TOP画面へ戻る
    </a>

    

</body>
</html>
