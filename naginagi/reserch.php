<!DOCTYPE html>
  <html lang="ja">
    <head>
         <meta charset="utf-8">
         <title>検索画面</title>
    </head>

    <body>  
        <h1>何を検索しますか？（～を含むで検索されます。名前のみ）</h1>
        <form form action="search_result.php" method="post">
          <input type="text" name="post_name">
          <input type="submit" value="検索">
        </form>
    </body>  

    <a href = "naginagi.php">
      TOP画面へ戻る
    </a>
</html>