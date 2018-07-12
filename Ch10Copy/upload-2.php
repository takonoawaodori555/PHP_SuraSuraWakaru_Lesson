<?php
  $msg = null;  // アップロード状況を表すメッセージ

  // アップロード処理
  if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])){
    $old_name = $_FILES['image']['tmp_name'];
    $new_name = $_FILES['image']['name'];
    if (move_uploaded_file($old_name, 'album/' . $new_name)){
      $msg = 'アップロードしました。';
    } else {
      $msg = 'アップロードできませんでした。';
    }
  }
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>交流サイト：画像アップロード</title>
</head>
<body>
  <h1>交流サイト：画像アップロード</h1>
  <p><a href="index.php">トップページに戻る</a></p>
  <?php
    if ($msg){
      echo '<p>' . $msg . '</p>';
    }
  ?>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" value="アップロード">
  </form>
</body>
</html>
