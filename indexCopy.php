<?php
  include 'includes/login.php';
  $fp = fopen("info.txt", "r"); // ファイルを開く
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>テニスサークル交流サイト</title>
</head>
<body>
  <h1>テニスサークル交流サイト</h1>
  <h2>メニュー</h2>
  <p>
    <a href="album.php">アルバム</a>
    <a href="bbsCopy.php">掲示板</a>
    <a href="logout.php">ログアウト</a>
  </p>

  <h2>お知らせ</h2>
  <?php
    // ファイルが正しく開けたとき
    if ($fp){
      $title = fgets($fp); // ファイルから1行読み込む
      // 1行読み込めたとき
      if ($title){
        echo '<a href="info.php">' . $title . '</a>';
      } else {
        // ファイルの中身が空だったとき
        echo 'お知らせはありません。';
      }
      fclose($fp);  // ファイルを閉じる
    } else {
      // ファイルが開けなかったとき
      echo 'お知らせはありません。';
    }
  ?>
</body>
</html>
